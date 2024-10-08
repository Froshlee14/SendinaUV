<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Sendina</title>
	<link rel="icon" type="image/x-icon" href="<?php echo constant('URL') ?>/public/imgs/icon.ico">
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/custom.css">


<style>

</style>
</head>

<body class="bg-sendina">

	<?php  require 'vistas/navbar.php' ?>

	<?php  require 'vistas/header.php' ?> 
	
	<?php 
		//var_dump($this->estacion_lista); 
		//require_once 'entidades/SenderoBean.php';
		//var_dump($this->zona_lista);
		
		$id_sendero = 0;
		$nombre = '';
		$sede = '';
		$year = '';
		$id_zona = 0;
		$url_logo = '';
		
		if($this->sendero !== null){
		
			$id_sendero = $this->sendero->get_id_sendero();
			$nombre = $this->sendero->get_nombre();
			$sede = $this->sendero->get_sede();
			$year = $this->sendero->get_year();
			$id_zona = $this->sendero->get_id_zona();
			$url_logo = $this->sendero->get_url_logo();
		}
		
	?>

	<div class="container bg-white p-0 mt-4 mb-5 border-0 rounded">
	
		<div class="row rounded" data-spy="scroll" data-target="#myScrollspy" data-offset="200">
			<div class="col-12 col-sm-7 p-5 bg-white rounded">
				
				<div class="jumbotron bg-light text-center mb-0 rounded-0">
					<h2> "<?php echo $this->sendero->get_nombre()?>" </h2>
					<h5 class=" text-secondary"> <?php echo $this->sendero->get_sede()?> </h5>
				</div>

				<?php 
				if ($this->estacion_lista !== null) {
					foreach ($this->estacion_lista as $index => $estacion){
				?>
					<div > </div>
					
					<hr class="pt-5" id="list-item-<?php echo $index + 1; ?>">
				
					<div class="estacion-seccion">
						<div class="px-0 py-5">
							<h2 class="text-primary text-center">
								<?php echo $estacion->get_nombre(); ?>
							</h2>
						</div>
						<div class="px-0 py-2">
							<p class="text-justify">
								<?php echo $estacion->get_descripcion(); ?>
							</p>
						</div>
						
						<?php 
						$imagenes = false;
						$carteles = false;
						$videos = false;
			
						foreach ($estacion->get_recursos() as $recurso) {
							if ($recurso->get_tipo_recurso() === 'Imagen') {
								$imagenes = true;
							} elseif ($recurso->get_tipo_recurso() === 'Cartel') {
								$carteles = true;
							} elseif ($recurso->get_tipo_recurso() === 'Video') {
								$videos = true;
							}
						}
						?>

						<!-- Imagenes -->
						<?php if ($imagenes){ ?>
						<div class="text-center">
							<h3 class="text-secondary">Fotografías</h3>
							<div class="row gallery-container">
								<?php 
								$imageIndex = 1;
								foreach ($estacion->get_recursos() as $recurso){
									if ($recurso->get_tipo_recurso() === 'Imagen'){
								?>
									<div class="col-md-4 col-4 mb-4 rounded">
										<div class="thumbnail-container position-relative rounded square-thumbnail">
										
											<img src="<?php echo constant('URL') . '/public/imgs/'.$recurso->get_url(); ?>" class="img-thumbnail" style="cursor: pointer;" 
											onclick="showModal( '<?php echo $recurso->get_nombre(); ?>','<?php echo constant('URL') . '/public/imgs/'.$recurso->get_url(); ?>', '<?php echo $recurso->get_creditos(); ?>')">
											
											<div class="overlay-text position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
												<span class="text-white">Ver imagen</span>
												
											</div>
										</div>
									</div>
								<?php 
									}
								}
								?>
							</div>
						</div>
						<?php } ?>

						<!-- Carteles (lo mismo xd) -->
						<?php if ($carteles){ ?>
						<div class="text-center">
							<h3 class="text-secondary">Carteles</h3>
							<div class="row gallery-container">
								<?php 
								foreach ($estacion->get_recursos() as $recurso){
									if ($recurso->get_tipo_recurso() === 'Cartel'){
								?>
									<div class="col-md-12 col-12 mb-4 rounded">
										<div class="thumbnail-container position-relative rounded rectangular-thumbnail">
										
											<img src="<?php echo constant('URL') . '/public/imgs/'.$recurso->get_url(); ?>" class="img-thumbnail" style="cursor: pointer;" 
											onclick="showModal( '<?php echo $recurso->get_nombre(); ?>','<?php echo constant('URL') . '/public/imgs/'.$recurso->get_url(); ?>', '<?php echo $recurso->get_creditos(); ?>')">
											
											<div class="overlay-text position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
												<span class="text-white">Ver cartel</span>
											</div>
											
										</div>
									</div>
								<?php 
									}
								}
								?>
							</div>
						</div>
						<?php } ?>

						<!-- Videos -->
						<?php if ($videos){ ?>
						<div class="text-center">
							<h3 class="text-secondary">Videos</h3>
							<div class="row gallery-container">
								<?php 
								foreach ($estacion->get_recursos() as $recurso){
									if ($recurso->get_tipo_recurso() === 'Video'){
								?>
								
								<div class="col-md-12 col-12 mb-4 rounded">
									<div class="video-container">
										<iframe width="560" height="315" src="<?php echo $recurso->get_url(); ?>" 
										class="border"
										title="YouTube video player" frameborder="0" 
										allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
										referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
									</div>
								</div>
								<?php 
									}
								}
								?>
							</div>
						</div>
						<?php } ?>

					</div>
					
				<?php
					}
				}
				?>
				
			</div>		
			
			<div class="col-12 col-sm-5 p-4 bg-dark rounded">
			
				<div class="sidebar-map">
					<div id="map" class="container-fluid full-height rounded mb-3 border">
						<!-- Aquí va el mapa -->
					</div>
					
					
					<nav class="bg-light sidebar rounded" id="myScrollspy">
						<div class="list-group border-0 rounded">
							
							<label  class="list-group-item list-group-item-action p-2 text-center bg-primary text-white">ESTACIONES</label>
							<?php 
							if ($this->estacion_lista !== null) {
								foreach ($this->estacion_lista as $index => $estacion){
							?>
								<a class="list-group-item list-group-item-action p-1" href="#list-item-<?php echo $index + 1; ?>">
									<?php echo ($index + 1) .') '. $estacion->get_nombre(); ?>
								</a>
							<?php
								}
							}
							?>
						</div>
					</nav>
				</div>
			
			</div>

		</div>
		
	</div>

	
	<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header border-0">
					<span class="text-primary" id="modal_nombre"></span>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body p-0 border-0">
					<img id="modal_imagen" src="" class="img-fluid">
				</div>
				
				<div class="modal-footer border-0">
					Créditos: <span id="modal_creditos"></span>
				</div>
			</div>
		</div>
	</div>

	
	<?php  require 'vistas/footer.php' ?>
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
<script>

	$(document).ready(function () {
		$('body').scrollspy({ target: '#myScrollspy', offset: 20 });
	});
	

	function showModal(nombre, url, credits) {
		document.getElementById('modal_nombre').innerText = nombre;
		document.getElementById('modal_imagen').src = url;
		document.getElementById('modal_creditos').innerText = credits;
		$('#imageModal').modal('show');
	}
	
	

  (g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})({
    key: "AIzaSyANYrOfEcKN46yxrjSmY6JTjXLlpXKBK7w",
    v: "weekly",
  });
  
  
  let map;
  let infoWindows = [];
  let markers = [];
  let currentInfoWindow = null;
  var slideIndex = 0;

  //Cargo las estaciones a un arreglo que javascript pueda leer.
  const estaciones = [
      <?php if ($this->estacion_lista !== null) { ?>
          <?php foreach ($this->estacion_lista as $estacion){ ?>
              {
                  nombre: "<?php echo $estacion->get_nombre() ?>",
                  numero: <?php echo $estacion->get_numero() ?>,
                  latitud: <?php echo $estacion->get_latitud() ?>,
                  longitud: <?php echo $estacion->get_longitud() ?>
              },
          <?php } ?>
      <?php } ?>
  ];
  
  async function initMap() {
    // The location of Uluru
    const position = { lat: -25.344, lng: 131.031 };
    
    //Si no hay senderos mostramos una posicion inicial predefinida
    let initialPosition;
    if (estaciones.length > 0) {
        initialPosition = { lat: estaciones[0].latitud, lng: estaciones[0].longitud };
    } else {
        initialPosition = { lat: -25.344, lng: 131.031 };
    }
    
    // Request needed libraries.
    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement, PinElement  } = await google.maps.importLibrary("marker");

    // Configuracion del mapa
    const zoom = 20
    map = new Map(document.getElementById("map"), {
		zoom: zoom,
		minZoom: zoom - 1,
		maxZoom: zoom + 2,
		gestureHandling: "cooperative",
		zoomControlOptions: {
			position: google.maps.ControlPosition.TOP_RIGHT,
		},
		center: initialPosition,
		mapId: "DEMO_MAP_ID",
		//disableDefaultUI: true,
		fullscreenControl: true,
		streetViewControl: false,
		mapTypeControl: true,
		mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
		mapTypeId: 'roadmap',
		zoomControl: true,
    });
	

    const pathCoordinates = [];

    estaciones.forEach((estacion,index )=> {
    	const content = document.createElement('div');
        content.className = 'map_card';
        content.innerHTML = ' <h4 class="text-primary">'+estacion.nombre+'</h4>';
          
        const infoWindow = new google.maps.InfoWindow({
        	headerContent: `Estacion #${estacion.numero}`,
          	//headerDisabled:true,
        	content: content,
        	ariaLabel: estacion.nombre,
        });
        infoWindows.push(infoWindow);
        
        const pin = new PinElement({
            //glyph: `${estacion.numero}`,
            //glyphColor: '#FF7F50',
            scale: 1.2,
            //background: '#FFD700',
            //borderColor: '#FF7F50',
            
          });
    	
        const marker = new AdvancedMarkerElement({
            map: map,
            position: { lat: estacion.latitud, lng: estacion.longitud },
            title: estacion.nombre,
            content: pin.element,
            //content:priceTag,
        });
        
        marker.addListener('click', () => {
            infoWindow.open({anchor: marker});
			//Ademas de abrir la ventana cambiamos de seccion
			//en el scrollspy
			const targetSection = document.querySelector(`#list-item-${index + 1}`);
			if (targetSection) {
				targetSection.scrollIntoView({ behavior: 'smooth' });
			}
          });
        
        markers.push(marker);
        
     	//Agregamos el punto al path para dibujar el sendero
        pathCoordinates.push({ lat: estacion.latitud, lng: estacion.longitud });

    });
    
    //A dibujar
    const lineSymbol = {
	  path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
	  scale: 3,
	  strokeColor: '#002D62'
	};
    
    const trailPath = new google.maps.Polyline({
        path: pathCoordinates,
        icons: [{
            icon: lineSymbol,
            offset: '100%',
            repeat: '50px' 
          }],
        geodesic: true,
        strokeColor: '#fad02c',//'#7CB9E8',
        strokeOpacity: 0.6,
        strokeWeight: 15,
    });
    trailPath.setMap(map);

 }

	initMap();


 
 	//Funcion para centrar el mapa a un punto en especifico 
	function centrar_mapa(lat, lng, index) {
		map.panTo({ lat: lat, lng: lng });
		
		// Cierra el InfoWindow actual
		if (currentInfoWindow) {
			currentInfoWindow.close();
		}
		
		// Abre el InfoWindow de la estación correspondiente
		currentInfoWindow = infoWindows[index];
		currentInfoWindow.open(map, markers[index]);
	}

	
	$(document).ready(function () {
		$(window).on('activate.bs.scrollspy', function (e, obj) {
			//console.log("Se activó el elemento:", obj.relatedTarget);
	
			const index = parseInt(obj.relatedTarget.split('-')[2]) - 1; 
			if (estaciones[index]) {
				centrar_mapa(estaciones[index].latitud, estaciones[index].longitud, index);
			}
		});
	});
	

</script>

	
		
</body>

</html>