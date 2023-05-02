var tabla;



function init() {

    mostrarFormulario(false);
    listar();


    $("#formulario").on("submit", function (e) {
        
        guardaryeditar(e);
    })

    $("#imagenmuestra").hide();

    $.post("../ajax/usuarios.php?op=permisos&id=", function(r){
        $("#permisos").html(r);
    });

    


   

}




function limpiar() {

    $("#nombre").val("");
    $("#num_documento").val("");
    $("#direccion").val("");
    $("#telefono").val("");
    $("#email").val("");
    $("#cargo").val("");
    $("#login").val("");
    $("#clave").val("");
    $("#imagenmuestra").attr("src","");
    $("#imagenactual").val("");
    $("#idusuario").val("");

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
                        url     : '../ajax/usuarios.php?op=listar',
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
		url: "../ajax/usuarios.php?op=guardareditar",
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






function mostrar(idusuario) {


    $.post("../ajax/usuarios.php?op=mostrar", {idusuario : idusuario}, function (data, status)

    {
        
        data = JSON.parse(data);
        mostrarFormulario(true);

        $("#nombre").val(data.nombre);
        $("#tipo_documento").val(data.tipo_documento);
        $("#tipo_documento").selectpicker('refresh');
        $("#num_documento").val(data.num_documento);
        $("#direccion").val(data.direccion);
        $("#telefono").val(data.telefono);
        $("#email").val(data.email);
        $("#carggo").val(data.cargo);
        $("#login").val(data.login);
        $("#clave").val(data.clave);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/usuarios/".data.imagen);
        $("#imagenactual").val(data.imagen);
        $("#idusuario").val(data.idusuario);
        
        
    
        });

        $.post("../ajax/usuarios.php?op=permisos&id="+idusuario,function(r){
                $("#permisos").html(r);
        })
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












init();