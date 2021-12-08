<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="http://10.30.0.28/wp-content/themes/Divi/images/logo.png">
    <link href="assets/css/style-card.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet"><title>Ministerio de Cultura</title>
</head>

<body>
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" id='slide'>
  <div class="carousel-inner">
      <?php
          require_once '../controller/consultasController.php';
          $active="active";
              for($i=0; $i<count($slide);$i++){
                  if($i!=0){
                    $active="";
                  }
                 
                  echo "
                  <div class='carousel-item $active'>
                      <img src='../views/images/".$slide[$i]["imagen"]."' class='d-block w-100'  style='height:700px;' alt='...'>
				                <div class='carousel-caption d-none d-md-block'>
        				          <h1 class='text-dark'>".$slide[$i]["nombre"]."</h1>
        				          <p class='h4' style='color:#FFA900;'>".$slide[$i]["descripcion"]."</p>
                          
                      <a class='btn btn-success btn-lg' style='border-radius:23px;' href='http://10.30.0.28/BO/views/archivos/".$slide[$i]["archivo"]."'target='_blank'>Ver Más</a>
      				          </div>
                        
                  </div>
                        ";
                }
      ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
 
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
  </script>
</body>

</html>
