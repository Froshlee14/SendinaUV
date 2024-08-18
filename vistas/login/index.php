<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sendina - Autenticación</title>
	<link rel="icon" type="image/x-icon" href="<?php echo constant('URL') ?>/public/imgs/icon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/custom.css">

    <style>
        .gradient-form {
            height: 100vh;
        }
        .card {
            border-radius: .3rem;
        }

    </style>
</head>

<body class="bg-sendina">

<section class="gradient-form">

    <div class="container py-5 h-100">
	
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-6">
                <div class="card rounded-3 text-black">
                    <div class="card-body p-md-5 mx-md-4">
                        <div class="text-center">
                            <img src="<?php echo constant('URL') ?>/public/imgs/logo.png" style="width: 185px;" alt="logo">
                            <h5 class="mt-1 mb-5 pb-1 text-secondary">Autenticación</h5>
                        </div>
                        <form class="form-card"  action="<?php echo constant('URL') ?>login/autenticar" method="post" id="senderoForm">
							
							<div class="row">
								<div class="col">
									<div class="input-group"> 
										<input type="text" name="nombre"  maxlength="20" required> 
										<label>Nombre de usuario</label> 
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col">
									<div class="input-group"> 
										<input type="password" name="contrasena"  maxlength="20" required> 
										<label>Contraseña</label> 
									</div>
								</div>
							</div>
							
							<?php if (!empty($this->mensaje)){ ?>
								<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert">×</button>
									<strong> <?php echo $this->mensaje; ?> </strong>
								</div>
							<?php } ?>

                            <div class="text-center pt-1 mb-5 pb-1">
                                <button class="btn btn-primary btn-block fa-lg bg-primary mb-3" type="submit">Iniciar sesión</button>
                                <a class="text-muted" href="<?php echo constant('URL') ?>inicio">Continuar como invitado</a>
                            </div>
							
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	

<script>
$(document).ready(function(){
  $('.toast').toast('show');
});
</script>



</body>

</html>

</html>