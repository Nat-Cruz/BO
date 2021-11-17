
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

 