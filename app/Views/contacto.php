<main style="background-image: url('assets/img/contacto.jpg');
     background-size: cover;
     position: relative;
     background-position: center; color: white"> 
       <div class="overlay position-absolute top-0 start-0 bottom-0 end-0" style="background-color: rgba(0, 0, 0, 0.6);"></div>
       <div style="position: relative;">

       
    <div class="container"   >
        <h1 style="text-align: center; margin-bottom: 30px; padding-top: 20px">Contacto</h1>

        <!-- Formulario de contacto -->
        <div class="custom-size" style="display: flex; justify-items: center; margin-bottom: 40px; gap: 10px;">

        <div style=" display: flex; align-items: center; border: 1px solid #ccc; padding: 20px; border-radius: 2%;">
        <div style="flex: 1; font-size: larger; font-weight: 600; " >
            <p>Titular de la empresa: Barrientos Franco</p>
            <p>Razón Social: Fast Cars Concesionaria S.A</p>
            <p>Telefono: 3794029441</p>
            <p>E-Mail: francobarrientos56@gmail.com</p>
        </div>
        </div>

        
        
        <form style="flex: 2; border: 1px solid #ccc; padding: 20px; border-radius: 2%;" action=<?php echo base_url('api/consultas/new'); ?> method="POST">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
            <input type="hidden" name="consulta" value="false">
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

        </div>


        <div style=" border: 1px solid #ccc; padding: 20px; border-radius: 2%;">


        <h3 style="text-align: center;" >¿Donde nos encontramos?</h3>
        <h5 style="text-align: center;">Dirección: Jamaica 4207</h5>
<div style="height: 500px;
        background-image: url('assets/img/location.jpg');
        background-size: cover;
        background-position: center;
        border-radius: 2%;">
        " class="border rounded"></div>
    </div>
    </div>
    </div>
</main>

<style>
    @media (max-width: 768px) {
        .custom-size {
            flex-direction: column; 
        }
    }

</style>