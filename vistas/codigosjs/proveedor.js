var tabla;



function init() {

    mostrarFormulario(false);
    listar();


    $("#formulario").on("submit", function (e) {
        
        guardaryeditar(e);
    })



    


   

}




function limpiar() {

    $("#nombre").val("");
    $("#num_documento").val("");
    $("#direccion").val("");
    $("#telefono").val("");
    $("#email").val("");
    $("#idpersona").val("");

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



function cancelarFormulario() {

    limpiar();
    mostrarFormulario(false);

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
                        url     : '../ajax/persona.php?op=listarp',
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

function guardaryeditar(e) {

    e.preventDefault(); //No se activará la acción predeterminada del evento
    $("#btnGuardar").prop("disabled", true);
    var formData = new FormData($("#formulario")[0]);


    	$.ajax({
		url: "../ajax/persona.php?op=guardareditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarFormulario(false);
	          tabla.ajax.reload();
	    }

        });
    
    limpiar();

}  






function mostrar(idpersona) {


    $.post("../ajax/persona.php?op=mostrar", {idpersona : idpersona}, function (data, status)

    {
        
        data = JSON.parse(data);
        mostrarFormulario(true);

        $("#nombre").val(data.nombre);
        $("#tipo_documento").val(data.tipo_documento);
        $("#num_documento").val(data.num_documento);
        $("#direccion").val(data.direccion);
        $("$telefono").val(data.telefono);
        $("$email").val(data.email);
        $("$idpersona").val(data.idpersona);
        
        
    
        } )
}

function eliminar(idpersona){

    bootbox.confirm("¿Estás Seguro de eliminar al proveedor?", function (result){
        if (result) {

            $.post("../ajax/persona.php?op=eliminar", {idpersona : idpersona}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });


        }
    })
}

function generarbarcode() {

    codigo= $("#codigo").val();
    JsBarcode("#barcode", codigo)

    $("#print").show();



}











init();