 <div style="min-height: 70vh; display: flex;">
    <div style="display: flex; background-color: #f0f0f0; flex: 1;">
        <div style="min-height: 100%; flex: 1; padding: 20px;">
            <ul style="list-style-type: none; padding: 0; margin: 0;">
                <li style="cursor: pointer;margin-bottom: 10px;  padding: 10px; background-color: #ddd;"><a href="<?php echo base_url('admin');?>" style="text-decoration: none; color: #333; font-weight: bold;">Usuarios</a></li>
                <li style="cursor: pointer;margin-bottom: 10px;  padding: 10px; background-color: #ddd;"><a href="<?php echo base_url("admin/vehiculos");?>" style="text-decoration: none; color: #333; font-weight: bold;">Vehículos</a></li>
                <li 
                class=<?= $page == 'admin' ? "'activecustom'" : "'off'"; ?>
                style="cursor: pointer;margin-bottom: 10px;  padding: 10px; background-color: #ddd;"><a href="<?php echo base_url('admin/consultas');?>" style="text-decoration: none; color: #333; font-weight: bold;">Consultas</a></li>
            </ul>
        </div>
        <div style="min-height: 100%; flex: 7; padding: 20px;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #333; color: #fff;">
                        <th style="padding: 10px;">Nombre</th>
                        <th style="padding: 10px;">Email</th>
                        <th style="padding: 10px;">Tipo</th>
                        <th style="padding: 10px;">Mensaje</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultas as $c): ?>
                        <tr style="background-color: #f2f2f2;">
                        <td style="padding: 10px;"><?php echo $c['nombre'] ?></td>
                        <td style="padding: 10px;"><?php echo $c['email'] ?></td>
                        <td style="padding: 10px;"><?php echo $c['tipo'] == 1 ? 'Contacto' : 'Consulta' ?></td>
                        <td style="padding: 10px;"><?php echo $c['mensaje'] ?></td>
                        <td style="padding: 10px;">
                        <form  action="api/cs/delete/<?php echo $c['id'] ?>">
                            <input type="hidden" name="id" value="<?php echo $c['id'] ?>">
                            <button type="submit" style="padding: 5px 10px; background-color: green; color: white; border: none; border-radius: 4px; cursor: pointer;">Responder</button></td>
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
