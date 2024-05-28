<div style="min-height: 70vh; display: flex;">
    <div style="display: flex; background-color: #f0f0f0; flex: 1;">
        <div style="min-height: 100%; flex: 1; padding: 20px;">
            <ul style="list-style-type: none; padding: 0; margin: 0;">
                <li class=<?= $page == 'admin' ? "'activecustom'" : "'off'"; ?>   style="cursor: pointer;margin-bottom: 10px;  padding: 10px; background-color: #ddd;"><a href="<?php echo base_url('admin'); ?>" style="text-decoration: none; color: #333; font-weight: bold;">Usuarios</a></li>
                <li <li class=<?= $page == 'vehiculos' ? "'activecustom'" : "'off'"; ?> style="cursor: pointer;margin-bottom: 10px;  padding: 10px; background-color: #ddd;"><a href="<?php echo base_url('admin/vehiculos'); ?>" style="text-decoration: none; color: #333; font-weight: bold;">Vehículos</a></li>
                <li style="cursor: pointer;margin-bottom: 10px;  padding: 10px; background-color: #ddd;"><a
                href="<?php echo base_url('admin/consultas'); ?>"
                style="text-decoration: none; color: #333; font-weight: bold;">Consultas</a></li>
            </ul>
        </div>
     
        <div style="min-height: 100%; flex: 7; padding: 12px; ">

        <div style="display: flex; justify-content: center; align-items: center;">
        <a style="flex: 1 display: flex; color: green;" href="<?php echo base_url('admin/vehiculos/new') ?>">
                            <button type="submit" style=" padding: 10px;  background-color: green; color: white; border: none; border-radius: 4px; cursor: pointer;">Dar de alta un nuevo vehículo</button>
        </a>
           
        <form method="get"  action="<?php echo base_url('admin/buscar_vehiculos'); ?>" style="display: flex; gap: 10px; flex: 3; padding: 10px;">
                            <input
                            value="<?php if (isset($query)) echo $query; ?>"
                            type="text" name="query" placeholder="Buscar por marca o modelo" style="padding: 10px; flex: 3; width: 100%; border-radius: 5px; border: 1px solid #ccc;">
                            <button type="submit" style="padding: 10px 20px; flex: 1; border-radius: 5px; border: none; text-decoration: none; background-color: #007bff; color: #fff; cursor: pointer;">Buscar</button>
        </form>

        </div>  
        
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #333; color: #fff;">
                        <th style="padding: 10px;">Marca</th>
                        <th style="padding: 10px;">Modelo</th>
                        <th style="padding: 10px;">Año</th>
                        <th style="padding: 10px;">Color</th>
                        <th style="padding: 10px;">Motor</th>
                        <th style="padding: 10px;">Imagen</th>
                        <th style="padding: 10px;">Baja</th>
                        <th style="padding: 10px;">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($vehiculos as $vehiculo): ?>
                        <tr style="background-color: #f2f2f2;">
                        <td style="padding: 10px;"><?php echo $vehiculo['marca'] ?></td>
                        <td style="padding: 10px;"><?php echo $vehiculo['modelo'] ?></td>
                        <td style="padding: 10px;"><?php echo $vehiculo['año'] ?></td>
                        <td style="padding: 10px;"><?php echo $vehiculo['color'] ?></td>
                        <td style="padding: 10px;"><?php echo $vehiculo['motor'] == 1 ? 'Admin' : 'Usuario' ?></td>
                        <td style="padding: 10px;">
                        <img width="100px" src="<?php echo base_url('assets/img/uploads/'.$vehiculo['img']) ?>" >
                        </td>
                        <td style="padding: 10px;"><?php echo $vehiculo['baja'] ?></td>
                        <td style="padding: 10px;"><?php echo $vehiculo['precio'] ?></td>
                        <td style="padding: 10px;">
                        <div style="display: flex; flex-direction: column; gap: 10px">
                        <a href="<?php echo base_url('api/vehiculos/delete/').$vehiculo['id'] ?>">
                            <button type="submit" style=" width: 100%; padding: 5px 10px; background-color: red; color: white; border: none; border-radius: 4px; cursor: pointer;">Dar de baja</button>
                            </a>
                        <a href="<?php echo base_url('admin/vehiculos/edit/').$vehiculo['id'] ?>">
                            <button type="submit" style=" width: 100%; padding: 5px 10px; background-color: orange; color: white; border: none; border-radius: 4px; cursor: pointer;">Modificar</button>
                            </a>
                        </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                    <?php endif; ?>
                    <!-- Aquí agregar más filas según la data -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .activecustom {
        font-weight: 700 !important;
        color: #B69A09 !important;
        background-color: #B69A09 !important;
        font-size: medium;
    }   
</style>
