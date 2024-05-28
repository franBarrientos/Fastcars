<div style="min-height: 64vh; font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;">
<div style="max-width: 800px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
    <div style="display: flex; align-items: center;">
    <h1 style="flex: 1; text-align: center; color: #333;">Carrito de Compras</h1>
    <button onclick="vaciarCarrito()" style="text-wrap: nowrap; flex: 0; background-color: orange; color: #fff; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer;">Vaciar carrito</button>
    </div>
    <div id="carrito" style="margin-top: 20px;"></div>
    <div id="precio-total" class="precio-total" style="text-align: right; margin-top: 20px; font-size: 20px; color: #007bff;"></div>
    <button onclick="descargarFactura()" style="text-align: center; margin-top: 20px; font-size: 18px; color: #fff; background-color: #007bff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">Imprimir Factura</button>

</div>
</div>



<script>
    function cargarProductosCarrito() {
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        const carritoDiv = document.getElementById('carrito');
        const precioTotalDiv = document.getElementById('precio-total');
        carritoDiv.innerHTML = ''; // Limpiar contenido anterior del carrito
        let precioTotal = 0;

        if (carrito.length === 0) {
            carritoDiv.innerHTML = '<p>El carrito está vacío.</p>';
            precioTotalDiv.innerHTML = '';
        } else {
            carrito.forEach(vehiculo => {
                const productoHTML = `
                    <div style="border-bottom: 1px solid #ccc; padding: 10px 0; display: flex; justify-content: space-between; align-items: center;">
                        <img src="assets/img/uploads/${vehiculo.img}" alt="${vehiculo.marca} ${vehiculo.modelo}" style="max-width: 100px; height: auto; margin-right: 20px;">
                        <div style="flex: 1;">
                            <h3><span>${vehiculo.cantidad}</span> x ${vehiculo.marca} ${vehiculo.modelo}</h3>
                            <p><strong>Color:</strong> ${vehiculo.color}</p>
                            <p><strong>Precio:</strong> $${vehiculo.precio}</p>
                        </div>
                        <button onclick="eliminarDelCarrito('${vehiculo.id}',event)" style="background-color: #dc3545; color: #fff; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer;">Eliminar</button>
                    </div>
                `;
                carritoDiv.innerHTML += productoHTML;
                precioTotal += parseInt(vehiculo.precio) * parseInt(vehiculo.cantidad); // Sumar el precio del producto al precio total
            });
            precioTotalDiv.innerHTML = `<p style="font-weight:bold;">Total: <span style="color: #333;">$${precioTotal}</span></p>`;
        }
    }

    function vaciarCarrito() {
        localStorage.removeItem('carrito');
        cargarProductosCarrito();
    }

   
    function descargarFactura() {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    let facturaHTML = `
        <div style="font-family: Arial, sans-serif; max-width: 800px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">
            <h1 style="text-align: center; color: #333; margin-bottom: 20px;">Factura de FastCars</h1>
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                <thead>
                    <tr>
                        <th style="border-bottom: 1px solid #ddd; padding: 8px;">Producto</th>
                        <th style="border-bottom: 1px solid #ddd; padding: 8px;">Cantidad</th>
                        <th style="border-bottom: 1px solid #ddd; padding: 8px;">Precio Unitario</th>
                        <th style="border-bottom: 1px solid #ddd; padding: 8px;">Total</th>
                    </tr>
                </thead>
                <tbody>
    `;

    let precioTotal = 0;

    carrito.forEach(vehiculo => {
        const total = vehiculo.precio * vehiculo.cantidad;
        precioTotal += total;

        facturaHTML += `
            <tr>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;">${vehiculo.marca} ${vehiculo.modelo}</td>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;">${vehiculo.cantidad}</td>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;">$${vehiculo.precio}</td>
                <td style="border-bottom: 1px solid #ddd; padding: 8px;">$${total}</td>
            </tr>
        `;
    });

    facturaHTML += `
                </tbody>
            </table>
            <div style="text-align: right; font-weight: bold; font-size: 20px; margin-bottom: 20px;">Total: $${precioTotal}</div>
        </div>
    `;

    const blob = new Blob([facturaHTML], { type: 'text/html' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'factura.html';
    document.body.appendChild(a);
    a.click();
    window.URL.revokeObjectURL(url);
   }
/* 
<script>
    function cargarProductosCarrito() {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];

    const carritoDiv = document.getElementById('carrito');
    carritoDiv.innerHTML = ''; // Limpiar contenido anterior del carrito

    if (carrito.length === 0) {
        carritoDiv.innerHTML = '<p>El carrito está vacío.</p>';
    } else {
        carrito.forEach((vehiculo, index) => {
            const productoHTML = `
                <div>
                    <h3>${vehiculo.marca} ${vehiculo.modelo}</h3>
                    <p>Precio: $${vehiculo.precio}</p>
                    <button onclick="eliminarDelCarrito(${index})">Eliminar</button>
                </div>
            `;
            carritoDiv.innerHTML += productoHTML;
        });
    }
} */

// Función para eliminar un vehículo del carrito
function eliminarDelCarrito(index, e) {
    e.preventDefault();
    console.log(index);
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    carrito = carrito.filter(i => i.id != index);
    localStorage.setItem('carrito', JSON.stringify(carrito)); // Actualizar el carrito en el Local Storage
    cargarProductosCarrito(); // Volver a cargar los productos del carrito en la vista
}

// Cargar productos del carrito al cargar la página
window.addEventListener('DOMContentLoaded', () => {
    cargarProductosCarrito();
});
</script>
