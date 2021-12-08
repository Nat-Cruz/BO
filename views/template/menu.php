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
    <!-- Datatable -->
    <link href="assets/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <div class="logo">
                    <a href="index.html">
                        <!-- <img src="assets/images/logo.png" alt="" /> -->
                        <span>Ministerio de Cultura</span>
                    </a>
                </div>
                <ul>
                    <li class="label">Main</li>
                    <li>
                        <a class="sidebar-sub-toggle">
                            <i class="ti-home"></i> Dashboard
                            <a href="app-event-calender.html"></a>
                        </a>
                        
                    </li>
                    <li class="label">Gestionar</li>
                    
                   
                <?php
                    if(isset($_SESSION['nivel'])){
                        $nivel =$_SESSION['nivel'];
                        if($nivel == 'Administrador' || $nivel == 'Super-Administrador'){

                      
                ?>
                 <li>
                  <a href="./usuarios.php">
                            <i class="ti-user"></i>Usuarios</a>
                 </li>
                    
                    <li>
                        <a href="./avisosAdmin.php">
                            <i class="ti-calendar"></i> Avisos </a>
                    </li>
                    
                    <li>
                        <a href="./unidades.php">
                    <i class="ti-layout-grid2-alt"></i> Unidades</a>
                    <li>
                        <a href="./descargas.php">
                        <i class="ti-panel"></i>  Descargas</a>
                    </li>    
                <?php
                      }else if($nivel == 'Editor'){
                ?>
                 <li>
                        <a href="./avisos.php">
                            <i class="ti-calendar"></i> Avisos </a>
                    </li>
                    <li>
                        <a href="./descargas.php">
                        <i class="ti-panel"></i>  Descargas</a>
                    </li> 
                <?php
                 }
                }
                ?>
                      
                </ul>
            </div>
        </div>
    </div>
<!-- /# sidebar -->
<!-- # header -->
<div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                       
                    </div>
                    
                    <div class="float-right">
                     <div class="dropdown dib">
                            <div class="" data-toggle="">
                           <?php
                           print " <a  href='../controller/AccesoController.php?cerrar=true '>
                                                    <i class='ti-power-off'></i>
                                                    <span>Logout</span></a>";
                                            
                                    
                             ?>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /# header -->

 