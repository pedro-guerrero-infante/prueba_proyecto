function getMunicipios(){
    var departamento = $('#id_departamento').val();
    var ruta = '/prueba_trabajo/entidad_de_salud/public/Home/getMunicipios';

    $.post(ruta, { departamento: departamento }, function (data) {
        $('#id_municipios').html(data);
    });
}

function mostrarFiltros(){
    var dnone = true;
    document.getElementById("filtros").classList.forEach(element => {
        if(element == "d-none"){
            dnone = false;
            $("#filtros").removeClass('d-none');
        }
    });

    if(dnone){
        $("#filtros").addClass('d-none');
    }
}