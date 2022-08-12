function cambiarPantalla( ruta ){

    var drops = 1;
    document.getElementById("a_values_1").classList.forEach(element => {
        if(element == "d-none"){
            drops = 0;
        }
    });

    if(ruta == 'createdatabase'){
        $('#a_create_1').addClass('d-none');
        $('#a_create_2').removeClass('d-none');
        $('#a_tables_1').removeClass('d-none');
        $('#a_tables_2').addClass('d-none');
    } else if(ruta == 'createtables'){
        $('#a_values_1').removeClass('d-none');
        $('#a_values_2').addClass('d-none');
    } 

    var ubicacion =  "controlador.php";
    $.post(ubicacion, { ruta : ruta , drops : drops }, function (data) {
        $('#modal_body_mensaje').html(data);
        $('#addBookDialog').removeClass('d-none');
        $('#tabla_opciones').addClass('d-none');
    });
}

function cerrarModal(){
    $('#addBookDialog').addClass('d-none');
    $('#tabla_opciones').removeClass('d-none');
}