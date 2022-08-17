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
                $data['links'] = ['agendar_citas_medicas'];
                $data['id_medico'] = $usuario_aprovado->ID;

            } elseif( $usuario_aprovado->TIPO_DE_PERFIL == "3" ) {
                $data['tipo_perfil'] = 'Paciente';
                $data['opciones'] = ['citas medicas','reportes medicos'];
                $data['imagenes'] = ['fa-book-open','fa-book-open'];
                $data['links'] = ['citas_medicas','reportes'];
                $data['id_usuario'] = $usuario_aprovado->ID;
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

    public function agendar_citas_medicas($direccion_1 = NULL, $id_medico = NULL){
        $data['url_ver_todas'] = base_url().'/Home/agendar_citas_medicas';
        $data['lista_consultorios'] = $this->home->getConsultorios();

        if(isset($direccion_1)){
            if($direccion_1 == '1'){
                $filtros = $this->request->getPost('cita');

                if(isset($filtros['fecha_ocurrencia'])){
                    if($filtros['fecha_ocurrencia'] == ''){
                        $filtros['fecha_ocurrencia'] = NULL;                
                    }
                } else {
                    $filtros['fecha_ocurrencia'] = NULL;
                }

                if(isset($filtros['consultorio'])){
                    if($filtros['consultorio'] == ''){
                        $filtros['consultorio'] = NULL;                
                    }
                } else {
                    $filtros['consultorio'] = NULL;
                }

                if(isset($id_medico)){
                    $data['lista_citas'] = $this->home->getCitas($filtros['fecha_ocurrencia'],$filtros['consultorio'], $id_medico);
                    $data['url_ver_todas'] = base_url().'/Home/agendar_citas_medicas/0/'.$id_medico;
                    $data['lista_consultorios'] = $this->home->getConsultorios($id_medico);
                } else {
                    $data['lista_citas'] = $this->home->getCitas($filtros['fecha_ocurrencia'],$filtros['consultorio']);
                }
            } elseif($direccion_1 == '3'){
                $data['lista_citas'] = $this->home->getCitas();
            } elseif($direccion_1 == '0'){
                if(isset($id_medico)){
                    $data['lista_citas'] = $this->home->getCitas(NULL, NULL, $id_medico);
                    $data['url_ver_todas'] = base_url().'/Home/agendar_citas_medicas/0/'.$id_medico;
                    $data['lista_consultorios'] = $this->home->getConsultorios($id_medico);
                    $data['id_medico'] = $id_medico;
                } else {
                    $data['lista_citas'] = $this->home->getCitas();
                }
            }
        } else {
            $data['lista_citas'] = $this->home->getCitas();
        }
        return view('menu/agendar_citas_medicas', $data);
    }

    public function editar_cita($id_cita = NULL, $id_admin = NULL){

        if(isset($id_cita)){
            $data['cita'] = $this->home->getCitas(NULL, NULL, NULL, $id_cita);
            $contenido['ID'] = $data['cita'][0]->ID;
            $contenido['FECHA'] = $data['cita'][0]->FECHA;
            $contenido['MEDICO'] = $data['cita'][0]->MEDICO;
            $contenido['USUARIO'] = $data['cita'][0]->USUARIO;
            $contenido['COMPLETADA'] = TRUE;
            $contenido['CONSULTORIO'] = $data['cita'][0]->CONSULTORIO;
            $contenido['TIPO_CONSULTA'] = $data['cita'][0]->TIPO_CONSULTA;

            $this->home->setCita("Citas_Medicas", $contenido);
        }
        $data['ruta'] = base_url().'/Home/insertReporte/'.$id_admin;
        return view('menu/editar_cita', $data);
    }


    public function insertReporte($id_admin = NULL){
        $nuevo_reporte = $this->request->getPost('Reporte');
        $listaReportes = $this->home->getReportesMedicos();

        $contenido['ID'] = sizeof($listaReportes)+1;
        $contenido['DIAGNOSTICO'] = $nuevo_reporte['Diagnostico']; 
        $contenido['USUARIO'] = $nuevo_reporte['Usuario']; 
        $contenido['MEDICO'] = $nuevo_reporte['Medico']; 
        $contenido['FECHA'] = $nuevo_reporte['Fecha']; 

        $this->home->setNewReporte('Reportes_Medicos',$contenido);

        return $this->agendar_citas_medicas($id_admin, $nuevo_reporte['Medico']);
    }

    public function reportes($id_usuario = NULL){
        if(isset($id_usuario)){
            $data['lista_reportes'] = $this->home->getReportesMedicos($id_usuario);
        } else {
            $data['lista_reportes'] = $this->home->getReportesMedicos();
        }
        
        return view('menu/reportes', $data);
    }
}
