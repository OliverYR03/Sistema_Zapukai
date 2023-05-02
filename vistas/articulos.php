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
                            <div class="box-header with-border text-center">
                                <h1 class="box-title">Articulos 
                                </h1>
                                <button class="btn btn-success" id="btnagregar"
                                        onclick="mostrarFormulario(true)"><i class="fa fa-plus-circle"></i>
                                        Agregar</button>
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
                                        <th>Categoria</th>
                                        <th>Codigo</th>
                                        <th>stock</th>
                                        <th>Imagen</th>
                                        <th>Estado</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                         <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>Codigo</th>
                                        <th>stock</th>
                                        <th>Imagen</th>
                                        <th>Estado</th>
                                    </tfoot>
                                </table>
                                
                            </div>
                           


                            <div class="card-body" style="heiht: 400px;" id="formularioregistros">
                                <form name="formulario" id="formulario" method="POST">
                                  <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >Nombre</label>
                                            <input type="hidden" name="idarticulo" id="idarticulo">
                                            <input type="text" class="form-control" name="nombre" id="nombre"
                                              placeholder="escribir nombre" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>categoria</label>
                                                <select name="idcategoria" class="form-control"
                                                    id="idcategoria">
                                               </select>
                                            
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >Stock</label>
                                            <input type="text" name="stock" id="stock" class="form-control" placeholder="Stock" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >Descripcion</label>
                                            <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Escribir Descripcion" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >Imagen</label>
                                            <input type="file" name="imagen" id="imagen" class="form-control"><br>
                                            <input type="hidden" name="imagenactual" id="imagenactual">
                                            <img src="" width="150px" height="120px" id="imagenmuestra">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >Codigo</label>
                                            <input type="text" name="codigo" id="codigo" 
                                            class="form-control" placeholder="Insertar URL" required><br>
                                            <button class="btn btn-success" type="button" onclick="generarbarcode()">Generar</button>

                                            <div id="print">
                                                <svg id="barcode"></svg>
                                            </div>
                                        </div>
                                    </div>


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
<script type="text/javascript" src="../vistas/codigosjs/articulos.js"></script>
</html>
