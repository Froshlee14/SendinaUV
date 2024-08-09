<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sendina</title>
</head>


<body class="bg-white">
	
	<?php  require 'vistas/header.php' ?>
			
	<?php  require 'vistas/navbar.php' ?>
	
	<div class="container w-md-75 bg-white p-5 mt-4 mb-4 border-0 rounded">
		
		<div  class="d-flex pb-4">
			<h3>  Senderos Interpretativos </h3>
			
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
				<div class="card rounded bg-sendina-lt border">
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
									<?php if (isset($_SESSION['user_id'])): ?>
										<span class="badge badge-<?php echo $sendero->get_status() == 1 ? 'success' : 'danger'; ?>">
											<?php echo $sendero->get_status() == 1 ? 'Activo' : 'Inactivo'; ?>
										</span>
									<?php endif; ?>
								</h3>
								
								<h6 class="text-black"><?php echo $sendero->get_sede(); ?> </h6>
								
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
										<h2><?php echo $sendero->get_num_estaciones(); ?></h2>
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

</body>

</html>