document.addEventListener("DOMContentLoaded", function () {
    // Confirmación genérica para eliminar registros
    const eliminarLinks = document.querySelectorAll("a[href*='delete'], a.eliminar");

    eliminarLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            if (!confirm("¿Está seguro de eliminar este elemento? Esta acción no se puede deshacer.")) {
                e.preventDefault();
            }
        });
    });

    // Confirmación para anular órdenes
    const anularLinks = document.querySelectorAll("a[href*='anular']");

    anularLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            if (!confirm("¿Deseas anular esta orden?")) {
                e.preventDefault();
            }
        });
    });

    // Mostrar precio unitario automáticamente si está cargado (para formularios de orden)
    const platosSelect = document.querySelectorAll(".plato-select");

    platosSelect.forEach(select => {
        select.addEventListener("change", function () {
            const selected = this.options[this.selectedIndex];
            const precio = selected.getAttribute("data-precio");
            const precioInput = document.querySelector(`#${this.getAttribute('data-precio-target')}`);
            if (precioInput && precio) {
                precioInput.value = precio;
            }
        });
    });
});
