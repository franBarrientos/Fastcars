<div style="font-family: Arial, sans-serif!; margin: 0; padding: 0; min-height: 78vh; display: flex; justify-content: center; align-items: center; 
background-color: #002448">
    <div class="login-container" style="background-color: rgba(255, 255, 255, 0.8); padding: 30px; border-radius: 10px; text-align: center;max-width: 400px; margin: auto; border: 1px solid #ccc; border-radius: 10px;">
        <h2>Iniciar sesión</h2>
        
        <form action="api/login" method="post">
            <input type="text" name="usuario" placeholder="Usuario" style="width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;" required><br>
            <input type="password" name="pass" placeholder="Contraseña" style="width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;" required><br>
            <input type="submit" value="Iniciar sesión" style="background-color: #4CAF50; color: white; border: none; cursor: pointer; width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border-radius: 5px;">
        </form>
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
        <p style="margin-top: 20px;">¿No tiene una cuenta aún? <a href="registrarme" style="color: #42980e; text-decoration: none;">Registrarme</a></p>
    </div>
</div>
