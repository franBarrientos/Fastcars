
<div style="margin: 0;
min-height: 100vh;
display: flex; justify-content: center; align-items: center;
padding: 20px; background-color: #002448;">

    <div style="width: 70%; margin: auto;
    background-color: rgba(255, 255, 255, 0.8); border-radius: 10px;">
<!--  <div style="width: 50%; margin: auto; overflow: hidden;"> -->
        <h2 style="text-align: center; padding: 20px;">Dar de alta nuevo Vehiculo</h2>
        <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" 
        style="margin: 0 10px; text-align: center;"
        role="alert">
            <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <?php if (session()->has('errors')): ?>
                <?php foreach (session('errors') as $error): ?>
                    <div
                    style="margin: 0 10px; text-align: center;"
                    class="alert alert-danger" role="alert">
                <?= esc($error) ?>
                </div>
        <?php endforeach ?>
        <?php endif; ?>
        <form  
        class="custom-w-form" 
        action="<?php echo base_url('api/vehiculos/new'); ?>"
         method="post" enctype="multipart/form-data" style="padding: 10px; gap: 5px; display: flex; flex-wrap: wrap;">
                    <div style="flex: 0 0 calc(50% - 10px); margin-right: 10px; box-sizing: border-box;">
                    <select id="marca" name="marca" required style="width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">
                        <option value="" disabled selected>Seleccione una marca</option>
                        <?php foreach ($marcas as $marca): ?>
                        <option value="<?php echo $marca; ?>"><?php echo $marca; ?></option>
                        <?php endforeach; ?>
                        
                    </select>
                </div>
                <input placeholder="Modelo" type="text" id="modelo" name="modelo" required style="flex: 0 0 calc(50% - 5px); width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <input placeholder="Año" type="number" id="año" name="año" required style="flex: 0 0 calc(50% - 5px); width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">                
                <input placeholder="Color" type="text" id="color" name="color" required style="flex: 0 0 calc(50% - 5px); width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <input placeholder="Precio" type="number" id="precio" name="precio" required style="flex: 0 0 calc(50% - 5px); width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <input placeholder="Motor" type="text" id="motor" name="motor" required style="flex: 0 0 calc(50% - 5px); width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">        
                <input type="file" id="img" name="img" required style="flex: 0 0 calc(50% - 5px); width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <textarea placeholder="Descripción" id="descripcion" name="descripcion" rows="4" required style="flex: 0 0 calc(50% - 5px); width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
                <input type="submit" value="Dar de alta Vehiculo" style="background-color: #4CAF50; color: white; border: none; cursor: pointer; width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border-radius: 5px;">
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
            flex-direction: column !important;
        }
        form div {
                flex: 1 !important;
            }
        
    }
</style>