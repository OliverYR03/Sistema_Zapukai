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
                                <h1 class="box-title">Usuario 
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
                                        <th>Documentos</th>
                                        <th>Número</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Login</th>
                                        <th>Foto</th>
                                        <th>Estado</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <th>Opciones</th>
                                        <th>Nombre</th>
                                        <th>Documentos</th>
                                        <th>Número</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Login</th>
                                        <th>Foto</th>
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
                                            <input type="hidden" name="idusuario" id="idusuario">
                                            <input type="text" class="form-control" name="nombre" maxlength="100" id="nombre"
                                              placeholder="Nombre" required>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>tipo documento</label>
                                                <select name="tipo_documento" class="form-control"
                                                    id="tipo_documento">
                                                    <option value="DNI">DNI</option>
                                                    <option value="RUC">RUC</option>
                                                    <option value="CEDULA">CEDULA</option>
                                               </select>
                                            
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >numero</label>
                                            <input type="text" name="num_documento" id="num_documento" maxlength="20" class="form-control" placeholder="Stock" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >Direcciones</label>
                                            <input type="text" name="direccion" id="direccion" maxlength="70" class="form-control" placeholder="Escribir Descripcion" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >telefono</label>
                                            <input type="text" name="telefono" id="telefono" maxlength="20" class="form-control" placeholder="Escribir Descripcion" required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >email</label>
                                            <input type="text" name="email" id="email" class="form-control"  required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >cargo</label>
                                            <input type="text" name="cargo" id="cargo" class="form-control"  required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >login</label>
                                            <input type="text" name="login" id="login" class="form-control"  required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >clave</label>
                                            <input type="text" name="clave" id="clave" class="form-control"  required>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label >permisos</label>
                                            <ul style="list-style: none;" id="permisos">
                                        
                                            </ul>
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
<script type="text/javascript" src="../vistas/codigosjs/usuarios.js"></script>
</html>
