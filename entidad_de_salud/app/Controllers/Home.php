<?php

namespace App\Controllers;
use App\Models\Home\Model_home;

class Home extends BaseController
{
    public function __construct(){
        $db = db_connect();
        $this->home = new Model_home($db);
    }

    public function index(){
        $data['inicio'] = 'Home/inicio';
        return view('main', $data);
    }

    public function inicio(){
        if ($this->request->getPost('Usuario')) {				
            $usuario = $this->request->getPost('Usuario');
            $listaUsuarios = $this->home->getUsuarios();
            $usuario_aprovado = '';

            foreach( $listaUsuarios as $usuario_p ){

                if($usuario_p->USUARIO == $usuario['usuario'] && $usuario_p->CONTRASEÑA == $usuario['contras']){
                    $usuario_aprovado = $usuario_p;
                }
            }

            $data[''] = '';

            if( $usuario_aprovado->TIPO_DE_PERFIL == "1" ){
                $data['tipo_perfil'] = 'Administrador';
                $data['opciones'] = ['crear medicos','crear pacientes','crear consultorios','agendar citas medicas'];
                $data['imagenes'] = ['fa-plus-circle','fa-plus-circle','fa-plus-circle','fa-book-open'];
                $data['links'] = ['crear_usuario','crear_usuario','crear_consultorios','agendar_citas_medicas'];

                $data['opciones_tabla_medicos'] = $this->home->getUsuarios();

            } elseif( $usuario_aprovado->TIPO_DE_PERFIL == "2" ) {
                $data['tipo_perfil'] = 'Medico';
                $data['opciones'] = ['citas'];
                $data['imagenes'] = ['fa-book-open'];
                $data['links'] = [''];

                $data['opciones_tabla_medicos'] = $this->home->getUsuarios();

            } elseif( $usuario_aprovado->TIPO_DE_PERFIL == "3" ) {
                $data['tipo_perfil'] = 'Paciente';
                $data['opciones'] = ['citas medicas','reportes medicos'];
                $data['imagenes'] = ['fa-book-open','fa-book-open'];
                $data['links'] = ['',''];
            }

            return view('menu/menu', $data);
        }	
    }

    public function crear_usuario( $tipo = NULL ){

        $data['departamentos'] = $this->home->getDepartamentos();

        if( $tipo == 0 ){
            $data['titulo'] = 'medico';
            $data['ruta'] = base_url().'/Home/insertMedico';
        } elseif( $tipo == 1 ){
            $data['titulo'] = 'paciente';
            $data['ruta'] = base_url().'/Home/insertPaciente';
        }

        return view('menu/crear_usuario', $data);
    }

    public function getMunicipios(){
        $id_depa = $this->request->getPost('departamento');
        $municipios = $this->home->getMunicipios($id_depa);
        $respuesta = '';
        foreach( $municipios as $municipio ){
            $respuesta .= '<option value='.$municipio->ID.'>'.$municipio->NOMBRE.'</option>';
        }
        echo $respuesta;
    }

    public function insertMedico(){
        $medico = $this->request->getPost('Usuario');
        $listaUsuarios = $this->home->getUsuarios();

        $contenido['ID'] = sizeof($listaUsuarios)+1;
        $contenido['NOMBRE'] = $medico['Nombre']; 
        $contenido['APELLIDO'] = $medico['Apellido']; 
        $contenido['NUMERO_TELEFONO'] = $medico['Telefono']; 
        $contenido['DEPARTAMENTO'] = $medico['Departamento']; 
        $contenido['MUNICIPIO'] = $medico['Municipio']; 
        $contenido['DIRECCION'] = $medico['Direccion']; 
        $contenido['TIPO_DE_PERFIL'] = 2; 
        $contenido['USUARIO'] =  $medico['Usuario']; 
        $contenido['CONTRASEÑA'] = $medico['Contras'];  

        $this->home->setNewUsuario("Usuarios",$contenido);

        $data['tipo_perfil'] = 'Administrador';
        $data['opciones'] = ['crear medicos','crear pacientes','crear consultorios','agendar citas medicas'];
        $data['imagenes'] = ['fa-plus-circle','fa-plus-circle','fa-plus-circle','fa-book-open'];
        $data['links'] = ['crear_usuario','crear_usuario','crear_consultorios','agendar_citas_medicas'];

        return view('menu/menu', $data);
    }

