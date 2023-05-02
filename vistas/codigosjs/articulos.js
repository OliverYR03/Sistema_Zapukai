var tabla;



function init() {

    mostrarFormulario(false);
    listar();


    $("#formulario").on("submit", function (e) {
        
        guardaryeditar(e);
    })

    //Cargamos los items al select categoria
	$.post("../ajax/articulos.php?op=selectCategoria", function(r){
	            $("#idcategoria").html(r);
	            //$('#idcategoria').selectpicker('refresh');

	});


    


    


   

}




function limpiar() {

    $("#codigo").val("");
    $("#nombre").val("");
    $("#descripcion").val("");
    $("#stock").val("");
    $("#imagen").val("");
    $("#imagenmuestra").val("src","");
    $("#imagenactual").val("");
    $("#print").hide();
    $("#idarticulo").val("");

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
                        url     : '../ajax/articulos.php?op=listar',
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
		url: "../ajax/articulos.php?op=guardareditar",
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






function mostrar(idarticulo) {


    $.post("../ajax/articulos.php?op=mostrar",{idarticulo : idarticulo}, function (data, status)

    {
        
        data = JSON.parse(data);
        mostrarFormulario(true);

        $("#idcategoria").val(data.idcategoria);
        // $("#idcategoria").selectpicker('refresh');
        $("#codigo").val(data.codigo);
        $("#nombre").val(data.nombre);
        $("#stock").val(data.stock);
        $("#descripcion").val(data.descripcion);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/articulos/">data.imagen);
        $("#imagenactual").val(data.imagen);
        $("#idarticulo").val(data.idarticulo);
        generarbarcode();
        
        
    
        } )
}

function desactivar(idarticulo){

    bootbox.confirm("¿Estás Seguro de desactivar la Categoría?", function (result){
        if (result) {

            $.post("../ajax/articulos.php?op=desactivar", {idarticulo : idarticulo}, function(e){
                bootbox.alert(e);
                tabla.ajax.reload();
            });


        }
    })
}


function activar(idarticulo){

    bootbox.confirm("¿Estás Seguro de activar la Categoría?", function (result){
        if (result) {

            $.post("../ajax/articulos.php?op=activar", {idarticulo : idarticulo}, function(e){
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