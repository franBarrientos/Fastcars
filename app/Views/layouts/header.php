<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fast Cars</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logo-favi.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
    </style>
</head>

<body style="background-color: #f8f9fa;">
    <header>
        <nav style="background-color: #111827;" class="mr-2 py-0 navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">

                <a class="col-1 mx-5 navbar-brand p-0" style="color: #ffffff;
            font-weight: bold;
            font-size: 1.5rem;" href="http://localhost/fastcars/">
                    <picture>
                        <source srcset="assets/img/logo.avif" type="image/avif">
                        <source srcset="assets/img/logo.webp" type="image/webp">
                        <img width="120px" src="assets/img/logo.png" alt="Logo">
                    </picture>                    
                    
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="col-5 collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class=<?= $page == 'home' ? "'nav-link active'" : "'nav-link'"; ?> href="http://localhost/fastcars/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class=<?= $page == "nosotros" ? "'nav-link active'" : "'nav-link'"; ?>" href="http://localhost/fastcars/nosotros">Quiénes Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class=<?= $page == 'comercializacion' ? "'nav-link active'" : "'nav-link'"; ?> href="http://localhost/fastcars/comercializacion">Comercialización</a>
                        </li>
                        <li class="nav-item">
                            <a class=<?= $page == 'contacto' ? "'nav-link active'" : "'nav-link'"; ?> href="http://localhost/fastcars/contacto">Información de Contacto</a>
                        </li>
                        <li class="nav-item">
                            <a class=<?= $page == 'terminos' ? "'nav-link active'" : "'nav-link'"; ?> href="#">Términos y Uso</a>
                        </li>
                        <li class="nav-item">
                            <a class=<?= $page == 'catalogo' ? "'nav-link active'" : "'nav-link'"; ?> href="#">Catálogo de Vehículos</a>
                        </li>
                        <li class="nav-item">
                            <a class=<?= $page == 'consultas' ? "'nav-link active'" : "'nav-link'"; ?> href="#">Consultas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>