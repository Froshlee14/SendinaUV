<?php

require_once 'entidades/RecursoBean.php';
require_once 'entidades/TipoRecursoBean.php';

class RecursoControlador extends Controlador{
	
	function __construct(){
		parent::__construct();
		//Variables usadas en la vista
		$this->vista->mensaje = "";
		$this->vista->recurso = null;
		$this->vista->tipo_recurso_lista = [];
		$this->vista->id_sendero = 0;
		$this->vista->id_estacion = 0;
		$this->vista->numero = 0;
		
		//Modelos extra
		//$this->modeloTipoRecurso = new TipoRecursoModelo();
	}
	
	function renderizar($vista = "recurso/editor"){
		$this->vista->mostrar($vista);
	}

	function editar($parametros=null){

		//Obtengo los datos del recurso
		$id_sendero = $parametros[0];
		$id_estacion = $parametros[1];
		$id_recurso = $parametros[2];
		$numero = $parametros[3];
		$recurso = $this->modelo->select($id_recurso);
		
		//Obtengo la lista de tipos de recurso para desplegarlas en un select field
		$tipos_recurso = $this->modelo->selectTiposRecurso();
		
		$this->vista->id_sendero = $id_sendero;
		$this->vista->id_estacion = $id_estacion;
		$this->vista->recurso = $recurso;
		$this->vista->numero = $numero;
		$this->vista->tipo_recurso_lista = $tipos_recurso;
		$this->renderizar();
	}
	
	function guardar(){
		$id_sendero = $_POST['id_sendero'];
        $id_estacion = $_POST['id_estacion'];
		$id_recurso = $_POST['id_recurso'];
        $numero = $_POST['numero'];
        $url = $_POST['url'];
        $creditos = $_POST['creditos'];
        $id_tipo_recurso = $_POST['id_tipo_recurso'];

        $recurso = new RecursoBean(
            $id_recurso,
            $numero,
            $url,
            $creditos,
            $id_tipo_recurso,
            null
        );
        //var_dump($estacion);

        //ASi la id es 0 significa que lo agregamos como nuevo recurso
		if($id_recurso==0){
			if($this->modelo->insert($recurso,$id_estacion)){
				$mensaje = "Recurso creado";
			}
			else{
				$mensaje =  "No se pudo crear";
			}	
		}
		//Si no es cero entonces actualizamos el recurso
		else{
			if($this->modelo->update($recurso,$id_estacion)){
				$mensaje = "Recurso actualizado";
			}
			else{
				$mensaje =  "No se pudo actualizar";
			}	
		}
		
		$this->vista->mensaje = $mensaje;
		
		//Debo redirigir a sendero editor
		$url = 'estacion/editar/'.$id_sendero.'/'.$id_estacion;
		$this->redir($url);
	
    }
	
	function borrar($parametros=null){
		$id_sendero = $parametros[0];
		$id_estacion = $parametros[1]; 
		$id_recurso = $parametros[2]; 
		
		if($this->modelo->deleteBD($id_recurso)){
			$mensaje = "Recurso eliminado";
		}
		else{
			$mensaje =  "No se pudo eliminar";
		}
		$this->vista->mensaje = $mensaje;
		
		$url = 'estacion/editar/'.$id_sendero.'/'.$id_estacion;
		$this->redir($url);

	}
}

?>