<div style="font-family: Arial, sans-serif!; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; 
background-color: #002448;
min-height: 100vh; display: flex; justify-content: center; align-items: center;">
    <div class="registro-container custom-w" style="width: 400px; 
    background-color: rgba(255, 255, 255, 0.8); padding: 30px; border-radius: 10px; text-align: center;">
        <h2>Registrarme</h2>
        <?php if (session()->has('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach (session('errors') as $error): ?>
                    <div class="alert alert-danger" role="alert">
                <?= esc($error) ?>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>
        <form action="api/registrarme" method="post" class="custom-w-form" style="display: flex; flex-wrap: wrap;
        gap: 5px;"
        >
            <input type="text" name="nombre" placeholder="Nombre" style="flex: 0 0 calc(50% - 5px); width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;" required>
            <input type="text" name="apellido" placeholder="Apellido" style="flex: 0 0 calc(50% - 5px); width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;" required>
            <input type="text" name="usuario" placeholder="Usuario" style="width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;" required>
            <input type="email" name="email" placeholder="Correo electrónico" style="width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;" required>
            <input type="password" name="pass" placeholder="Contraseña" style="flex: 0 0 calc(50% - 5px); width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;" required>
            <input type="password" name="repass" placeholder="Repetir contraseña" style="flex: 0 0 calc(50% - 5px); width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 5px;" required>
            <input type="submit" value="Registrarme" style="background-color: #4CAF50; color: white; border: none; cursor: pointer; width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border-radius: 5px;">
        </form>
    </div>
</div>

<style>
    @media screen and (max-width: 400px) {
        .custom-w {
            width: 90% !important;
        }
    }
        
    @media screen and (min-width: 400px) {
        .custom-w {
            width: 55% !important;
        }
    }
    
    @media screen and (min-width: 800px) {
        .custom-w {
            width: 50% !important;
        }
   
    }
    @media screen and (min-width: 1050px) {
        .custom-w {
            width: 40% !important;
        }
    }
    @media screen and (max-width: 800px) {
        form {
            display: flex;
            flex-direction: column;
        }
        form div {
                flex: 1 !important;
            }
        
    }
</style>