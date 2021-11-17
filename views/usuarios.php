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

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ministerio de Cultura</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Toastr -->
    <link href="assets/css/lib/toastr/toastr.min.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">
    <!-- Range Slider -->
    <link href="assets/css/lib/rangSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="assets/css/lib/rangSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bar Rating -->
    <link href="assets/css/lib/barRating/barRating.css" rel="stylesheet">
    <!-- Nestable -->
    <link href="assets/css/lib/nestable/nestable.css" rel="stylesheet">
    <!-- JsGrid -->
    <link href="assets/css/lib/jsgrid/jsgrid-theme.min.css" rel="stylesheet" />
    <link href="assets/css/lib/jsgrid/jsgrid.min.css" type="text/css" rel="stylesheet" />
    
    <!-- Calender 2 -->
    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <!-- Weather Icon -->
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <!-- Owl Carousel -->
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Select2 -->
    <link href="assets/css/lib/select2/select2.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <!-- Calender -->
    <link href="assets/css/lib/calendar/fullcalendar.css" rel="stylesheet" />

    <!-- Common -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
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