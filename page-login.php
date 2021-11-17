<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MINISTERIO DE CULTURA</title>

    <!-- Styles -->
    <link href="views/assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="views/assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="views/assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="views/assets/css/lib/helper.css" rel="stylesheet">
    <link href="views/assets/css/style.css" rel="stylesheet">
</head>

<body style="background:#343957;">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="index.html"><span></span></a>
                        </div>
                        <div class="login-form">
                            <h4><img src="views/images/logo.png"></h4>
                            <form method="POST" action="controller/AccesoController.php">
                                <div class="form-group">
                                   
                                <input type="text"  class="form-control" id="usuario" name="usuario" placeholder="Nombre de usuario">
                                </div>
                                <div class="form-group">
                                <input type="password" class="form-control" id="clave" name="clave"  placeholder="Contraseña">
                                </div>
                                
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name ="btn">Iniciar Sesión</button>
                               
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
