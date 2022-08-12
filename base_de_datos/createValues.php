<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/titles.css">
    <link rel="stylesheet" type="text/css" href="css/back.css">
    <title>Creacion de base de datos</title>
</head>

<body>
    <h1>Creación de base de datos</h1>
    <h2>Proyecto Programación web</h2>
    <h3>Mayo 2020</h3>
    <div>
    </div>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Usuarios ( UserName, Email, Contrasenia, Rol, Activo) 
            VALUES (\'admin\', \'admin@admin.com\', \'' . password_hash('admin', PASSWORD_DEFAULT) . '\', \'ADMIN\',false)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de administrador correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de administrador en la tabla usuarios: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>
    
    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Usuarios ( UserName, Email, Contrasenia, Rol, Activo) 
            VALUES (\'medico1\', \'medico1@medico1.com\', \'' . password_hash('medico1', PASSWORD_DEFAULT) . '\', \'MEDICO\',false)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de medico1 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de medico1 en la tabla usuarios: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Usuarios ( UserName, Email, Contrasenia, Rol, Activo) 
            VALUES (\'medico2\', \'medico2@medico2.com\', \'' . password_hash('medico2', PASSWORD_DEFAULT) . '\', \'MEDICO\',false)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de medico2 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de medico2 en la tabla usuarios: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Usuarios ( UserName, Email, Contrasenia, Rol, Activo) 
            VALUES (\'medico3\', \'medico3@medico3.com\', \'' . password_hash('medico3', PASSWORD_DEFAULT) . '\', \'MEDICO\',false)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de medico3 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de medico3 en la tabla usuarios: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Habitaciones () 
            VALUES ()';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de habitacion1 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de habitacion1 en la tabla Habitaciones: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Habitaciones () 
            VALUES ()';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de habitacion2 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de habitacion2 en la tabla Habitaciones: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Habitaciones () 
            VALUES ()';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de habitacion3 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de habitacion3 en la tabla Habitaciones: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Habitaciones () 
            VALUES ()';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de habitacion4 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de habitacion4 en la tabla Habitaciones: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Habitaciones () 
            VALUES ()';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de habitacion5 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de habitacion5 en la tabla Habitaciones: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 1, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama1 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama1 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 1, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama2 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama2 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 1, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama3 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama3 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 1, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama4 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama4 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 2, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama5 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama5 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 3, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama6 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama6 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Camas (HabNumero, PacienteId, Disponible) 
            VALUES ( 4, null , true)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de cama7 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de cama7 en la tabla Camas: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente, IdFormulario) 
            VALUES ( \'alcohol\', true , null, null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente, IdFormulario) 
            VALUES ( \'vacuna\', true , null, null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente, IdFormulario) 
            VALUES ( \'anestesia\', true , null, null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente, IdFormulario) 
            VALUES ( \'mascarilla\', true , null, null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Recursos (NombreDeRecurso, Disponible, IdPaciente, IdFormulario) 
            VALUES ( \'guantes\', true , null, null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de recurso correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de recurso en la tabla Recursos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente, IdFormulario) 
            VALUES ( \'maquina de ecografia\', true , null, null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente, IdFormulario) 
            VALUES ( \'maquina de resosnacia\', true , null, null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente, IdFormulario) 
            VALUES ( \'ventiladores\', true , null, null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Equipos (NombreDeEquipo, Disponible, IdPaciente, IdFormulario) 
            VALUES ( \'cateter\', true , null, null)';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de equipo correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de equipo en la tabla Equipos: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Pacientes (Identificacion, Nombre, Apellido, Prioridad, Diagnostico, FechaDeIngreso, DuracionEnDias, IdCama, NombreMedico) 
            VALUES ( 1127342601 ,\'paciente1\', \'enfermo1\' , null, null, null, null, null, null )';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de paciente1 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de paciente1 en la tabla Pacientes: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Pacientes (Identificacion, Nombre, Apellido, Prioridad, Diagnostico, FechaDeIngreso, DuracionEnDias, IdCama, NombreMedico) 
            VALUES ( 1127342602 ,\'paciente2\', \'enfermo2\' , null, null, null, null, null, null )';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de paciente2 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de paciente2 en la tabla Pacientes: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Pacientes (Identificacion, Nombre, Apellido, Prioridad, Diagnostico, FechaDeIngreso, DuracionEnDias, IdCama, NombreMedico) 
            VALUES ( 1127342603 ,\'paciente3\', \'enfermo3\' , null, null, null, null, null, null )';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de paciente3 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de paciente3 en la tabla Pacientes: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Pacientes (Identificacion, Nombre, Apellido, Prioridad, Diagnostico, FechaDeIngreso, DuracionEnDias, IdCama, NombreMedico) 
            VALUES ( 1127342600 ,\'paciente0\', \'enfermo0\' , null, null, null, null, null, null )';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de paciente0 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de paciente0 en la tabla Pacientes: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <?php
        include_once dirname(__FILE__) . '/config/config.php';
        $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
        
        if (!$con) 
        {
            echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
        } 
        else 
        {
            $sqlInsertAdmin = 'INSERT INTO Pacientes (Identificacion, Nombre, Apellido, Prioridad, Diagnostico, FechaDeIngreso, DuracionEnDias, IdCama, NombreMedico) 
            VALUES ( 1127342605 ,\'paciente5\', \'enfermo5\' , null, null, null, null, null, null )';
            
            if (mysqli_query($con, $sqlInsertAdmin)) 
            {
                echo "<br><div class=\"result_query success_text\"> Inserción de paciente5 correcta. </div>";
            } else {
                echo "<br><div class=\"result_query error_text\"> Error en la inserción de paciente5 en la tabla Pacientes: " . mysqli_error($con) . "</div>";
            }
            mysqli_close($con);
        }
    ?>    
    <br><br>

    <div>
        <a class="back" href="index.php">Regresar</a>
    </div>
</body>
</html>