    public function insertPaciente(){
        $paciente = $this->request->getPost('Usuario');
        $listaUsuarios = $this->home->getUsuarios();

        $contenido['ID'] = sizeof($listaUsuarios)+1;
        $contenido['NOMBRE'] = $paciente['Nombre']; 
        $contenido['APELLIDO'] = $paciente['Apellido']; 
        $contenido['NUMERO_TELEFONO'] = $paciente['Telefono']; 
        $contenido['DEPARTAMENTO'] = $paciente['Departamento']; 
        $contenido['MUNICIPIO'] = $paciente['Municipio']; 
        $contenido['DIRECCION'] = $paciente['Direccion']; 
        $contenido['TIPO_DE_PERFIL'] = 3; 
        $contenido['USUARIO'] =  $paciente['Usuario']; 
        $contenido['CONTRASEÑA'] = $paciente['Contras'];  

        $this->home->setNewUsuario("Usuarios",$contenido);

        $data['tipo_perfil'] = 'Administrador';
        $data['opciones'] = ['crear medicos','crear pacientes','crear consultorios','agendar citas medicas'];
        $data['imagenes'] = ['fa-plus-circle','fa-plus-circle','fa-plus-circle','fa-book-open'];
        $data['links'] = ['crear_usuario','crear_usuario','crear_consultorios','agendar_citas_medicas'];

        return view('menu/menu', $data);
    }

    public function crear_consultorios(){

        $data['departamentos'] = $this->home->getDepartamentos();
        $data['titulo'] = 'consultorio';
        $data['ruta'] = base_url().'/Home/insertConsultorio';
        return view('menu/crear_consultorios', $data);
    }

    public function insertConsultorio(){
        $consultorio = $this->request->getPost('Consultorio');
        $listaConsultorios = $this->home->getConsultorios();

        $contenido['ID'] = sizeof($listaConsultorios)+1;
        $contenido['DEPARTAMENTO'] = $consultorio['Departamento']; 
        $contenido['MUNICIPIO'] = $consultorio['Municipio']; 
        $contenido['DIRECCION'] = $consultorio['Direccion']; 
       

        $this->home->setNewConsultorio("Consultorios",$contenido);

        $data['tipo_perfil'] = 'Administrador';
        $data['opciones'] = ['crear medicos','crear pacientes','crear consultorios','agendar citas medicas'];
        $data['imagenes'] = ['fa-plus-circle','fa-plus-circle','fa-plus-circle','fa-book-open'];
        $data['links'] = ['crear_usuario','crear_usuario','crear_consultorios','agendar_citas_medicas'];

        return view('menu/menu', $data);
    }

    public function menuConsultas($id_medico = NULL){
       
        $data['consultas'] = $this->home->getConsultas($id_medico);
        return view('menu/menu_consultas', $data);
    }

    public function agendar_citas_medicas($direccion_1 = NULL){
        if(isset($direccion_1)){
            if($direccion_1 == '1'){
                $filtros = $this->request->getPost('cita');

                if($filtros['fecha_ocurrencia'] == ''){
                    $filtros['fecha_ocurrencia'] = NULL;                
                }

                if($filtros['consultorio'] == ''){
                    $filtros['consultorio'] = NULL;                
                }

                $data['lista_citas'] = $this->home->getCitas($filtros['fecha_ocurrencia'],$filtros['consultorio']);
            } elseif($direccion_1 == '3'){
                $data['lista_citas'] = $this->home->getCitas();
            }
        } else {
            $data['lista_citas'] = $this->home->getCitas();
        }

        $data['lista_consultorios'] = $this->home->getConsultorios();
        $data['url_ver_todas'] = base_url().'/Home/agendar_citas_medicas';
        return view('menu/agendar_citas_medicas', $data);
    }
}
