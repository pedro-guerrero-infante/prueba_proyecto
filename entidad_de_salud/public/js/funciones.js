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

function addMedicamento(){
    $('#div_medicamentos').removeClass('d-none');

    var n = 1;
    var ultimo = 1;
    while( n < 5){
        if(document.getElementById("medicamento_"+n) == null){
           
            ultimo = n;
            n = 5;
        }
        n++;
    }

    var ruta = '/prueba_trabajo/entidad_de_salud/public/Home/desplegable_medicamentos';
    $.post(ruta, { ultimo : ultimo }, function (data) {
        $('#form_group_medicamento_'+ultimo).removeClass('d-none');
        $('#form_group_medicamento_'+ultimo).html(data);
    });
}

function removeMedicamento(){
    var n = 4;
    while( n > 0){
        if(document.getElementById("medicamento_"+n) == null){
        } else {
            $('#form_group_medicamento_'+n).addClass('d-none');
            $('#form_group_medicamento_'+n).html('');
            n = 0;
        }
        n--;
    }
}