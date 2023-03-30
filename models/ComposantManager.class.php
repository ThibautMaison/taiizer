<?php
require_once "Model.class.php";
require_once "Composant.class.php";

class ComposantManager extends Model{
    private $Boutique;
    private $Users; 

    public function ajoutBoutique($Composant){
        $this->Boutique[]=$Composant;
    }

    public function ajoutUsers($User){
        $this->Users[]=$User;
    }

    public function getBoutique(){return $this->Boutique;}

    public function chargementBoutique(){
        $req=$this->getBdd()->prepare("SELECT * FROM boutique ORDER BY RAND()");
        $req->execute();
        $mesBoutique=$req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();


        foreach($mesBoutique as $Composant){
            $l=new Composant($Composant["id"],$Composant["Name"],$Composant["Description"],$Composant["Prix"],$Composant["Lien"],$Composant["image"],$Composant["Categorie"]);
            $this->ajoutBoutique($l);
        }
    }

    public function getComposantById($id){
        for($i=0;$i<count($this->Boutique);$i++){
            if($this->Boutique[$i]->getId() === $id){
                return $this->Boutique[$i];
            }
        }
    }

    public function ajoutComposantBd($Name,$Description,$Prix,$Lien,$image,$Categorie){
        $req="
        INSERT INTO boutique (Name,Description,Prix,Lien,image,Categorie)
        value (:Name,:Description,:Prix,:Lien,:image,:Categorie)";

        $stmt=$this->getBdd()->prepare($req);
        $stmt->bindValue(":Name",$Name,PDO::PARAM_STR);
        $stmt->bindValue(":Description",$Description,PDO::PARAM_STR);
        $stmt->bindValue(":Prix",$Prix,PDO::PARAM_STR);
        $stmt->bindValue(":Lien",$Lien,PDO::PARAM_STR);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $stmt->bindValue(":Categorie",$Categorie,PDO::PARAM_STR);
        $resultat=$stmt->execute();
        $stmt->closeCursor();

        if($resultat>0){
            $Composant=new Composant($this->getBdd()->lastInsertId(),$Name,$Description,$Prix,$Lien,$image,$Categorie);
            $this->ajoutBoutique($Composant);
        }
    }

    public function suppressionComposantBd($id){
        $req="
        DELETE from boutique where id= :idComposant";
        $stmt=$this->getBdd()->prepare($req);
        $stmt->bindValue(":idComposant",$id,PDO::PARAM_INT);
        $resultat=$stmt->execute();
        $stmt->closeCursor();

        if($resultat>0){
            $Composant=$this->getComposantById($id);
            unset($Composant);
        }
    }

    public function modificationComposantBd($id,$Name,$Description,$Prix,$Lien,$image,$Categorie){
        $req = "
        UPDATE boutique
        SET Name= :Name,Description= :Description,Prix= :Prix,Lien= :Lien,image= :image,Categorie= :Categorie
        WHERE id= :id";

        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":Name", $Name, PDO::PARAM_STR);
        $stmt->bindValue(":Description", $Description, PDO::PARAM_STR);
        $stmt->bindValue(":Prix",$Prix,PDO::PARAM_STR);
        $stmt->bindValue(":Lien",$Lien,PDO::PARAM_STR);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $stmt->bindValue(":Categorie", $Categorie, PDO::PARAM_STR);
        $resultat=$stmt->execute();
        $stmt->closeCursor();

        if($resultat>0){
            $this->getComposantById($id)->setName($Name);
            $this->getComposantById($id)->setDescription($Description);
            $this->getComposantById($id)->setPrix($Prix);
            $this->getComposantById($id)->setLien($Lien);
            $this->getComposantById($id)->setImage($image);
            $this->getComposantById($id)->setCategorie($Categorie);
        }
    }
}
?>
