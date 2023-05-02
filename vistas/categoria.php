<!DOCTYPE html>
<html lang="en">

<?php require_once "header.php"?>


<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


      <!-- Preloader -->
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?php echo $ruta; ?>dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
      </div>

    <!-- Navbar -->
    <?php require_once "navbar.php" ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
   
    <?php require_once "menu.php" ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h1 class="box-title">Categoría 
                                    <button class="btn btn-success" id="btnagregar"
                                        onclick="mostrarFormulario(true)"><i class="fa fa-plus-circle"></i>
                                        Agregar</button>
                                </h1>
                                <div class="box-tools pull-right">
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <!-- centro -->
                            <div class="panel-body table-responsive" id="listadoregistros">
                                <table id="tablalistado"
                                    class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <!-- <tfoot>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Estado</th>
                                    </tfoot> -->
                                </table>
                            </div>



                            <div class="panel-body" style="heiht: 400px;" id="formularioregistros">
                                <form name="formulario" id="formulario" method="POST">
                                   <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label >Nombre:</label>
                                        <input type="hidden" name="idcategoria" id="idcategoria">
                                        <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
                                   </div>
                                   <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label >Descripción:</label>
                                        
                                        
                                        <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                                   </div>
                                   <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>
                                   
                                    <button class="btn btn-danger" onclick="cancelarFormulario()" type="button"> <i class="fa fa-arrow-circle-left"> Cancelar</i></button>
                                    </div>



                                </form>
                            </div>






                            <!--Fin centro -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </section><!-- /.content -->




        </div>
    <!-- /.content-wrapper -->
    
    <?php require_once "footer.php" ?>
</body>
<script type="text/javascript" src="../vistas/codigosjs/categoria.js"></script>
</html>
