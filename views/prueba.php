<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <form class="row g-2 m-5" action="" method="POST" id="frm" enctype="multipart/form-data">
  <input id="id" name="id" type="hidden" value='0' class="form-control">
  <div class="col-5">
    <label for="staticEmail2" class="label">Titulo</label>
    <input type="text" class="form-control" id="nombre" name="nombre" >
  </div>
  <div class="col-5">
    <label>Imagen o Archivo <span class="text-orange">*</span></label><br>
    <input type="file" class="form-control" name ="archivo" id="archivo">
   </div>
  <div class="col-5">
    <label class="col-lg-4 col-form-label" for="val-username">Descripcion <span class="text-danger">*</span> </label>
    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>                                                         
  </div>
  <div class="col-6">
    <div class="row">
    <span class="text-danger">Define el tiempo que estara vigente el aviso</span><br>
    <div class="col-6">
    
    <label class="col-lg-4 col-form-label" for="val-username">Fecha inicio <span class="text-danger">*</span></label>
    <input type="date" class="form-control" id="fechaI" name="fechaI" >
    </div>
    <div class="col-6">
    <label class="col-lg-4 col-form-label" for="val-username">Fecha Fin <span class="text-danger">*</span></label>
    <input type="date" class="form-control" id="fechaF" name="fechaF"  >
    </div>                                               
  </div>
  </div>
</form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
