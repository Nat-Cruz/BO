
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

    <script src="https://kit.fontawesome.com/befa089ca0.js" crossorigin="anonymous"></script>
    <!-- Common -->
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-card.css" rel="stylesheet">
</head>


<body>
 <!-- /# sidebar -->
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>
                            
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                    <?php 
                            $id_unidad = $_REQUEST['unidad'];
                             echo"<input id='id_unidad' name ='id_unidad' type='hidden' value='$id_unidad' class='form-control'>"; ?>
                                                          
                        
                        <!-- /# column -->
                    </div>
                </section>
            </div>
        </div>
    </div>
<div class="container ">  
    <div class="row mt-0">                 
        <div class="col-md-6" id="boletines" >  
                        
        </div><!--Cierre fila Externa-->
        <div class="col-md-6" id="formularios" >  
           
        </div> 
    </div><!--Cierre fila Externa-->
    
</div><!--Cierre fila Externa-->


  
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
	               
   
    <script src="assets/js/pageDescargas.js"></script>

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
