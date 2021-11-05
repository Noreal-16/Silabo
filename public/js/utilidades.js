//Cargar datos de Facultad a Combo
$(document).ready(function () {
    $.get("{{route('facultad.cargaDatos')}}", function(facultad){
    //asignar datos recuperados
    var opcion = '';
    $.each(facultad, function (index, item) {
        opcion += '<option  value= ' + item.id + '>' + item.nomFacultad + '</option>';
    });
    $("#nombFacultad").html(opcion);
    $("#nFacultad").html(opcion);
    })
});
