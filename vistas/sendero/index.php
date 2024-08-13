<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sendina</title>
	<link rel="icon" type="image/x-icon" href="<?php echo constant('URL') ?>/public/imgs/icon.ico">
</head>


<body class="bg-sendina">
	
	<?php  require 'vistas/navbar.php' ?>
	<?php  require 'vistas/header.php' ?>
			

	
	<div class="container w-md-75 bg-white p-sm-5 p-3 mt-4 mb-4 border-0 rounded">
		
		<div  class="d-flex pb-4">
			<h3> Lista de senderos interpretativos</h3>
			
			<?php if(isset($_SESSION['user_id'])){ ?>
				<?php if($_SESSION['user_rol']=="Administrador"){ ?>
					<a class="btn btn-primary ml-auto" href="<?php echo constant('URL').'sendero/editar/0'?>"> Nuevo Sendero </a>
				<?php } ?>
			<?php } ?>
			
		</div>
		
		<div class="row">
		
			<?php 
				//var_dump($this->sendero_lista); 
				require_once 'entidades/SenderoBean.php';
				foreach($this->sendero_lista as $item){
					$sendero = new senderoBean();
					$sendero = $item;
					
					if ($sendero->get_status() == 1 || (isset($_SESSION['user_id']) && $sendero->get_status() == 0)) {
			?>
			
			
			<div class="col-12 col-sm-12 mb-5 mx-auto mx-5">
				<div class="card rounded bg-dark border">
					<div class="card-body p-0">
					
						<div class="widget-header bg-primary m-0 p-0 border-0" style="height:250px;">
							<img class="img-header" src="<?php  echo constant('URL') . '/public/imgs/'. $sendero->get_url_portada(); ?>">
						</div>
						
						<div class="row align-items-center p-4">
						
							<div class="col-lg-2 col-6 mx-auto text-nowrap text-center px-2">
								<a href="">
									<img class="d-block mx-auto rounded-circle img-fluid shadow-sm" src="<?php  echo constant('URL') . '/public/imgs/'. $sendero->get_url_logo(); ?>">
								</a>
							</div>
							
							<div class="col-lg-7 text-center text-lg-left">
							
								<h3 class="d-inline text-primary">
									<?php echo $sendero->get_nombre(); ?>
								</h3>
								
								<h6 class="text-light"><?php echo $sendero->get_sede(); ?> </h6>
								
								<h4 class="d-inline text-primary">
									<?php if (isset($_SESSION['user_id'])){ ?>
										<span class="badge badge-<?php echo $sendero->get_status() == 1 ? 'success' : 'danger'; ?>">
											Este sendero es<?php echo $sendero->get_status() == 1 ? ' público' : 'tá oculto'; ?>
										</span>
									<?php } ?>
								</h4>
								
								<ul class="list-inline mt-3">
									<li class="list-inline-item">
										<a href="<?php echo constant('URL') . 'sendero/ver/' . $sendero->get_id_sendero(); ?>" class="btn btn-primary rounded">Ver sendero</a>
									</li>
									
									<?php if(isset($_SESSION['user_id'])){ ?>
										<?php if($_SESSION['user_rol']=="Administrador" || $_SESSION['user_rol']=="Editor" ){ ?>
											<li class="list-inline-item">
											   <a class="btn btn-secondary" href="<?php echo constant('URL') . 'sendero/editar/' . $sendero->get_id_sendero(); ?>"> Editar </a> 	
											</li>	
										<?php } ?>
									<?php } ?>
								</ul>
								
							</div>
							
							<div class="col-lg-2 col-6 mx-auto">
								<div class="row no-gutters text-center justify-content-end align-items-end">
									<div class="col">
										<h2 class="text-light"><?php echo $sendero->get_num_estaciones(); ?></h2>
										<span class="badge badge-pill badge-dark font-weight-normal">estaciones</span>
									</div>
								</div>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
			
			<?php	
					}
				}
			?>
		</div>
		<!-- <p> <?php echo $this->mensaje; ?></p> -->

	</div>
	
	<?php  require 'vistas/footer.php' ?>
	

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	

</body>

</html>