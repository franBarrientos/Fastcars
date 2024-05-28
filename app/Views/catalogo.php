<div style="min-height: 67vh; font-family: Arial, sans-serif; margin: 0; padding: 0;">
    <div style="max-width: 85%; margin: 0 auto; padding: 20px;">
        <h1 style="text-align: center;">Catalogo</h1>
        <?php if (!empty($vehiculos)): ?>
            <div style="text-align: center; display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px;">
                <?php foreach ($vehiculos as $vehiculo): ?>
                    <div style="border: 1px solid #ccc; border-radius: 4px; padding: 15px; background-color: #f9f9f9; box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);">
                        <h2 style="margin-top: 0; color: #333; font-size: 1.5em;
                        font-weight: 600;
                        "><?php echo $vehiculo['marca'] . ' ' . $vehiculo['modelo'] . ' (' . $vehiculo['año'] . ')'; ?></h2>
                        <img src="assets/img/uploads/<?php echo $vehiculo['img']; ?>" alt="<?php echo $vehiculo['marca'] . ' ' . $vehiculo['modelo']; ?>" style="max-width: 100%; height: auto; margin-bottom: 10px; border-radius: 5px;">
                        <div style="display: flex; justify-content: center; gap: 20px;">
                        <p style="margin: 5px 0;"><strong>Precio:</strong> $<?php echo number_format($vehiculo['precio'], 2); ?></p>
                        <p style="margin: 5px 0;"><strong>Color:</strong> <?php echo $vehiculo['color']; ?></p>
                        </div>
                        <p style="margin: 5px 0;"><strong>Motor:</strong> <?php echo $vehiculo['motor']; ?></p>
                        <p style="margin: 5px 0;"><strong>Descripción:</strong> <?php echo $vehiculo['descripcion']; ?></p>
                        
                        <?php if (session()->get('rol') == 'cliente'): ?>
                        
                        <div class="cantidad-container">
                            <button type="button" onclick="cambiarCantidad(-1, <?php echo $vehiculo['id']; ?>)" class="cantidad-boton">-</button>
                            <input readonly type="number" id="cantidad<?php echo $vehiculo['id']; ?>" value="1" min="1" class="cantidad-input">
                            <button type="button" onclick="cambiarCantidad(1, <?php echo $vehiculo['id']; ?>)" class="cantidad-boton">+</button>
                        </div>
                        <button onclick="agregarAlCarrito('<?php echo htmlspecialchars(json_encode($vehiculo), ENT_QUOTES, 'UTF-8'); ?>')" class="hov" style="background-color: #007bff; color: #fff; border: none; border-radius: 5px; padding: 8px 8px; font-size: 16px; cursor: pointer;">
                            Agregar al carrito
                        </button>
                            <?php endif; ?>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p style="text-align: center;">No hay vehículos disponibles en este momento.</p>
        <?php endif; ?>
    </div>
    <?php if (session()->get('user')) {
    echo '<script> var isLogged = true; </script>';
    }else{
        echo '<script> var isLogged = false; </script>';
    }
    ?>
</div>

<style>
.cantidad-container {
    display: inline-flex;
    align-items: center;
}

.cantidad-input {
    width: 60px;
    text-align: center;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    margin: 0 5px;
}

.cantidad-boton {
    padding: 8px 10px;
    border: 1px solid #ccc;
    background-color: #007bff;
    color: #fff;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.cantidad-boton:hover {
    background-color: #0056b3;
}
</style>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
    echo '<script>let rol = "' . session()->get('rol') . '";</script>';
    #echo '<script>let rol = "LALA";</script>';
?>

<script>

function cambiarCantidad(cambio, id) {
    var cantidadInput = document.getElementById('cantidad' + id);
    var nuevaCantidad = parseInt(cantidadInput.value) + cambio;

    // Asegurarse de que la cantidad no sea menor que 1
    if (nuevaCantidad < 1) {
        nuevaCantidad = 1;
    }

    cantidadInput.value = nuevaCantidad;
}


    // Función para agregar un vehículo al carrito
function agregarAlCarrito(vehiculo) {
    vehiculo = JSON.parse(vehiculo);
    var cantidad = document.getElementById('cantidad' + vehiculo.id).value;
    if (!isLogged){
        Swal.fire({ // Mostrar alerta de SweetAlert
            icon: 'error',
            title: 'Error',
            text: 'Debes iniciar sesión para poder agregar un vehículo al carrito.',
            showConfirmButton: false,
            timer: 1500 // Duración en milisegundos
        });
        return;
    }

    let carrito = JSON.parse(localStorage.getItem('carrito')) || []; // Obtener el carrito desde el Local Storage

    carrito.push({...vehiculo, cantidad: parseInt(cantidad)}); // Agregar el vehículo al carrito
    localStorage.setItem('carrito', JSON.stringify(carrito)); // Actualizar el carrito en el Local Storage
    Swal.fire({ // Mostrar alerta de SweetAlert
            icon: 'success',
            title: '¡Agregado al carrito!',
            text: 'El vehículo se ha agregado correctamente al carrito.',
            showConfirmButton: false,
            timer: 1500 // Duración en milisegundos
        });
}
</script>