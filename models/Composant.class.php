<?php
class Composant{
    private $id;
    private $Name;
    private $Description;
    private $Prix;
    private $Lien;
    private $image;
    private $Categorie;

    public function __construct($id,$Name,$Description,$Prix,$Lien,$image,$Categorie)
    {
        $this->id=$id;
        $this->Name=$Name;
        $this->Description=$Description;
        $this->Prix=$Prix;
        $this->Lien=$Lien;
        $this->image=$image;
        $this->Categorie=$Categorie;

    }

    public function getId(){return $this->id;}
    public function setId($id){$this->id=$id;}

    public function getName(){return $this->Name;}
    public function setName($Name){$this->Name=$Name;}

    public function getDescription(){return $this->Description;}
    public function setDescription($Description){$this->Description=$Description;}

    public function getPrix(){return $this->Prix;}
    public function setPrix($Prix){$this->Prix=$Prix;}


    public function getLien(){return $this->Lien;}
    public function setLien($Lien){$this->Lien=$Lien;}

    public function getImage(){return $this->image;}
    public function setImage($image){$this->image=$image;}

    public function getCategorie(){return $this->Categorie;}
    public function setCategorie($Categorie){$this->Categorie=$Categorie;}
}

?>