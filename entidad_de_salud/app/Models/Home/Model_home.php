<?php

namespace App\Models\Home;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Entity\Cast\DatetimeCast;
use DateTime;

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

    public function getConsultorios($id_medico = NULL){
		$data = array();
		$builder = $this->db->table('CONSULTORIOS');
		$builder->select('CONSULTORIOS.ID,CONSULTORIOS.DEPARTAMENTO,CONSULTORIOS.MUNICIPIO,CONSULTORIOS.DIRECCION');
		

		if(isset($id_medico)){
			$builder->join('CITAS_MEDICAS','CONSULTORIOS.ID = CITAS_MEDICAS.CONSULTORIO');
			$builder->join('USUARIOS', 'CITAS_MEDICAS.MEDICO = USUARIOS.ID');
			$builder->where('USUARIOS.ID', $id_medico);
			$builder->groupBy('CONSULTORIOS.ID');
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

    public function getCitas( $fecha = NULL, $consultorio = NULL, $id_medico = NULL, $id_cita = NULL){
        $data = array();
		$builder = $this->db->table('citas_medicas');
		$builder->select('ID,FECHA,MEDICO,USUARIO,COMPLETADA,CONSULTORIO,TIPO_CONSULTA');
        
		if(isset($id_cita)){
            $builder->where('ID ',$id_cita);
        }

        if(isset($fecha)){
            $builder->where('FECHA >=',$fecha);
        }

        if(isset($consultorio)){
            $builder->where('CONSULTORIO',$consultorio);
        }

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

	public function getReportesMedicos($id_usuario = NULL){
        $data = array();
		$builder = $this->db->table('Reportes_Medicos');
		$builder->select('ID,DIAGNOSTICO,USUARIO,MEDICO,FECHA');
	
		if(isset($id_usuario)){
			$builder->where('USUARIO',$id_usuario);
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

	public function setCita($nombre_tabla,$contenido = null) {
		$option = FALSE;
		$builder = $this->db->table($nombre_tabla);
		$builder->where('ID',$contenido['ID']);
		if ($builder->update($contenido)) { $option = TRUE; } else { $option = FALSE; }
		return $option;
	}

	public function setNewReporte($nombre_tabla,$contenido = null) {
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
}
?>