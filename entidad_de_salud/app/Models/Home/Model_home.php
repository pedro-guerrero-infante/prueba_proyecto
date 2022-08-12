<?php

namespace App\Models\Home;

use CodeIgniter\Database\ConnectionInterface;

class Model_home{
	protected $db;
    protected $request;

	public function __construct(ConnectionInterface &$db){
		$this->db = &$db;
        $this->request = service('request');
	}

	public function getUsuarios(){
		$data = array();
		$builder = $this->db->table('Usuarios');
		$query = $builder->select('ID,NOMBRE,APELLIDO,NUMERO_TELEFONO,DEPARTAMENTO,MUNICIPIO,DIRECCION,TIPO_DE_PERFIL,USUARIO,CONTRASEÑA')->get();

		if ($query->getNumRows() > 0) {
			$data = $query->getResult();
		} else {
			$data = FALSE;
		}
		$query->freeResult();
		return $data;
	}

    public function getDepartamentos(){
		$data = array();
		$builder = $this->db->table('Departamentos');
		$query = $builder->select('ID,NOMBRE')->get();

		if ($query->getNumRows() > 0) {
			$data = $query->getResult();
		} else {
			$data = FALSE;
		}
		$query->freeResult();
		return $data;
	}

    public function getMunicipios($id_depa){
		$data = array();
		$builder = $this->db->table('Municipios');
		$builder->select('ID,NOMBRE,DEPARTAMENTO');
        $builder->where('DEPARTAMENTO',$id_depa);
		$query = $builder->get();

		if ($query->getNumRows() > 0) {
			$data = $query->getResult();
		} else {
			$data = FALSE;
		}
		$query->freeResult();
		return $data;
	}

    public function setNewUsuario($nombre_tabla,$contenido = null) {
		$option = FALSE;
		$builder = $this->db->table($nombre_tabla);
		if (isset($id_operacion)) {
			//$builder->where('id_operacion',$id_operacion);
			//if ($builder->update($contenido)) { $option = TRUE; } else { $option = FALSE; }
		} else {
			if ($builder->insert($contenido)) { $option = TRUE; } else { $option = FALSE; }			
		}
		return $option;
	}

    public function getConsultorios(){
		$data = array();
		$builder = $this->db->table('Consultorios');
		$builder->select('ID,DEPARTAMENTO,MUNICIPIO,DIRECCION');
		$query = $builder->get();

		if ($query->getNumRows() > 0) {
			$data = $query->getResult();
		} else {
			$data = FALSE;
		}
		$query->freeResult();
		return $data;
	}

    public function setNewConsultorio($nombre_tabla,$contenido = null) {
		$option = FALSE;
		$builder = $this->db->table($nombre_tabla);
		if (isset($id_operacion)) {
			//$builder->where('id_operacion',$id_operacion);
			//if ($builder->update($contenido)) { $option = TRUE; } else { $option = FALSE; }
		} else {
			if ($builder->insert($contenido)) { $option = TRUE; } else { $option = FALSE; }			
		}
		return $option;
	}

    public function getConsultas( $id_medico = NULL){
        $data = array();
		$builder = $this->db->table('Consultas');
		$builder->select('ID,VALOR,MEDICO');
		
        if(isset($id_medico)){
            $builder->where('MEDICO',$id_medico);
        }

        $query = $builder->get();

		if ($query->getNumRows() > 0) {
			$data = $query->getResult();
		} else {
			$data = FALSE;
		}
		$query->freeResult();
		return $data;
    }

    public function getCitas( $fecha = NULL, $consultorio = NULL){
        $data = array();
		$builder = $this->db->table('CitasMedicas');
		$builder->select('ID,FECHA,MEDICO,USUARIO,COMPLETADA,CONSULTORIO,TIPO_CONSULTA');
        
        if(isset($fecha)){
            $builder->where('FECHA >=',$fecha);
        }

        if(isset($consultorio)){
            $builder->where('CONSULTORIO',$consultorio);
        }
        
        $query = $builder->get();

		if ($query->getNumRows() > 0) {
			$data = $query->getResult();
		} else {
			$data = FALSE;
		}
		$query->freeResult();
		return $data;
    }
}
?>