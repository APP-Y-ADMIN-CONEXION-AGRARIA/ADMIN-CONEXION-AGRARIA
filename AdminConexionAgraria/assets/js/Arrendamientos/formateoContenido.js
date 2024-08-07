/* Formateo  de contenido del los input */
document.addEventListener("DOMContentLoaded", function () {
  const fechaInicio = document.getElementById("fecha_inicio");
  const fechaFinalizacion = document.getElementById("fecha_finalizacion");
  const valorArrendamiento = document.getElementById("valor_arrendamiento");

  function formatFecha(input) {
    input.addEventListener("input", function () {
      let value = input.value.replace(/\D/g, ""); // Eliminar caracteres no numéricos
      if (value.length > 8) value = value.slice(0, 8); // Limitar a 8 dígitos (YYYYMMDD)

      // Formatear la fecha como YYYY-MM-DD
      let formattedValue = value;
      if (value.length >= 4) {
        formattedValue = value.slice(0, 4) + "-" + value.slice(4);
      }
      if (value.length >= 6) {
        formattedValue =
          value.slice(0, 4) + "-" + value.slice(4, 6) + "-" + value.slice(6);
      }
      input.value = formattedValue;
    });
  }

  function formatValor(input) {
    input.addEventListener("input", function () {
      let value = input.value.replace(/\D/g, ""); // Eliminar caracteres no numéricos

      // Formatear el número con puntos decimales
      let formattedValue = new Intl.NumberFormat("de-DE").format(value);
      input.value = formattedValue;
    });
  }

  formatFecha(fechaInicio);
  formatFecha(fechaFinalizacion);
  formatValor(valorArrendamiento);
});
