<?php
ob_start();

?>
<!-- Inclure la bibliothèque AOS -->

<!-- Ajouter l'attribut "data-aos" à vos éléments pour leur appliquer un effet -->
<section class="fade-in pt-5" data-aos="fade-up">
  <div class="container pt-5">
    <div class="row align-items-center pt-5">
      <div class="col-md-6 text-md-start text-center mb-5">
        <h1 class="mb-4 fw-bold text-white text-uppercase text-center" style="font-size: calc(48px + 1.5vw);">TAIIZER</h1>
        <p class="mb-6 lead fs-4 text-white text-center fade-in" data-aos="fade-up" data-aos-delay="500">Bienvenue sur mon site !
          Retrouvez mes live sur Twitch, mes dernières vidéos Youtube, mes conseils pour le meilleur matériel et le forum pour vous aider et échanger librement.</p>
      </div>
      <div class="col-md-6 text-end p-5">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="/public/Accueil/Daco_5738059.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="/public/Accueil/PC-2000e.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="/public/Accueil/PC-MILLIEU.png" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 5000 // Temps de défilement en millisecondes
    });
  });
</script>




<section class="twitch-section fade-in pt-5" data-aos="fade-up">
  <div class="container pt-5">
    <div class="row align-items-center">
      <div class="col-md-6 text-start mb-3">
        <h2 class="fw-bold text-white text-uppercase" style="font-size: calc(36px + 1.5vw);">En live sur Twitch</h2>
      </div>
    </div>
    <div class="row" id="twitch-player">
      <!-- Le lecteur et le tchat seront injectés ici par le script JavaScript -->
    </div>
  </div>
</section>





<section class="youtube-section fade-in pt-5" data-aos="fade-up">
  <div class="container pt-5">
    <div class="row align-items-center">
      <div class="col-md-12 mb-3">
        <h2 class="fw-bold text-white text-uppercase text-end" style="font-size: calc(36px + 1.5vw);">YouTube</h2>
      </div>
    </div>
    <div class="row" id="youtube-videos">
      <!-- Les vidéos seront injectées ici par le script JavaScript -->
    </div>
  </div>
</section>

<script src="https://embed.twitch.tv/embed/v1.js"></script>
<script type="text/javascript">
  new Twitch.Embed("twitch-player", {
    width: "100%",
    height: "538",
    channel: "taiizerr",
    layout: "video-with-chat",
    parent: ["taiizer.fr", "localhost"]
  });
</script>

<script>
  const apiKey = 'AIzaSyBHLAftlTC1KxRzk8h__xCYtR9JlwoliKE';
  const channelId = 'UCJj1fBvPmRpCrjU4_Pl1wAA';
  const maxResults = 6;

  async function fetchLatestVideos() {
    const response = await fetch(`https://www.googleapis.com/youtube/v3/search?key=${apiKey}&channelId=${channelId}&part=snippet,id&order=date&maxResults=${maxResults}`);
    const data = await response.json();
    return data.items;
  }

  function createVideoCard(video) {
    const videoId = video.id.videoId;
    const videoTitle = video.snippet.title;
    const videoThumbnail = video.snippet.thumbnails.high.url;

    return `
    <div class="col-md-4 col-sm-6 mb-4">
  <div class="card btn-outline-light rounded h-100" >
    <a href="https://www.youtube.com/watch?v=${videoId}" target="_blank">
      <img src="${videoThumbnail}" class="card-img-top" alt="${videoTitle}">
    </a>
    <div class="card-body">
      <h5 class="card-title">${videoTitle}</h5>
    </div>
  </div>
</div>
    `;
  }


  async function displayLatestVideos() {
    const videos = await fetchLatestVideos();
    const videoCards = videos.map(createVideoCard).join('');
    document.getElementById('youtube-videos').innerHTML = videoCards;
  }

  displayLatestVideos();
</script>
<?php
$content = ob_get_clean();
$Name = "Page Accueil";
require "template.php";
?>