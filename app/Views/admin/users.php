<!-- <div  style="min-height: 70vh; display: flex;">
    <div style="display: flex;  flex : 1;">
        <div style="min-height: 100%; flex: 1; padding: 20px;">
        <ul style="list-style-type: none; padding: 0;">
            <li style="margin-bottom: 10px;"><a href="usuarios.php" style="text-decoration: none; color: #333;">Usuarios</a></li>
            <li style="margin-bottom: 10px;"><a href="vehiculos.php" style="text-decoration: none; color: #333;">Vehículos</a></li>
            <li style="margin-bottom: 10px;"><a href="consultas.php" style="text-decoration: none; color: #333;">Consultas</a></li>
        </ul>
        </div>
        <div style="min-height: 100%; flex: 7;  padding: 20px;">

        </div>

    </div> 
    
</div>
 -->
<div style="min-height: 70vh; display: flex;">
    <div style="display: flex; background-color: #f0f0f0; flex: 1;">
        <div style="min-height: 100%; flex: 1; padding: 20px;">
            <ul style="list-style-type: none; padding: 0; margin: 0;">
                <li class=<?= $page == 'admin' ? "'activecustom'" : "'off'"; ?>   style="cursor: pointer;margin-bottom: 10px;  padding: 10px; background-color: #ddd;"><a href="admin/" style="text-decoration: none; color: #333; font-weight: bold;">Usuarios</a></li>
                <li style="cursor: pointer;margin-bottom: 10px;  padding: 10px; background-color: #ddd;"><a href="admin/vehiculos" style="text-decoration: none; color: #333; font-weight: bold;">Vehículos</a></li>
                <li style="cursor: pointer;margin-bottom: 10px;  padding: 10px; background-color: #ddd;"><a href="admin/consultas" style="text-decoration: none; color: #333; font-weight: bold;">Consultas</a></li>
            </ul>
        </div>
        <div style="min-height: 100%; flex: 7; padding: 20px;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #333; color: #fff;">
                        <th style="padding: 10px;">Nombre</th>
                        <th style="padding: 10px;">Apellido</th>
                        <th style="padding: 10px;">Usuario</th>
                        <th style="padding: 10px;">Email</th>
                        <th style="padding: 10px;">Perfil</th>
                        <th style="padding: 10px;">Baja</th>
                        <th style="padding: 10px;">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr style="background-color: #f2f2f2;">
                        <td style="padding: 10px;"><?php echo $user['nombre'] ?></td>
                        <td style="padding: 10px;"><?php echo $user['apellido'] ?></td>
                        <td style="padding: 10px;"><?php echo $user['usuario'] ?></td>
                        <td style="padding: 10px;"><?php echo $user['email'] ?></td>
                        <td style="padding: 10px;"><?php echo $user['perfil_id'] == 1 ? 'Admin' : 'Usuario' ?></td>
                        <td style="padding: 10px;"><?php echo $user['baja'] ?></td>
                        <td style="padding: 10px;">
                        <form  action="api/users/delete/<?php echo $user['id'] ?>">
                            <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                            <button type="submit" style="padding: 5px 10px; background-color: red; color: white; border: none; border-radius: 4px; cursor: pointer;">Dar de baja</button></td>
                        </form>
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
