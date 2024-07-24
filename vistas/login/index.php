<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
	
	<style>
	.gradient-custom-2 {
/* fallback for old browsers */
background: #fccb90;

/* Chrome 10-25, Safari 5.1-6 */
background: -webkit-linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);

/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
background: linear-gradient(to right, #ee7724, #d8363a, #dd3675, #b44593);
}

@media (min-width: 768px) {
.gradient-form {
height: 100vh !important;
}
}
@media (min-width: 769px) {
.gradient-custom-2 {
border-top-right-radius: .3rem;
border-bottom-right-radius: .3rem;
}
}
	</style>
</head>

<body>
		
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
				
					<img src="<?php echo constant('URL') ?>/public/imgs/logo.png" style="width: 185px;" alt="logo">
                  
                  <h5 class="mt-1 mb-5 pb-1">Autenticación</h5>
                </div>

                <form action="<?php echo constant('URL') ?>login/autenticar" method="post" id="senderoForm">

					<div class="form-outline mb-4">
						<input type="text" name="nombre" class="form-control" required>
						<label class="form-label"  for="nombre">Nombre de usuario</label>
					</div>

					<div class="form-outline mb-4">
						<input type="password" name="contrasena" class="form-control" required>
						<label class="form-label" for="contrasena">Contraseña</label>
					</div>

					<div class="text-center pt-1 mb-5 pb-1">
						<button class="btn btn-primary btn-block fa-lg bg-primary mb-3" type="submit"> Iniciar sesion</button>
						<a class="text-muted" href="<?php echo constant('URL') ?>inicio">Continuar como invitado</a>
					</div>
				  
					<p> <?php echo $this->mensaje; ?></p>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center bg-primary">
				<div class="text-white px-3 py-4 p-md-5 mx-md-4">

				</div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

		
</body>

</html>

</html>