<!-- <div class="hero" style="position: relative; min-height: 66.3vh; background-image: url('assets/img/bkg.jpg'); background-size: cover; background-position: center;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5);"></div>
    <div class="content" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: #ffffff;">
        <h1 style="font-size: 2.5rem; margin-bottom: 20px;">Bienvenido a nuestra Concesionaria de Vehículos Deportivos</h1>
        <p style="font-size: 1.2rem; margin-bottom: 30px;">Explora nuestra amplia gama de vehículos deportivos de alto rendimiento.</p>
    </div>
</div>
 -->

 <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7);"></div>
    <div class="content" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: #ffffff;">
        <h1 style="font-size: 2.5rem; margin-bottom: 20px;">Bienvenido a nuestra Concesionaria de Vehículos Deportivos</h1>
        <p style="font-size: 1.2rem; margin-bottom: 30px;">Explora nuestra amplia gama de vehículos deportivos de alto rendimiento.</p>
    </div>
      <img src="assets/img/bkg.jpg" height="500px" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7);"></div>
    <div class="content" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: #ffffff;">
        <h1 style="font-size: 2.5rem; margin-bottom: 20px;">Bienvenido a nuestra Concesionaria de Vehículos Deportivos</h1>
        <p style="font-size: 1.2rem; margin-bottom: 30px;">Explora nuestra amplia gama de vehículos deportivos de alto rendimiento.</p>
    </div>  
    <img src="assets/img/bkg2.jpg" height="500px" class="d-block w-100 " alt="...">
    </div>
    <div class="carousel-item">
    <div class="overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.7);"></div>
    <div class="content" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: #ffffff;">
        <h1 style="font-size: 2.5rem; margin-bottom: 20px;">Bienvenido a nuestra Concesionaria de Vehículos Deportivos</h1>
        <p style="font-size: 1.2rem; margin-bottom: 30px;">Explora nuestra amplia gama de vehículos deportivos de alto rendimiento.</p>
    </div>  
    <img src="assets/img/bkg3.jpg" height="500px" class="d-block w-100 " alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div id="myCarousel" class="my-carousel slide pt-3" data-bs-ride="carousel" style="background-color: #111827;">

<h1 style="font-size: 2.5rem; color: #ffffff; text-align: center; margin-bottom: 20px;">Nuestras Marcas</h1>


<div class="marquee-container" style="background-color: #ffffff;"> 
    <div class="marquee">
        <img class="img-carousel" src="assets/img/bentley.jpg">
        <img class="img-carousel" src="assets/img/audi.webp">
        <img class="img-carousel" src="assets/img/bmw.webp">
        <img class="img-carousel" src="assets/img/ferrari.jpg">
        <img class="img-carousel" src="assets/img/lamborgini.jpg">
        <img class="img-carousel" src="assets/img/mercedes.webp">
        <img class="img-carousel" src="assets/img/porsche.jpg">
        <img class="img-carousel" height="120px" src="assets/img/mclaren.jpg">
        <img class="img-carousel" height="120px" src="assets/img/ford.jpg">
        <img class="img-carousel" height="120px" src="assets/img/bugatti.jpg">
        <img class="img-carousel" height="120px" src="assets/img/astonmartin.jpg">
        <!-- Agrega más imágenes según sea necesario -->
    </div>
</div>





<style>


.img-carousel:hover{
    transform: scale(1.4);
}

.marquee-container {
    width: 100%;
    height: 200px;
    display: flex;
    align-items: center;
    overflow: hidden;
}

.marquee {
    white-space: nowrap;
    animation: marquee 20s linear infinite;
    animation-delay: -5s; /* Reducir el retraso inicial */
}

.marquee img {
    margin-right: 20px; /* Espacio entre las imágenes */
}

@keyframes marquee {
    from {
        transform: translateX(100%);
    }
    to {
        transform: translateX(-100%);
    }
}
</style>
