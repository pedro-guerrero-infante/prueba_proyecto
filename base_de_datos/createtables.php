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
        $sqlUsers = "DROP TABLE Usuarios;)";

        if (mysqli_query($con, $sqlUsers)) 
        {
            echo "<br><div class=\"result_query success_text\"> zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz </div>";
        } 
        else 
        {
            echo "<br><div class=\"result_query error_text\"> xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxX: " . mysqli_error($con) . "</div>";
        }
        mysqli_close($con);
    }
    ?>

    <?php
    include_once dirname(__FILE__) . '/config/config.php';
    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (!$con) {
        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
    } else {
        $sqlUsers = "CREATE TABLE Usuarios ( 
            UserName VARCHAR(50) NOT NULL, 
            PRIMARY KEY(UserName), 
            Email VARCHAR(100), 
            Contrasenia CHAR(60), 
            Rol CHAR(7) NOT NULL, 
            Activo BOOLEAN )";
        if (mysqli_query($con, $sqlUsers)) {
            echo "<br><div class=\"result_query success_text\"> Tabla Usuarios creada correctamente </div>";
        } else {
            echo "<br><div class=\"result_query error_text\"> Error en la creacion de la tabla Usuarios: " . mysqli_error($con) . "</div>";
        }
        mysqli_close($con);
    }
    ?>
    <br>
    
    <br>
    <?php
    include_once dirname(__FILE__) . '/config/config.php';
    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (!$con) {
        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
    } else {
        $sqlHabs = "CREATE TABLE Habitaciones ( 
            Numero INT NOT NULL AUTO_INCREMENT, 
            PRIMARY KEY(Numero))";

        if (mysqli_query($con, $sqlHabs)) 
        {
            echo "<br><div class=\"result_query success_text\"> Creación correcta de la tabla habitaciones. </div>";
        } else {
            echo "<br><div class=\"result_query error_text\"> Error en la creación de la tabla habitaciones" . mysqli_error($con) . "</div>";
        }
        mysqli_close($con);
    }
    ?>
    <br>
    
    <br>
    <?php
    include_once dirname(__FILE__) . '/config/config.php';
    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (!$con) {
        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
    } 
    else 
    {
        $sqlCamas = "CREATE TABLE Camas ( 
            Numero INT NOT NULL AUTO_INCREMENT, 
            HabNumero INT NOT NULL, 
            PacienteId BIGINT,
            Disponible BOOLEAN NOT NULL, 
            FOREIGN KEY (HabNumero) REFERENCES Habitaciones(Numero),
            PRIMARY KEY (Numero))";

        if (mysqli_query($con, $sqlCamas)) 
        {
            echo "<br><div class=\"result_query success_text\"> Creación correcta de la tabla Camas. </div>";
        } 
        else 
        {
            echo "<br><div class=\"result_query error_text\"> Error en la creación de la tabla Camas. " . mysqli_error($con) . "</div>";
        }
        mysqli_close($con);
    }
    ?>
    <br>     
    
    <!--
        Pedro estuvo aqui.
    -->
    
    <?php
    include_once dirname(__FILE__) . '/config/config.php';
    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (!$con) 
    {
        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
    } 
    else 
    {
        $sqlRecursos = "CREATE TABLE Recursos 
        ( 
            Numero INT NOT NULL AUTO_INCREMENT, 
            NombreDeRecurso CHAR(30) NOT NULL, 
            Disponible BOOLEAN NOT NULL,
            IdPaciente BIGINT,
            IdFormulario BIGINT, 
            PRIMARY KEY (Numero)
        )";

        if (mysqli_query($con, $sqlRecursos)) 
        {
            echo "<br><div class=\"result_query success_text\"> Creación correcta de la tabla Recursos. </div>";
        } 
        else 
        {
            echo "<br><div class=\"result_query error_text\"> Error en la creación de la tabla Recursos" . mysqli_error($con) . "</div>";
        }
        mysqli_close($con);
    }
    ?>
    
    <!--
        fin de la edicion de pedro.
    -->

     <!--
        Pedro estuvo aqui.
    -->
    
    <?php
    include_once dirname(__FILE__) . '/config/config.php';
    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (!$con) 
    {
        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
    } 
    else 
    {
        $sqlEquipos = "CREATE TABLE Equipos 
        ( 
            Numero INT NOT NULL AUTO_INCREMENT, 
            NombreDeEquipo CHAR(30) NOT NULL, 
            Disponible BOOLEAN,
            IdPaciente BIGINT,
            IdFormulario BIGINT, 
            PRIMARY KEY (Numero)
        )";

        if (mysqli_query($con, $sqlEquipos)) 
        {
            echo "<br><div class=\"result_query success_text\"> Creación correcta de la tabla Equipos. </div>";
        } 
        else 
        {
            echo "<br><div class=\"result_query error_text\"> Error en la creación de la tabla Equipos" . mysqli_error($con) . "</div>";
        }
        mysqli_close($con);
    }
    ?>
    
    <!--
        fin de la edicion de pedro.
    -->

     <!--
        Pedro estuvo aqui.
    -->

    <?php
    include_once dirname(__FILE__) . '/config/config.php';
    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (!$con) {
        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
    } else {
        $sqlSolicitudes = "CREATE TABLE Formularios ( 
            Id INT NOT NULL AUTO_INCREMENT,
            IdPaciente BIGINT NOT NULL, 
            NombrePaciente VARCHAR(20) NOT NULL,
            NombreMedico VARCHAR(20) NOT NULL, 
            FechaYHoraDeSolicitud DATE NOT NULL,
            Tipo VARCHAR(20) NOT NULL,
            Aprobado BOOLEAN,  
            PRIMARY KEY(Id))";
        if (mysqli_query($con, $sqlSolicitudes)) {
            echo "<br><div class=\"result_query success_text\"> Creación correcta de la tabla Formularios. </div>";
        } else {
            echo "<br><div class=\"result_query error_text\"> Error en la creación de la tabla Formularios" . mysqli_error($con) . "</div>";
        }
        mysqli_close($con);
    }
    ?>

      <!--
        fin de la edicion de pedro.
    -->

     <!--
        Pedro estuvo aqui.
    -->

    <?php
    include_once dirname(__FILE__) . '/config/config.php';
    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (!$con) {
        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
    } else {
        $sqlPacientes = "CREATE TABLE Pacientes ( 
            Identificacion BIGINT NOT NULL, 
            Nombre VARCHAR(20) NOT NULL, 
            Apellido VARCHAR(20) NOT NULL,
            Prioridad VARCHAR(20),
            Diagnostico VARCHAR(100),
            FechaDeIngreso DATE,
            DuracionEnDias INT,
            IdCama INT,
            NombreMedico VARCHAR(50),
            FOREIGN KEY (NombreMedico) REFERENCES USUARIOS (UserName),
            PRIMARY KEY(Identificacion))";
        if (mysqli_query($con, $sqlPacientes)) {
            echo "<br><div class=\"result_query success_text\"> Creación correcta de la tabla Pacientes. </div>";
        } else {
            echo "<br><div class=\"result_query error_text\"> Error en la creación de la tabla Pacientes" . mysqli_error($con) . "</div>";
        }
        mysqli_close($con);
    }
    ?>

<?php
    include_once dirname(__FILE__) . '/config/config.php';
    $con = @mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE_NAME);
    if (!$con) {
        echo "<br><div class=\"result_query error_text\"> Error: No se pudo conectar a MySQL. " . mysqli_connect_error() . "</div>";
    } else {
        $sqlCorreos = "CREATE TABLE Correos ( 
            Id BIGINT NOT NULL AUTO_INCREMENT, 
            Informe VARCHAR(500) NOT NULL, 
            NombreMedico VARCHAR(20) NOT NULL,
            PRIMARY KEY(Id))";
        if (mysqli_query($con, $sqlCorreos)) {
            echo "<br><div class=\"result_query success_text\"> Creación correcta de la tabla correos. </div>";
        } else {
            echo "<br><div class=\"result_query error_text\"> Error en la creación de la tabla correos" . mysqli_error($con) . "</div>";
        }
        mysqli_close($con);
    }
    ?>

      <!--
        fin de la edicion de pedro.
    -->

    <br><br>
    <div>
        <a class="back" href="index.php">Regresar</a>
    </div>
</body>

</html>