<?php
    session_start();
        if(isset($_SESSION["nivel"])){
             
             $nivel= $_SESSION["nivel"];
             $id_unidad= $_SESSION["id_unidad"];
             $unidad= $_SESSION["unidad"];
             
    }else{
           header("Location:../page-login.php");
        }
?>
<!DOCTYPE html>
<html lang="en">

 <!-- /# sidebar -->
    <?php require 'template/menu.php'?>
    
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>
                                <?php print "<p class='display-6 mt-3' >Unidad de " .$_SESSION["unidad"] ." </p>";?>

                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-8 ml-5">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg">Agregar</button>
                            <table class="table" >
                                <thead>
                                  <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Nombre de usuario</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Unidad</th>
                                    <th scope="col">Tipo de Usuario</th>
                                    <th scope="col">Acciones</th>
                                  </tr>
                                </thead>
                                <tbody id="tblUsers"></tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="bootstrap-modal">
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                          <h5 class="card-title text-center text-primary">Agregar nuevo usuario</h5>
                                            <div class="form-validation mt-3">
                                                <form class="form-valide" method="POST" id="frmUser" action="#">
                                                   
                                                    <input id="id_usuario" type="hidden" value="0" class="form-control">                                                        
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-username">Username <span class="text-danger">*</span> </label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="nombre" name ="nombre" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-username">Correo <span class="text-danger">*</span></label>
                                                        <div class="col-lg-6">
                                                            <input type="text" class="form-control" id="correo" name ="correo" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-password">Contraseña <span class="text-danger">*</span></label>
                                                        <div class="col-lg-6">
                                                            <input type="password" class="form-control" id="clave" name="clave" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-password">Confirmar Contraseña <span class="text-danger">*</span></label>
                                                        <div class="col-lg-6">
                                                            <input type="password" class="form-control" id="reclave" name="reclave" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Unidad<span class="text-danger">*</span></label>
                                                        <div class="col-lg-6">
                                                            <select class="form-control" id="unidad" name="unidad">
                                                                <option value="">Seleccionar</option>
                                                                <?php require_once '../controller/UsuarioController.php';
                                                                    foreach ($unidad as $key) {
                                                                        echo "<option value=".$key["id_unidad"].">".$key["nombre"]."</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label" for="val-skill">Tipo Usuario<span class="text-danger">*</span></label>
                                                        <div class="col-lg-6">
                                                            <select class="form-control" id="tipo" name="tipo">
                                                                <option value="">Seleccionar</option>
                                                                    <?php require_once '../controller/UsuarioController.php';
                                                                            foreach ($tipo as $key) {
                                                                                 echo "<option value=".$key["id_tipo_usuario"].">".$key["nombre_tipo"]."</option>";
                                                                            }
                                                                    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-8 ml-auto">
                                                            <button type="submit" name="add" id="#add" onclick="postUser()"  class="btn btn-rounded btn-warning">Guardar</button>
                                                            <button type="button" id="#clear" onclick="clearForm()" class="btn btn-rounded btn-primary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>       
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="assets/js/usuarios.js"></script>
    <!-- Common -->
    <script src="assets/js/lib/jquery.min.js"></script>
        <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
        <script src="assets/js/lib/menubar/sidebar.js"></script>
        <script src="assets/js/lib/preloader/pace.min.js"></script>
        <script src="assets/js/lib/bootstrap.min.js"></script>
        <script src="assets/js/scripts.js"></script>
</body>
</html>