<?php 
  include_once 'menu.php'
?>

<div class="container mt-2">
  <div id="myCarousel" class="carousel slide carousel-fade mx-auto" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://www.villasfincas.com/wp-content/uploads//2013/12/cortijo-andalusia-728x486.jpg"
          class="d-block w-100">
        <div class="carousel-caption">
          <h3>Las resevas mas economicamente aceptables</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://betting.cdnppb.net/es-sportsbook/las-vegas-circuito-formula1.956x638.jpg"
          class="d-block w-100">
        <div class="carousel-caption">
          <h3>Hoteles en sitios que ni sabes que existen</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="https://c4.wallpaperflare.com/wallpaper/999/375/798/animales-mamifero-mono-wallpaper-preview.jpg"
          class="d-block w-100">
        <div class="carousel-caption">
          <h3>Un Mono</h3>
        </div>
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


<div class="container mt-3">
  <div class="row">
    <div class="col-md-6" id="opiniones">
      <div class="card mb-3" style="max-width: 600px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://c4.wallpaperflare.com/wallpaper/999/375/798/animales-mamifero-mono-wallpaper-preview.jpg"
              class="img-fluid rounded-start">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="card mb-3" style="max-width: 600px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="https://e00-expansion.uecdn.es/assets/multimedia/imagenes/2021/10/13/16341217436727.jpg"
              class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
      </div>


    </div>
    <div class="col-md-6">
      <div class="sticky-top d-none d-md-block" id="mapa">
        <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
          <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div>
          <script>(function () {
              var setting = {
                "query": "Madrid, España", "width": 750, "height": 750, "satellite": false, "zoom": 5,
                "placeId": "ChIJgTwKgJcpQg0RaSKMYcHeNsQ", "cid": "0xc436dec1618c2269", "coords": [40.4167754, -3.7037902],
                "lang": "es", "queryString": "Madrid, España", "centerCoord": [40.4167754, -3.7037902],
                "id": "map-9cd199b9cc5410cd3b1ad21cab2e54d3", "embed_id": "1030267"
              };
              var d = document;
              var s = d.createElement('script');
              s.src = 'https://1map.com/js/script-for-user.js?embed_id=1030267';
              s.async = true;
              s.onload = function (e) {
                window.OneMap.initMap(setting)
              };
              var to = d.getElementsByTagName('script')[0];
              to.parentNode.insertBefore(s, to);
            })();</script><a href="https://1map.com/es/map-embed">1 Map</a>
        </div>
      </div>
    </div>
  </div>
</div>

</div>


</body>

</html>