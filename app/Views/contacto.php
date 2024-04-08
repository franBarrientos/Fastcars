<main style="background-image: url('assets/img/contacto.jpg');
     background-size: cover;
     background-position: center; color: white"> 
    <div class="container"  >
        <h1>Contacto</h1>

        <!-- Formulario de contacto -->
        <form action="enviar_correo.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn mt-2 btn-primary">Enviar</button>
        </form>

        <!-- Mapa de Google -->
        <h2>Razón Social: Nombre de la Empresa</h2>
        <h2>¿Donde nos encontramos?</h2>
        <p>Dirección: Jamaica 4207</p>
        <div style="height: 500px;
        background-image: url('assets/img/location.jpg');
        background-size: cover;
        background-position: center;
        border-radius: 2%;">
        " class="border rounded"></div>
    </div>
</main>