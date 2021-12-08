<?php
    session_start();
        if(isset($_SESSION["nivel"])){
             
             $nivel= $_SESSION["nivel"];
             $id_unidad= $_SESSION["id_unidad"];
             $unidad= $_SESSION["unidad"];
	         $id_usuario= $_SESSION["id_usuario"];

             
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
                            <table class="table table-striped" >
                                <thead>
                                  <tr>
                                    <th scope="col">Nombre de archivo</th>
                                    <th scope="col">Archivo</th>
                                    <th scope="col">Tipo</th>
				                    <th scope="col">Fecha</th>
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
                                          <h5 class="card-title text-center text-primary">Descargas</h5>
                                            <div class="form-validation mt-3">
                                                <form class="form-valide" method="POST" id="frm" enctype="multipart/form-data">
                                                    <input id="id_descarga" value="0" type="hidden"  class="form-control" name ="id_descarga">
                                                   <?php
                                                    echo"<input id='id_usuario' name='id_usuario' type='hidden' value='$id_usuario' class='form-control'>"; 
                                                    ?>
                                                    
                                                   <input id="fecha" type="hidden"  class="form-control">                                                       
                                                    <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="val-username">Nombre <span class="text-danger">*</span> </label>
                                                            <div class="col-lg-6">
                                                                <input type="text" class="form-control" id="nombre" name ="nombre" >
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                            
							 <label class="col-md-3 col-form-label" for="val-username">Archivo <span class="text-danger">*</span> </label>
                                                            <div class="col-md-6">
                                                                
								   <input type="file" class="form-control" name ="archivo" id="archivo">

                                                            </div>
                                                         
                                                    </div>
                                                    <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="val-skill">Tipo de archivo<span class="text-danger">*</span> </label>
                                                                <div class="col-md-4">
                                                                    <select class="form-control" id="tipo" name="tipo">
                                                                        <option value="0">Seleccionar</option>
                                                                        <option value="1">Boletín</option>
                                                                        <option value="2">Formulario</option>
                                                                    </select>
                                                                </div>
                                                    </div>  
                                                    <div class="form-group row">
                                                            <div class="col-lg-8 ml-auto">
                                                                <button type="button" name="add" id="#add" onclick="postDescargas()"  class="btn btn-rounded btn-warning">Guardar</button>
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
    <script src="assets/js/descargas.js"></script>
 <!-- Common -->
 <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>

</body>

</html>
