function actualizarDias() {
    var mes = document.getElementById("mes").value;
    var año = new Date().getFullYear();
    var diasEnMes = new Date(año, mes, 0).getDate();
    var diasSelect = document.getElementById("dia");

    // Limpiar el selector de días
    diasSelect.innerHTML = "";

    // Agregar la opción "Seleccione su día"
    var defaultOption = document.createElement("option");
    defaultOption.value = "a";
    defaultOption.text = "Seleccione su día";
    defaultOption.selected = true;
    diasSelect.appendChild(defaultOption);

    // Agregar los días correspondientes al mes seleccionado
    for (var dia = 1; dia <= diasEnMes; dia++) {
        var option = document.createElement("option");
        option.value = dia;
        option.text = dia;
        diasSelect.appendChild(option);
    }
}
