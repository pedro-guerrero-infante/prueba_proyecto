<?php
   include_once dirname(__FILE__) . '/config/config.php';
    $data = '';

    if(isset($_POST['ruta'])){
        $opcion = $_POST['ruta'];

        if( $opcion == 'createdatabase' ){  
            $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS);
            if (!$con) {
                $data .= "Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "<br>";
            } else {
                $sql = "CREATE DATABASE " . DATABASE_NAME;
                if (mysqli_query($con, $sql)) {
                    $data .= "result_query success_text - Base de datos " . DATABASE_NAME . " creada <br>";
                } else {
                    $data .= "result_query error_text - Error en la creacion " . mysqli_error($con) . "<br>";
                }
                mysqli_close($con);
            }
        }

        if(isset($_POST['drops'])){
            $drops = $_POST['drops'];
            $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
            if (!$con){
                $data .= "result_query error_text - Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "<br>";
            }else{
                if( $opcion == 'createtables'){
                    if( $drops == '1' ){

                        $sqlReportes_X_Medicamentos = "DROP TABLE Reportes_X_Medicamentos;";
                        if (mysqli_query($con, $sqlReportes_X_Medicamentos)) {
                            $data .= "Drop table Reportes_X_Medicamentos.<br>";
                        } else {
                            $data .= "Erro en Drop table Reportes_X_Medicamentos: " . mysqli_error($con) . ".<br>";
                        } 

                        $sqlMedicamentos = "DROP TABLE Medicamentos;";
                        if (mysqli_query($con, $sqlMedicamentos)) {
                            $data .= "Drop table Medicamentos.<br>";
                        } else {
                            $data .= "Erro en Drop table Medicamentos: " . mysqli_error($con) . ".<br>";
                        } 

                        $sqlReportes_Medicos = "DROP TABLE Reportes_Medicos;";
                        if (mysqli_query($con, $sqlReportes_Medicos)) {
                            $data .= "Drop table Reportes_Medicos.<br>";
                        } else {
                            $data .= "Erro en Drop table Reportes_Medicos: " . mysqli_error($con) . ".<br>";
                        } 

                        $sqlCitas_Medicas = "DROP TABLE Citas_Medicas;";
                        if (mysqli_query($con, $sqlCitas_Medicas)) {
                            $data .= "Drop table Citas_Medicas.<br>";
                        } else {
                            $data .= "Erro en Drop table Citas_Medicas: " . mysqli_error($con) . ".<br>";
                        } 

                        $sqlConsultas = "DROP TABLE Consultas;";
                        if (mysqli_query($con, $sqlConsultas)) {
                            $data .= "Drop table Consultas.<br>";
                        } else {
                            $data .= "Erro en Drop table Consultas: " . mysqli_error($con) . ".<br>";
                        } 

                        $sqlUsuarios = "DROP TABLE Usuarios;";
                        if (mysqli_query($con, $sqlUsuarios)) {
                            $data .= "Drop table Usuarios.<br>";
                        } else {
                            $data .= "Erro en Drop table Usuarios: " . mysqli_error($con) . ".<br>";
                        } 

                        $sqlPerfiles = "DROP TABLE Perfiles;";
                        if (mysqli_query($con, $sqlPerfiles)) {
                            $data .= "Drop table Perfiles.<br>";
                        } else {
                            $data .= "Erro en Drop table Perfiles: " . mysqli_error($con) . ".<br>";
                        } 

                        $sqlConsultorios = "DROP TABLE Consultorios;";
                        if (mysqli_query($con, $sqlConsultorios)) {
                            $data .= "Drop table Consultorios.<br>";
                        } else {
                            $data .= "Erro en Drop table Consultorios: " . mysqli_error($con) . ".<br>";
                        } 

                        $sqlMunicipios = "DROP TABLE Municipios;";
                        if (mysqli_query($con, $sqlMunicipios)) {
                            $data .= "Drop table Municipios.<br>";
                        } else {
                            $data .= "Erro en Drop table Municipios: " . mysqli_error($con) . ".<br>";
                        } 

                        $sqlDepartamentos = "DROP TABLE Departamentos;";
                        if (mysqli_query($con, $sqlDepartamentos)) {
                            $data .= "Drop table Departamentos.<br>";
                        } else {
                            $data .= "Erro en Drop table Departamentos: " . mysqli_error($con) . ".<br>";
                        }  

                        $sqlPaises = "DROP TABLE Paises;";
                        if (mysqli_query($con, $sqlPaises)) {
                            $data .= "Drop table Paises.<br>";
                        } else {
                            $data .= "Erro en Drop table Paises: " . mysqli_error($con) . ".<br>";
                        }      
                    }

                    // CREATE TABLES

                    $sqlPaises = "  CREATE TABLE Paises ( 
                                    ID INT NOT NULL, 
                                    PRIMARY KEY(ID), 
                                    NOMBRE VARCHAR(50)
                                    )";
                    if (mysqli_query($con, $sqlPaises)) {
                        $data .= "Tabla Paises creada correctamente.<br>";
                    } else {
                        $data .= "Error en la creacion de la tabla Paises: " . mysqli_error($con) . ".<br>";
                    }

                    $sqlDepartamentos = "   CREATE TABLE Departamentos ( 
                                            ID INT NOT NULL, 
                                            PRIMARY KEY(ID), 
                                            NOMBRE VARCHAR(50),
                                            PAIS INT NOT NULL,
                                            FOREIGN KEY (PAIS) REFERENCES Paises(ID)
                                            )";
                    if (mysqli_query($con, $sqlDepartamentos)) {
                        $data .= "Tabla Departamentos creada correctamente.<br>";
                    } else {
                        $data .= "Error en la creacion de la tabla Departamentos: " . mysqli_error($con) . ".<br>";
                    }

                    $sqlMunicipios = "  CREATE TABLE Municipios ( 
                                        ID INT NOT NULL, 
                                        PRIMARY KEY(ID), 
                                        NOMBRE VARCHAR(50),
                                        DEPARTAMENTO INT NOT NULL,
                                        FOREIGN KEY (DEPARTAMENTO) REFERENCES Departamentos(ID)
                                        )";
                    if (mysqli_query($con, $sqlMunicipios)) {
                        $data .= "Tabla Municipios creada correctamente.<br>";
                    } else {
                        $data .= "Error en la creacion de la tabla Municipios: " . mysqli_error($con) . ".<br>";
                    }

                    $sqlConsultorios = "CREATE TABLE Consultorios ( 
                                        ID INT NOT NULL, 
                                        PRIMARY KEY(ID), 
                                        DEPARTAMENTO INT NOT NULL,
                                        FOREIGN KEY (DEPARTAMENTO) REFERENCES Departamentos(ID),
                                        MUNICIPIO INT NOT NULL,
                                        FOREIGN KEY (MUNICIPIO) REFERENCES Municipios(ID),
                                        DIRECCION VARCHAR(50) NOT NULL
                        )";
                    if (mysqli_query($con, $sqlConsultorios)) {
                        $data .= "Tabla Consultorios creada correctamente.<br>";
                    } else {
                        $data .= "Error en la creacion de la tabla Consultorios: " . mysqli_error($con) . ".<br>";
                    }

                    $sqlPerfiles = "CREATE TABLE Perfiles ( 
                                    ID INT NOT NULL, 
                                    PRIMARY KEY(ID), 
                                    TIPO VARCHAR(50)
                                    )";
                    if (mysqli_query($con, $sqlPerfiles)) {
                        $data .= "Tabla Perfiles creada correctamente.<br>";
                    } else {
                        $data .= "Error en la creacion de la tabla Perfiles: " . mysqli_error($con) . ".<br>";
                    }

                    $sqlUsuarios = "CREATE TABLE Usuarios ( 
                                    ID INT NOT NULL, 
                                    PRIMARY KEY(ID), 
                                    FECHA VARCHAR(50) NOT NULL,
                                    NOMBRE VARCHAR(50) NOT NULL,
                                    APELLIDO VARCHAR(50) NOT NULL,
                                    NUMERO_TELEFONO INT NOT NULL,
                                    DEPARTAMENTO INT NOT NULL,
                                    FOREIGN KEY (DEPARTAMENTO) REFERENCES Departamentos(ID),
                                    MUNICIPIO INT NOT NULL,
                                    FOREIGN KEY (MUNICIPIO) REFERENCES Municipios(ID),
                                    DIRECCION VARCHAR(50) NOT NULL,
                                    TIPO_DE_PERFIL INT NOT NULL,
                                    FOREIGN KEY (TIPO_DE_PERFIL) REFERENCES Perfiles(ID),
                                    USUARIO VARCHAR(50) NOT NULL,
                                    CONTRASEÑA VARCHAR(50) NOT NULL
                        )";
                    if (mysqli_query($con, $sqlUsuarios)) {
                        $data .= "Tabla Usuarios creada correctamente.<br>";
                    } else {
                        $data .= "Error en la creacion de la tabla Usuarios: " . mysqli_error($con) . ".<br>";
                    }

                    $sqlConsultas = "   CREATE TABLE Consultas ( 
                                        ID INT NOT NULL, 
                                        PRIMARY KEY(ID), 
                                        VALOR FLOAT NOT NULL,
                                        MEDICO INT NOT NULL,
                                        FOREIGN KEY (MEDICO) REFERENCES Usuarios(ID)
                                        )";
                    if (mysqli_query($con, $sqlConsultas)) {
                        $data .= "Tabla Consultas creada correctamente.<br>";
                    } else {
                        $data .= "Error en la creacion de la tabla Consultas: " . mysqli_error($con) . ".<br>";
                    }

                    $sqlCitas_Medicas = "   CREATE TABLE Citas_Medicas ( 
                                            ID INT NOT NULL, 
                                            PRIMARY KEY(ID), 
                                            FECHA DATE NOT NULL,
                                            MEDICO INT NOT NULL,
                                            FOREIGN KEY (MEDICO) REFERENCES Usuarios(ID),
                                            USUARIO INT NOT NULL,
                                            FOREIGN KEY (USUARIO) REFERENCES Usuarios(ID),
                                            COMPLETADA BINARY NOT NULL,
                                            CONSULTORIO INT NOT NULL,
                                            FOREIGN KEY (CONSULTORIO) REFERENCES Consultorios(ID),
                                            TIPO_CONSULTA INT NOT NULL,
                                            FOREIGN KEY (TIPO_CONSULTA) REFERENCES Consultas(ID)
                                            )";
                    if (mysqli_query($con, $sqlCitas_Medicas)) {
                        $data .= "Tabla Citas_Medicas creada correctamente.<br>";
                    } else {
                        $data .= "Error en la creacion de la tabla Citas_Medicas: " . mysqli_error($con) . ".<br>";
                    }

                    $sqlReportes_Medicos = "CREATE TABLE Reportes_Medicos ( 
                                            ID INT NOT NULL, 
                                            PRIMARY KEY(ID), 
                                            DIAGNOSTICO VARCHAR(1000) NOT NULL,
                                            USUARIO INT NOT NULL,
                                            FOREIGN KEY (USUARIO) REFERENCES Usuarios(ID),
                                            MEDICO INT NOT NULL,
                                            FOREIGN KEY (MEDICO) REFERENCES Usuarios(ID),
                                            FECHA DATE NOT NULL
                                            )";
                    if (mysqli_query($con, $sqlReportes_Medicos)) {
                        $data .= "Tabla Reportes_Medicos creada correctamente.<br>";
                    } else {
                        $data .= "Error en la creacion de la tabla Reportes_Medicos: " . mysqli_error($con) . ".<br>";
                    }

                    $sqlMedicamentos = "CREATE TABLE Medicamentos ( 
                                        ID INT NOT NULL, 
                                        PRIMARY KEY(ID), 
                                        NOMBRE VARCHAR(50) NOT NULL
                                        )";
                    if (mysqli_query($con, $sqlMedicamentos)) {
                        $data .= "Tabla Medicamentos creada correctamente.<br>";
                    } else {
                        $data .= "Error en la creacion de la tabla Medicamentos: " . mysqli_error($con) . ".<br>";
                    }

                    $sqlReportes_X_Medicamentos = " CREATE TABLE Reportes_X_Medicamentos ( 
                                                    ID_MEDICAMENTO INT NOT NULL, 
                                                    FOREIGN KEY (ID_MEDICAMENTO) REFERENCES Medicamentos(ID),
                                                    ID_REPORTE_MEDICO INT NOT NULL,
                                                    FOREIGN KEY (ID_REPORTE_MEDICO) REFERENCES Reportes_Medicos(ID)
                                                    )";
                    if (mysqli_query($con, $sqlReportes_X_Medicamentos)) {
                        $data .= "Tabla Reportes_X_Medicamentos creada correctamente.<br>";
                    } else {
                        $data .= "Error en la creacion de la tabla Reportes_X_Medicamentos: " . mysqli_error($con) . ".<br>";
                    }

                } elseif( $opcion == 'createValues' ){
                    
                    // Inserción Paises
                    $sqlInsertPaises = 'INSERT INTO Paises (ID, NOMBRE) 
                                        VALUES ( 1, \'Colombia\')';
                    
                    if (mysqli_query($con, $sqlInsertPaises)) 
                    {
                        $data .= "result_query success_text - Inserción de Pais correcta.<br>";
                    } else {
                        $data .= "result_query error_text - Error en la inserción de Pais en la tabla Paises: " . mysqli_error($con) . ".<br>";
                    }

                    // Inserción Departamentos

                    $lista_departamentos = [    'Amazonas',
                                                'Antioquia',
                                            ];
                    $n_departamentos = 1;
                    foreach( $lista_departamentos as $departamento ){
                        $sqlInsertDepartamentos = " INSERT INTO Departamentos (ID, NOMBRE, PAIS) 
                                                    VALUES ( ".$n_departamentos.", '".$departamento."', 1)";
                        
                        if (mysqli_query($con, $sqlInsertDepartamentos)) 
                        {
                            $data .= "result_query success_text - Inserción de Departamento correcta.<br>";
                        } else {
                            $data .= "result_query error_text - Error en la inserción de ".$departamento." en la tabla Departamentos: " . mysqli_error($con) . ".<br>";
                        }
                        $n_departamentos++;
                    }


                    // Inserción Municipios Amazonas

                    $lista_municipios_amazonas = ['Leticia','Puerto Nariño'];
                    
                    $n_municipios = 1;
                    foreach( $lista_municipios_amazonas as $municipio ){
                        $sqlInsertMunicipios = "    INSERT INTO Municipios (ID, NOMBRE, DEPARTAMENTO) 
                                                    VALUES ( ".$n_municipios.", '".$municipio."', 1)";
                        
                        if (mysqli_query($con, $sqlInsertMunicipios)) 
                        {
                            $data .= "result_query success_text - Inserción de Municipio correcta.<br>";
                        } else {
                            $data .= "result_query error_text - Error en la inserción de ".$municipio." en la tabla Municipios: " . mysqli_error($con) . ".<br>";
                        }
                        $n_municipios++;
                    }               

                    // Inserción Municipios Antioquia
                    $lista_municipios_antioquia = [     'Abejorral',
                                                        'Abriaquí',
                                                        'Alejandría',
                                                        'Amagá',
                                                        'Amalfi',
                                                        'Andes',
                                                        'Angelópolis',
                                                        'Angostura',
                                                        'Anorí',
                                                        'Anza',
                                                        'Apartadó',
                                                        'Arboletes',
                                                        'Argelia',
                                                        'Armenia',
                                                        'Barbosa',
                                                        'Belén De Bajirá',
                                                        'Bello',
                                                        'Belmira',
                                                        'Betania',
                                                        'Betulia',
                                                        'Briceño',
                                                        'Buriticá',
                                                        'Cáceres',
                                                        'Caicedo',
                                                        'Caldas',
                                                        'Campamento',
                                                        'Cañasgordas',
                                                        'Caracolí',
                                                        'Caramanta',
                                                        'Carepa',
                                                        'Carolina',
                                                        'Caucasia',
                                                        'Chigorodó',
                                                        'Cisneros',
                                                        'Ciudad Bolívar',
                                                        'Cocorná',
                                                        'Concepción',
                                                        'Concordia',
                                                        'Copacabana',
                                                        'Dabeiba',
                                                        'Don Matías',
                                                        'Ebéjico',
                                                        'El Bagre',
                                                        'El Carmen De Viboral',
                                                        'El Santuario',
                                                        'Entrerrios',
                                                        'Envigado',
                                                        'Fredonia',
                                                        'Frontino',
                                                        'Giraldo',
                                                        'Girardota',
                                                        'Gómez Plata',
                                                        'Granada',
                                                        'Guadalupe',
                                                        'Guarne',
                                                        'Guatape',
                                                        'Heliconia',
                                                        'Hispania',
                                                        'Itagüi',
                                                        'Ituango',
                                                        'Jardín',
                                                        'Jericó',
                                                        'La Ceja',
                                                        'La Estrella',
                                                        'La Pintada',
                                                        'La Unión',
                                                        'Liborina',
                                                        'Maceo',
                                                        'Marinilla',
                                                        'Medellín',
                                                        'Montebello',
                                                        'Murindó',
                                                        'Mutatá',
                                                        'Nariño',
                                                        'Nechí',
                                                        'Necoclí',
                                                        'Olaya',
                                                        'Peñol',
                                                        'Peque',
                                                        'Pueblorrico',
                                                        'Puerto Berrío',
                                                        'Puerto Nare',
                                                        'Puerto Triunfo',
                                                        'Remedios',
                                                        'Retiro',
                                                        'Rionegro',
                                                        'Sabanalarga',
                                                        'Sabaneta',
                                                        'Salgar',
                                                        'San Andrés',
                                                        'San Carlos',
                                                        'San Francisco',
                                                        'San Jerónimo',
                                                        'San José De La Montaña',
                                                        'San Juan De Urabá',
                                                        'San Luis',
                                                        'San Pedro',
                                                        'San Pedro De Uraba',
                                                        'San Rafael',
                                                        'San Roque',
                                                        'San Vicente',
                                                        'Santa Bárbara',
                                                        'Santa Rosa De Osos',
                                                        'Santafé De Antioquia',
                                                        'Santo Domingo',
                                                        'Segovia',
                                                        'Sonsón',
                                                        'Sopetrán',
                                                        'Támesis',
                                                        'Tarazá',
                                                        'Tarso',
                                                        'Titiribí',
                                                        'Toledo',
                                                        'Turbo',
                                                        'Uramita',
                                                        'Urrao',
                                                        'Valdivia',
                                                        'Valparaíso',
                                                        'Vegachí',
                                                        'Venecia',
                                                        'Vigía Del Fuerte',
                                                        'Yalí',
                                                        'Yarumal',
                                                        'Yolombó',
                                                        'Yondó',
                                                        'Zaragoza'];
              
                    foreach( $lista_municipios_antioquia as $municipio ){
                        $sqlInsertMunicipiosAntioquia = " INSERT INTO Municipios (ID, NOMBRE, DEPARTAMENTO) 
                                                    VALUES ( ".$n_municipios.", '".$municipio."', 2)";
                        
                        if (mysqli_query($con, $sqlInsertMunicipiosAntioquia)) 
                        {
                            $data .= "result_query success_text - Inserción de Municipio correcta.<br>";
                        } else {
                            $data .= "result_query error_text - Error en la inserción de ".$municipio." en la tabla Municipios: " . mysqli_error($con) . ".<br>";
                        }
                        $n_municipios++;
                    } 

                    // Inserción Consultorios

                    $lista_Consultorios['CONSULTORIO_1']['DEPARTAMENTO'] = 1;
                    $lista_Consultorios['CONSULTORIO_2']['DEPARTAMENTO'] = 1;
                    $lista_Consultorios['CONSULTORIO_3']['DEPARTAMENTO'] = 1;
                    $lista_Consultorios['CONSULTORIO_4']['DEPARTAMENTO'] = 1;
                    $lista_Consultorios['CONSULTORIO_5']['DEPARTAMENTO'] = 1;
                    $lista_Consultorios['CONSULTORIO_6']['DEPARTAMENTO'] = 1;

                    $lista_Consultorios['CONSULTORIO_1']['MUNICIPIO'] = 1;
                    $lista_Consultorios['CONSULTORIO_2']['MUNICIPIO'] = 1;
                    $lista_Consultorios['CONSULTORIO_3']['MUNICIPIO'] = 1;
                    $lista_Consultorios['CONSULTORIO_4']['MUNICIPIO'] = 2;
                    $lista_Consultorios['CONSULTORIO_5']['MUNICIPIO'] = 2;
                    $lista_Consultorios['CONSULTORIO_6']['MUNICIPIO'] = 2;

                    $lista_Consultorios['CONSULTORIO_1']['DIRECCION'] = 'CALLE 29 A # 10-102';
                    $lista_Consultorios['CONSULTORIO_2']['DIRECCION'] = 'CALLE 30 A # 11-103';
                    $lista_Consultorios['CONSULTORIO_3']['DIRECCION'] = 'CALLE 31 A # 12-104';
                    $lista_Consultorios['CONSULTORIO_4']['DIRECCION'] = 'CALLE 32 A # 13-105';
                    $lista_Consultorios['CONSULTORIO_5']['DIRECCION'] = 'CALLE 33 A # 14-106';
                    $lista_Consultorios['CONSULTORIO_6']['DIRECCION'] = 'CALLE 34 A # 15-107';

                    $n_Consultorios = 1;
                    foreach( $lista_Consultorios as $consultorio ){
                        $sqlInsertConsultorios = " INSERT INTO Consultorios (ID, DEPARTAMENTO, MUNICIPIO, DIRECCION) 
                                                    VALUES ( ".$n_Consultorios.", ".$consultorio['DEPARTAMENTO']." , ".$consultorio['MUNICIPIO']." , '".$consultorio['DIRECCION']."')";
                        
                        if (mysqli_query($con, $sqlInsertConsultorios)) 
                        {
                            $data .= "result_query success_text - Inserción de Consultorio correcta.<br>";
                        } else {
                            $data .= "result_query error_text - Error en la inserción de ".$consultorio." en la tabla Consultorios: " . mysqli_error($con) . ".<br>";
                        }
                        $n_Consultorios++;
                    } 

                    // Inserción Perfiles

                    $lista_Perfiles = ['ADMINISTRADOR','MEDICO','PACIENTE'];
                    $n_perfiles = 1;
                    foreach( $lista_Perfiles as $perfil ){
                        $sqlInsertPerfiles = " INSERT INTO Perfiles (ID, TIPO) 
                                                    VALUES ( ".$n_perfiles.", '".$perfil."')";
                        
                        if (mysqli_query($con, $sqlInsertPerfiles)) 
                        {
                            $data .= "result_query success_text - Inserción de Perfil correcta.<br>";
                        } else {
                            $data .= "result_query error_text - Error en la inserción de ".$perfil." en la tabla Perfiles: " . mysqli_error($con) . ".<br>";
                        }
                        $n_perfiles++;
                    } 

                    // Inserción Usuarios
                    $lista_Usuarios['ADMINISTRADOR']['USUARIO'] = 'ADMIN';

                    $lista_Usuarios['MEDICO_1']['USUARIO'] = 'MEDICO_1';
                    $lista_Usuarios['MEDICO_2']['USUARIO'] = 'MEDICO_2';
                    $lista_Usuarios['MEDICO_3']['USUARIO'] = 'MEDICO_3';
                    $lista_Usuarios['MEDICO_4']['USUARIO'] = 'MEDICO_4';
                    $lista_Usuarios['MEDICO_5']['USUARIO'] = 'MEDICO_5';
                    $lista_Usuarios['MEDICO_6']['USUARIO'] = 'MEDICO_6';

                    $lista_Usuarios['USUARIO_1']['USUARIO'] = 'PACIENTE_1';
                    $lista_Usuarios['USUARIO_2']['USUARIO'] = 'PACIENTE_2';
                    $lista_Usuarios['USUARIO_3']['USUARIO'] = 'PACIENTE_3';
                    $lista_Usuarios['USUARIO_4']['USUARIO'] = 'PACIENTE_4';
                    $lista_Usuarios['USUARIO_5']['USUARIO'] = 'PACIENTE_5';
                    $lista_Usuarios['USUARIO_6']['USUARIO'] = 'PACIENTE_6';

                    $lista_Usuarios['ADMINISTRADOR']['CONTRASEÑA'] = 'ADMIN';

                    $lista_Usuarios['MEDICO_1']['CONTRASEÑA'] = 'MEDICO_1';
                    $lista_Usuarios['MEDICO_2']['CONTRASEÑA'] = 'MEDICO_2';
                    $lista_Usuarios['MEDICO_3']['CONTRASEÑA'] = 'MEDICO_3';
                    $lista_Usuarios['MEDICO_4']['CONTRASEÑA'] = 'MEDICO_4';
                    $lista_Usuarios['MEDICO_5']['CONTRASEÑA'] = 'MEDICO_5';
                    $lista_Usuarios['MEDICO_6']['CONTRASEÑA'] = 'MEDICO_6';

                    $lista_Usuarios['USUARIO_1']['CONTRASEÑA'] = 'PACIENTE_1';
                    $lista_Usuarios['USUARIO_2']['CONTRASEÑA'] = 'PACIENTE_2';
                    $lista_Usuarios['USUARIO_3']['CONTRASEÑA'] = 'PACIENTE_3';
                    $lista_Usuarios['USUARIO_4']['CONTRASEÑA'] = 'PACIENTE_4';
                    $lista_Usuarios['USUARIO_5']['CONTRASEÑA'] = 'PACIENTE_5';
                    $lista_Usuarios['USUARIO_6']['CONTRASEÑA'] = 'PACIENTE_6';

                    $lista_Usuarios['ADMINISTRADOR']['NOMBRE'] = 'ADMINISTRADOR';

                    $lista_Usuarios['MEDICO_1']['NOMBRE'] = 'MEDICO_1';
                    $lista_Usuarios['MEDICO_2']['NOMBRE'] = 'MEDICO_2';
                    $lista_Usuarios['MEDICO_3']['NOMBRE'] = 'MEDICO_3';
                    $lista_Usuarios['MEDICO_4']['NOMBRE'] = 'MEDICO_4';
                    $lista_Usuarios['MEDICO_5']['NOMBRE'] = 'MEDICO_5';
                    $lista_Usuarios['MEDICO_6']['NOMBRE'] = 'MEDICO_6';

                    $lista_Usuarios['USUARIO_1']['NOMBRE'] = 'USUARIO_1';
                    $lista_Usuarios['USUARIO_2']['NOMBRE'] = 'USUARIO_2';
                    $lista_Usuarios['USUARIO_3']['NOMBRE'] = 'USUARIO_3';
                    $lista_Usuarios['USUARIO_4']['NOMBRE'] = 'USUARIO_4';
                    $lista_Usuarios['USUARIO_5']['NOMBRE'] = 'USUARIO_5';
                    $lista_Usuarios['USUARIO_6']['NOMBRE'] = 'USUARIO_6';

                    $lista_Usuarios['ADMINISTRADOR']['APELLIDO'] = 'APELLIDO_ADMIN';

                    $lista_Usuarios['MEDICO_1']['APELLIDO'] = 'APELLIDO_MEDICO_1';
                    $lista_Usuarios['MEDICO_2']['APELLIDO'] = 'APELLIDO_MEDICO_2';
                    $lista_Usuarios['MEDICO_3']['APELLIDO'] = 'APELLIDO_MEDICO_3';
                    $lista_Usuarios['MEDICO_4']['APELLIDO'] = 'APELLIDO_MEDICO_4';
                    $lista_Usuarios['MEDICO_5']['APELLIDO'] = 'APELLIDO_MEDICO_5';
                    $lista_Usuarios['MEDICO_6']['APELLIDO'] = 'APELLIDO_MEDICO_6';

                    $lista_Usuarios['USUARIO_1']['APELLIDO'] = 'APELLIDO_1';
                    $lista_Usuarios['USUARIO_2']['APELLIDO'] = 'APELLIDO_2';
                    $lista_Usuarios['USUARIO_3']['APELLIDO'] = 'APELLIDO_3';
                    $lista_Usuarios['USUARIO_4']['APELLIDO'] = 'APELLIDO_4';
                    $lista_Usuarios['USUARIO_5']['APELLIDO'] = 'APELLIDO_5';
                    $lista_Usuarios['USUARIO_6']['APELLIDO'] = 'APELLIDO_6';

                    $lista_Usuarios['ADMINISTRADOR']['TELEFONO'] = '0000000000';

                    $lista_Usuarios['MEDICO_1']['TELEFONO'] = '2223333331';
                    $lista_Usuarios['MEDICO_2']['TELEFONO'] = '2223333332';
                    $lista_Usuarios['MEDICO_3']['TELEFONO'] = '2223333333';
                    $lista_Usuarios['MEDICO_4']['TELEFONO'] = '2223333334';
                    $lista_Usuarios['MEDICO_5']['TELEFONO'] = '2223333335';
                    $lista_Usuarios['MEDICO_6']['TELEFONO'] = '2223333336';

                    $lista_Usuarios['USUARIO_1']['TELEFONO'] = '111222221';
                    $lista_Usuarios['USUARIO_2']['TELEFONO'] = '111222222';
                    $lista_Usuarios['USUARIO_3']['TELEFONO'] = '111222223';
                    $lista_Usuarios['USUARIO_4']['TELEFONO'] = '111222224';
                    $lista_Usuarios['USUARIO_5']['TELEFONO'] = '111222225';
                    $lista_Usuarios['USUARIO_6']['TELEFONO'] = '111222226';

                    $lista_Usuarios['ADMINISTRADOR']['DEPARTAMENTO'] = 1;

                    $lista_Usuarios['MEDICO_1']['DEPARTAMENTO'] = 1;
                    $lista_Usuarios['MEDICO_2']['DEPARTAMENTO'] = 1;
                    $lista_Usuarios['MEDICO_3']['DEPARTAMENTO'] = 1;
                    $lista_Usuarios['MEDICO_4']['DEPARTAMENTO'] = 1;
                    $lista_Usuarios['MEDICO_5']['DEPARTAMENTO'] = 1;
                    $lista_Usuarios['MEDICO_6']['DEPARTAMENTO'] = 1;

                    $lista_Usuarios['USUARIO_1']['DEPARTAMENTO'] = 1;
                    $lista_Usuarios['USUARIO_2']['DEPARTAMENTO'] = 1;
                    $lista_Usuarios['USUARIO_3']['DEPARTAMENTO'] = 1;
                    $lista_Usuarios['USUARIO_4']['DEPARTAMENTO'] = 1;
                    $lista_Usuarios['USUARIO_5']['DEPARTAMENTO'] = 1;
                    $lista_Usuarios['USUARIO_6']['DEPARTAMENTO'] = 1;

                    $lista_Usuarios['ADMINISTRADOR']['MUNICIPIO'] = 1;

                    $lista_Usuarios['MEDICO_1']['MUNICIPIO'] = 1;
                    $lista_Usuarios['MEDICO_2']['MUNICIPIO'] = 1;
                    $lista_Usuarios['MEDICO_3']['MUNICIPIO'] = 1;
                    $lista_Usuarios['MEDICO_4']['MUNICIPIO'] = 1;
                    $lista_Usuarios['MEDICO_5']['MUNICIPIO'] = 1;
                    $lista_Usuarios['MEDICO_6']['MUNICIPIO'] = 1;

                    $lista_Usuarios['USUARIO_1']['MUNICIPIO'] = 1;
                    $lista_Usuarios['USUARIO_2']['MUNICIPIO'] = 1;
                    $lista_Usuarios['USUARIO_3']['MUNICIPIO'] = 1;
                    $lista_Usuarios['USUARIO_4']['MUNICIPIO'] = 2;
                    $lista_Usuarios['USUARIO_5']['MUNICIPIO'] = 2;
                    $lista_Usuarios['USUARIO_6']['MUNICIPIO'] = 2;

                    $lista_Usuarios['ADMINISTRADOR']['DIRECCION'] = 'CALLE 99 Z # 99-999';

                    $lista_Usuarios['MEDICO_1']['DIRECCION'] = 'CALLE 60 B # 09-56';
                    $lista_Usuarios['MEDICO_2']['DIRECCION'] = 'CALLE 61 B # 09-57';
                    $lista_Usuarios['MEDICO_3']['DIRECCION'] = 'CALLE 62 B # 09-58';
                    $lista_Usuarios['MEDICO_4']['DIRECCION'] = 'CALLE 63 B # 09-59';
                    $lista_Usuarios['MEDICO_5']['DIRECCION'] = 'CALLE 64 B # 09-60';
                    $lista_Usuarios['MEDICO_6']['DIRECCION'] = 'CALLE 65 B # 09-61';

                    $lista_Usuarios['USUARIO_1']['DIRECCION'] = 'CALLE 50 A # 10-102';
                    $lista_Usuarios['USUARIO_2']['DIRECCION'] = 'CALLE 51 A # 11-103';
                    $lista_Usuarios['USUARIO_3']['DIRECCION'] = 'CALLE 52 A # 12-104';
                    $lista_Usuarios['USUARIO_4']['DIRECCION'] = 'CALLE 53 A # 13-105';
                    $lista_Usuarios['USUARIO_5']['DIRECCION'] = 'CALLE 54 A # 14-106';
                    $lista_Usuarios['USUARIO_6']['DIRECCION'] = 'CALLE 55 A # 15-107';

                    $lista_Usuarios['ADMINISTRADOR']['TIPO_DE_PERFIL'] = 1;

                    $lista_Usuarios['MEDICO_1']['TIPO_DE_PERFIL'] = 2;
                    $lista_Usuarios['MEDICO_2']['TIPO_DE_PERFIL'] = 2;
                    $lista_Usuarios['MEDICO_3']['TIPO_DE_PERFIL'] = 2;
                    $lista_Usuarios['MEDICO_4']['TIPO_DE_PERFIL'] = 2;
                    $lista_Usuarios['MEDICO_5']['TIPO_DE_PERFIL'] = 2;
                    $lista_Usuarios['MEDICO_6']['TIPO_DE_PERFIL'] = 2;

                    $lista_Usuarios['USUARIO_1']['TIPO_DE_PERFIL'] = 3;
                    $lista_Usuarios['USUARIO_2']['TIPO_DE_PERFIL'] = 3;
                    $lista_Usuarios['USUARIO_3']['TIPO_DE_PERFIL'] = 3;
                    $lista_Usuarios['USUARIO_4']['TIPO_DE_PERFIL'] = 3;
                    $lista_Usuarios['USUARIO_5']['TIPO_DE_PERFIL'] = 3;
                    $lista_Usuarios['USUARIO_6']['TIPO_DE_PERFIL'] = 3;

                    $n_Usuarios = 1;
                    foreach( $lista_Usuarios as $Usuario ){
                        $sqlInsertUsuarios = "  INSERT INTO Usuarios (ID, NOMBRE, APELLIDO, NUMERO_TELEFONO, DEPARTAMENTO, MUNICIPIO, DIRECCION, TIPO_DE_PERFIL ,USUARIO, CONTRASEÑA) 
                                                VALUES ( ".$n_Usuarios.", '".$Usuario['NOMBRE']."' , '".$Usuario['APELLIDO']."' , '".$Usuario['TELEFONO']."', '".$Usuario['DEPARTAMENTO']."' ,'".$Usuario['MUNICIPIO']."', '".$Usuario['DIRECCION']."', '".$Usuario['TIPO_DE_PERFIL']."', '".$Usuario['USUARIO']."' , '".$Usuario['CONTRASEÑA']."')";
                        
                        if (mysqli_query($con, $sqlInsertUsuarios)) 
                        {
                            $data .= "result_query success_text - Inserción de Usuario correcta.<br>";
                        } else {
                            $data .= "result_query error_text - Error en la inserción de ".$Usuario['NOMBRE']." en la tabla Usuarios: " . mysqli_error($con) . ".<br>";
                        }
                        $n_Usuarios++;
                    } 

                    // inserción Consultas

                    $lista_Consultas['CONSULTA_1']['VALOR'] = 210000;
                    $lista_Consultas['CONSULTA_2']['VALOR'] = 100000;
                    $lista_Consultas['CONSULTA_3']['VALOR'] = 300500;
                    $lista_Consultas['CONSULTA_4']['VALOR'] = 510000;
                    $lista_Consultas['CONSULTA_5']['VALOR'] = 159000;
                    $lista_Consultas['CONSULTA_6']['VALOR'] = 220000;

                    $lista_Consultas['CONSULTA_1']['MEDICO'] = 1;
                    $lista_Consultas['CONSULTA_2']['MEDICO'] = 2;
                    $lista_Consultas['CONSULTA_3']['MEDICO'] = 3;
                    $lista_Consultas['CONSULTA_4']['MEDICO'] = 4;
                    $lista_Consultas['CONSULTA_5']['MEDICO'] = 5;
                    $lista_Consultas['CONSULTA_6']['MEDICO'] = 6;

                    $n_Consultas = 1;
                    foreach( $lista_Consultas as $consulta ){
                        $sqlInsertConsultas = "     INSERT INTO Consultas (ID, VALOR, MEDICO) 
                                                    VALUES ( ".$n_Consultas.", ".$consulta['VALOR'].", ".$consulta['MEDICO'].")";
                        
                        if (mysqli_query($con, $sqlInsertConsultas)) 
                        {
                            $data .= "result_query success_text - Inserción de Consulta correcta.<br>";
                        } else {
                            $data .= "result_query error_text - Error en la inserción de ".$consulta['VALOR']." en la tabla Consultas: " . mysqli_error($con) . ".<br>";
                        }
                        $n_Consultas++;
                    } 

                    // inserción Citas Medicas

                    $lista_Citas['CITA_1']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_2']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_3']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_4']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_5']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_6']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_7']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_8']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_9']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_10']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_11']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_12']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_13']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_14']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Citas['CITA_15']['FECHA'] = '2022/08/17 15:20:10';

                    $lista_Citas['CITA_1']['MEDICO'] = 1;
                    $lista_Citas['CITA_2']['MEDICO'] = 2;
                    $lista_Citas['CITA_3']['MEDICO'] = 3;
                    $lista_Citas['CITA_4']['MEDICO'] = 4;
                    $lista_Citas['CITA_5']['MEDICO'] = 5;
                    $lista_Citas['CITA_6']['MEDICO'] = 6;
                    $lista_Citas['CITA_7']['MEDICO'] = 1;
                    $lista_Citas['CITA_8']['MEDICO'] = 2;
                    $lista_Citas['CITA_9']['MEDICO'] = 3;
                    $lista_Citas['CITA_10']['MEDICO'] = 4;
                    $lista_Citas['CITA_11']['MEDICO'] = 5;
                    $lista_Citas['CITA_12']['MEDICO'] = 6;
                    $lista_Citas['CITA_13']['MEDICO'] = 1;
                    $lista_Citas['CITA_14']['MEDICO'] = 2;
                    $lista_Citas['CITA_15']['MEDICO'] = 3;
                    
                    $lista_Citas['CITA_1']['USUARIO'] = 8;
                    $lista_Citas['CITA_2']['USUARIO'] = 9;
                    $lista_Citas['CITA_3']['USUARIO'] = 10;
                    $lista_Citas['CITA_4']['USUARIO'] = 11;
                    $lista_Citas['CITA_5']['USUARIO'] = 12;
                    $lista_Citas['CITA_6']['USUARIO'] = 13;
                    $lista_Citas['CITA_7']['USUARIO'] = 8;
                    $lista_Citas['CITA_8']['USUARIO'] = 9;
                    $lista_Citas['CITA_9']['USUARIO'] = 10;
                    $lista_Citas['CITA_10']['USUARIO'] = 11;
                    $lista_Citas['CITA_11']['USUARIO'] = 12;
                    $lista_Citas['CITA_12']['USUARIO'] = 13;
                    $lista_Citas['CITA_13']['USUARIO'] = 8;
                    $lista_Citas['CITA_14']['USUARIO'] = 9;
                    $lista_Citas['CITA_15']['USUARIO'] = 10;

                    $lista_Citas['CITA_1']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_2']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_3']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_4']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_5']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_6']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_7']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_8']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_9']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_10']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_11']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_12']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_13']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_14']['COMPLETADA'] = 'FALSE';
                    $lista_Citas['CITA_15']['COMPLETADA'] = 'FALSE';

                    $lista_Citas['CITA_1']['CONSULTORIO'] = 1;
                    $lista_Citas['CITA_2']['CONSULTORIO'] = 2;
                    $lista_Citas['CITA_3']['CONSULTORIO'] = 3;
                    $lista_Citas['CITA_4']['CONSULTORIO'] = 4;
                    $lista_Citas['CITA_5']['CONSULTORIO'] = 5;
                    $lista_Citas['CITA_6']['CONSULTORIO'] = 6;
                    $lista_Citas['CITA_7']['CONSULTORIO'] = 1;
                    $lista_Citas['CITA_8']['CONSULTORIO'] = 2;
                    $lista_Citas['CITA_9']['CONSULTORIO'] = 3;
                    $lista_Citas['CITA_10']['CONSULTORIO'] = 4;
                    $lista_Citas['CITA_11']['CONSULTORIO'] = 5;
                    $lista_Citas['CITA_12']['CONSULTORIO'] = 6;
                    $lista_Citas['CITA_13']['CONSULTORIO'] = 1;
                    $lista_Citas['CITA_14']['CONSULTORIO'] = 2;
                    $lista_Citas['CITA_15']['CONSULTORIO'] = 3;

                    $lista_Citas['CITA_1']['TIPO_DE_CONSULTA'] = 1;
                    $lista_Citas['CITA_2']['TIPO_DE_CONSULTA'] = 2;
                    $lista_Citas['CITA_3']['TIPO_DE_CONSULTA'] = 3;
                    $lista_Citas['CITA_4']['TIPO_DE_CONSULTA'] = 4;
                    $lista_Citas['CITA_5']['TIPO_DE_CONSULTA'] = 5;
                    $lista_Citas['CITA_6']['TIPO_DE_CONSULTA'] = 6;
                    $lista_Citas['CITA_7']['TIPO_DE_CONSULTA'] = 1;
                    $lista_Citas['CITA_8']['TIPO_DE_CONSULTA'] = 2;
                    $lista_Citas['CITA_9']['TIPO_DE_CONSULTA'] = 3;
                    $lista_Citas['CITA_10']['TIPO_DE_CONSULTA'] = 4;
                    $lista_Citas['CITA_11']['TIPO_DE_CONSULTA'] = 5;
                    $lista_Citas['CITA_12']['TIPO_DE_CONSULTA'] = 6;
                    $lista_Citas['CITA_13']['TIPO_DE_CONSULTA'] = 1;
                    $lista_Citas['CITA_14']['TIPO_DE_CONSULTA'] = 2;
                    $lista_Citas['CITA_15']['TIPO_DE_CONSULTA'] = 3;

                    $n_Citas = 1;
                    foreach( $lista_Citas as $cita ){
                        $sqlInsertCitas = "     INSERT INTO Citas_Medicas (ID, FECHA, MEDICO, USUARIO, COMPLETADA, CONSULTORIO, TIPO_CONSULTA) 
                                                VALUES ( ".$n_Citas.", '".$cita['FECHA']."', ".$cita['MEDICO'].", ".$cita['USUARIO'].",".$cita['COMPLETADA'].",".$cita['CONSULTORIO'].",".$cita['TIPO_DE_CONSULTA'].")";
                        
                        if (mysqli_query($con, $sqlInsertCitas)) 
                        {
                            $data .= "result_query success_text - Inserción de Cita correcta.<br>";
                        } else {
                            $data .= "result_query error_text - Error en la inserción de ".$cita['FECHA']." en la tabla Citas: " . mysqli_error($con) . ".<br>";
                        }
                        $n_Citas++;
                    } 

                    // inserción Reportes Medicos

                    $lista_Reportes['REPORTE_1']['DIAGNOSTICO'] = 'El paciente tiene problemas';
                    $lista_Reportes['REPORTE_2']['DIAGNOSTICO'] = 'El paciente tiene problemas';
                    $lista_Reportes['REPORTE_3']['DIAGNOSTICO'] = 'El paciente tiene problemas';
                    $lista_Reportes['REPORTE_4']['DIAGNOSTICO'] = 'El paciente tiene problemas';
                    $lista_Reportes['REPORTE_5']['DIAGNOSTICO'] = 'El paciente tiene problemas';
                    $lista_Reportes['REPORTE_6']['DIAGNOSTICO'] = 'El paciente tiene problemas';

                    $lista_Reportes['REPORTE_1']['USUARIO'] = 8;
                    $lista_Reportes['REPORTE_2']['USUARIO'] = 9;
                    $lista_Reportes['REPORTE_3']['USUARIO'] = 10;
                    $lista_Reportes['REPORTE_4']['USUARIO'] = 11;
                    $lista_Reportes['REPORTE_5']['USUARIO'] = 12;
                    $lista_Reportes['REPORTE_6']['USUARIO'] = 13;

                    $lista_Reportes['REPORTE_1']['MEDICO'] = 2;
                    $lista_Reportes['REPORTE_2']['MEDICO'] = 3;
                    $lista_Reportes['REPORTE_3']['MEDICO'] = 4;
                    $lista_Reportes['REPORTE_4']['MEDICO'] = 5;
                    $lista_Reportes['REPORTE_5']['MEDICO'] = 6;
                    $lista_Reportes['REPORTE_6']['MEDICO'] = 7;

                    $lista_Reportes['REPORTE_1']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Reportes['REPORTE_2']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Reportes['REPORTE_3']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Reportes['REPORTE_4']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Reportes['REPORTE_5']['FECHA'] = '2022/08/17 15:20:10';
                    $lista_Reportes['REPORTE_6']['FECHA'] = '2022/08/17 15:20:10';

                    $n_Reportes = 1;
                    foreach( $lista_Reportes as $reporte ){
                        $sqlInsertReportes = "  INSERT INTO Reportes_Medicos (ID, DIAGNOSTICO, USUARIO, MEDICO, FECHA) 
                                                VALUES ( ".$n_Reportes.", '".$reporte['DIAGNOSTICO']."', ".$reporte['USUARIO'].", ".$reporte['MEDICO'].",'".$reporte['FECHA']."')";
                        
                        if (mysqli_query($con, $sqlInsertReportes)) 
                        {
                            $data .= "result_query success_text - Inserción de Reporte medico correcta.<br>";
                        } else {
                            $data .= "result_query error_text - Error en la inserción de ".$reporte['DIAGNOSTICO']." en la tabla Reportes medicos: " . mysqli_error($con) . ".<br>";
                        }
                        $n_Reportes++;
                    } 

                    // inserción Medicamentos

                    $lista_Medicamentos['MEDICAMENTO_1']['NOMBRE'] = 'acetaminofén';
                    $lista_Medicamentos['MEDICAMENTO_2']['NOMBRE'] = 'diclofenaco';
                    $lista_Medicamentos['MEDICAMENTO_3']['NOMBRE'] = 'ibuprofeno';
                    $lista_Medicamentos['MEDICAMENTO_4']['NOMBRE'] = 'naproxeno';

                    $n_Medicamentos = 1;
                    foreach( $lista_Medicamentos as $medicamento ){
                        $sqlInsertMedicamentos = "  INSERT INTO Medicamentos (ID, NOMBRE) 
                                                VALUES ( ".$n_Medicamentos.", '".$medicamento['NOMBRE']."')";
                        
                        if (mysqli_query($con, $sqlInsertMedicamentos)) 
                        {
                            $data .= "result_query success_text - Inserción de medicamento correcta.<br>";
                        } else {
                            $data .= "result_query error_text - Error en la inserción de ".$medicamento['NOMBRE']." en la tabla Medicamentos: " . mysqli_error($con) . ".<br>";
                        }
                        $n_Medicamentos++;
                    }
                    
                    // inserción Reportes_X_Medicamentos

                    $lista_Reporte_X_Medicamentos['REPORTE_X_MEDICAMENTO_1']['ID_MEDICAMENTO'] = 1;
                    $lista_Reporte_X_Medicamentos['REPORTE_X_MEDICAMENTO_1']['ID_REPORTE_MEDICO'] = 1;

                    $lista_Reporte_X_Medicamentos['REPORTE_X_MEDICAMENTO_2']['ID_MEDICAMENTO'] = 2;
                    $lista_Reporte_X_Medicamentos['REPORTE_X_MEDICAMENTO_2']['ID_REPORTE_MEDICO'] = 2;

                    $lista_Reporte_X_Medicamentos['REPORTE_X_MEDICAMENTO_3']['ID_MEDICAMENTO'] = 3;
                    $lista_Reporte_X_Medicamentos['REPORTE_X_MEDICAMENTO_3']['ID_REPORTE_MEDICO'] = 3;

                    $lista_Reporte_X_Medicamentos['REPORTE_X_MEDICAMENTO_4']['ID_MEDICAMENTO'] = 4;
                    $lista_Reporte_X_Medicamentos['REPORTE_X_MEDICAMENTO_4']['ID_REPORTE_MEDICO'] = 4;

                    $lista_Reporte_X_Medicamentos['REPORTE_X_MEDICAMENTO_5']['ID_MEDICAMENTO'] = 1;
                    $lista_Reporte_X_Medicamentos['REPORTE_X_MEDICAMENTO_5']['ID_REPORTE_MEDICO'] = 5;

                    $lista_Reporte_X_Medicamentos['REPORTE_X_MEDICAMENTO_6']['ID_MEDICAMENTO'] = 2;
                    $lista_Reporte_X_Medicamentos['REPORTE_X_MEDICAMENTO_6']['ID_REPORTE_MEDICO'] = 6;

                    $n_Reportes_X_Medicamentos = 1;
                    foreach( $lista_Reporte_X_Medicamentos as $repo_med ){
                        $sqlInsertReportes_X_Medicamentos = "  INSERT INTO Reportes_X_Medicamentos (ID_MEDICAMENTO, ID_REPORTE_MEDICO) 
                                                VALUES ( ".$repo_med['ID_MEDICAMENTO'].", ".$repo_med['ID_REPORTE_MEDICO'].")";
                        
                        if (mysqli_query($con, $sqlInsertReportes_X_Medicamentos)) 
                        {
                            $data .= "result_query success_text - Inserción de reporte x medicamento correcta.<br>";
                        } else {
                            $data .= "result_query error_text - Error en la inserción de reporte x medicamento en la tabla Reportes_X_Medicamentos: " . mysqli_error($con) . ".<br>";
                        }
                        $n_Reportes_X_Medicamentos++;
                    }
                }
                mysqli_close($con);
            }
        }
    }

    echo $data;
?>