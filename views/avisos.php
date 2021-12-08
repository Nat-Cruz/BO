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
                                <h1><span>
                               <?php print "<p class='display-6 mt-3' >Unidad de " .$_SESSION["unidad"] ." </p>";?>
                                    </span>
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
                            <table class="table">
                                <thead>
                                  <tr>
                                  <th scope="col">Nombre</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Archivo</th>
                                    <th scope="col">Prioridad</th>
                                    <th scope="col">Fecha Inicio</th>
                                    <th scope="col">Fecha Fin</th>
                                    <th scope="col">Tipo Aviso</th>
                                    <th scope="col">Unidad</th>
                                    <th scope="col">Acciones</th>
                                  </tr>
                                </thead>
                                <tbody id="tbl">
                              
                                </tbody>
                              </table>
                        </div>
                        <!-- /# column -->
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
                                            <h5 class="card-title text-center text-primary">Nuevo Aviso</h5>
                                                <div class="form-validation mt-3">
                                                    <form class="form-valide" method="POST" action ="" id="frm" enctype="multipart/form-data">
                                                    <?php 
                                                            
                                                            echo"<input id='nivel' type='hidden' value='$nivel' class='form-control'>";
                                                            echo"<input id='id_unidad' name ='id_unidad' type='hidden' value='$id_unidad' class='form-control'>"; ?>
                                                        
                                                        <input id='key_unidad' type='hidden' value='<?php $id_unidad?>' name ="key_unidad" class='form-control'>
                                                        <input id="id" name="id" type="hidden" value='0' class="form-control">
                                                        <div class="form-group row">   
                                                            <label class="col-xl-2 col-form-label" for="val-username">Titulo  <span class="text-danger">*</span> </label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control" id="nombre" name="nombre" >
                                                                </div>
                                                            
                                                        </div>
                                                        <span class="text-danger">Define el tiempo que estara vigente el aviso</span><br>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label" for="val-username">Fecha inicio <span class="text-danger">*</span></label>
                                                                <div class="col-md-4">
                                                                    <input type="date" class="form-control" id="fechaI" name="fechaI" >
                                                                </div>
                                                            <label class="col-md-2 col-form-label" for="val-username">Fecha Fin <span class="text-danger">*</span></label>
                                                                <div class="col-md-4">
                                                                    <input type="date" class="form-control" id="fechaF" name="fechaF"  >
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label" for="val-skill">Prioridad<span class="text-danger">*</span> </label>
                                                                <div class="col-md-4">
                                                                    <select class="form-control" id="estado" name="estado">
                                                                        <option value="0">Seleccionar</option>
                                                                        <option value="1">Urgente</option>
                                                                        <option value="2">General</option>
                                                                    </select>
                                                                </div>
                                                            <label class="col-md-2 col-form-label" for="val-skill">Tipo Aviso<span class="text-danger">*</span></label>
                                                                <div class="col-lg-4">
                                                                    <select class="form-control" id="tipo" name="tipo">
                                                                        <option value="">Seleccionar</option>
                                                                        <?php require_once '../controller/AvisoController.php';
                                                                            foreach ($tipo as $key) {
                                                                                echo "<option value=".$key["id_tipo_aviso"].">".$key["nombre"]."</option>";
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                        </div>    
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label">Imagen de Portada<span class="text-orange">*</span></label><br>
                                                                <div class="col-lg-8">
                                                                    <input type="file" class="form-control" name ="imagen" id="imagen">
                                                                </div> 
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-2 col-form-label">Archivo<span class="text-orange">*</span></label><br>
                                                                <div class="col-lg-8">
                                                                    <input type="file" class="form-control" name ="archivo" id="archivo">
                                                                </div>    
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label" for="val-username">Breve Descripcion <span class="text-danger">*</span> </label>
                                                                <div class="col-lg-8">
                                                                    <textarea class="form-control" id="descripcion" maxlength="150"  name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-8 ml-auto">
                                                                <button type="submit" name="add" id="#add" onclick="postAviso()" class="btn btn-rounded btn-warning">Guardar</button>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	               
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>   

    <script src="assets/js/avisos.js"></script>

<!--  Common -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
<!--  Dashboard 1 -->
  
</body>

</html>
