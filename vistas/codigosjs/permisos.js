var tabla;



function init() {

    mostrarFormulario(false);
    listar();


}





function mostrarFormulario(x) {

    limpiar();

    if (x) {
        $("#listadoregistros").hide();
        $("#formularioregistros").show();
        $("#btnGuardar").prop("disabled", false);
        $("#btnagregar").hide();
   
    } else {
        $("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
    
    }

}

function listar() {

    tabla= $('#tablalistado').dataTable(

        {

            "aProcessing": true, //ACTIVAMOS EL PROCESAMIENTO DEL DATATABLES
            "aServerSide": true, //PAGINACION Y FILTRADO REALIZADOS POR EL SEVIDOR
                dom: 'Bfrtip',       //DEFINIMOS LOS ELEMENTOS DEL CONTROL DE TABLA

                    buttons: [
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdf'
                    ],


                    "ajax":
                    {
                        url     : '../ajax/permisos.php?op=listarp',
                        type    : "get",
                        dataType: "json",
                        error   : function(e){
                            console.log(e.responseText);
                        }
                    },
            
            "bDestroy": true,
            "iDisplayLength": 5,
            "order": [[0, "desc"]]

        }).DataTable();

}



init();