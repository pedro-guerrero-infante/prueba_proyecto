<link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>/css/custom_styles.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>/js/funciones.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<?= $this->include('header_general'); ?>

        <div class="container mt-n10">
            <div class="card mb-4">
                <div class="card-header">
                    Pantalla de inicio
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="tabla_opciones">
                        <table class="table table-bordered table-hover size_table" width="100%" cellspacin="0">
                            <thead>			
                                <tr class="text-blue">
                                    <th>Opción</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="text-blue">
                                    <th>Opción</th>
                                    <th>Acción</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <?php
                                        $n = 0;
                                        foreach( $opciones as $opcion ){
                                            echo '  <tr>
                                                        <td>'.$opcion.'</td>'; ?>
                                                        <td class="text-center">
                                                            <?php 
                                                            if(isset($id_medico)){ ?>
                                                                <a class="dropdown-item" id="" href="<?php echo $links[$n]; ?>/<?php echo $n; ?>/<?php echo $id_medico; ?>">
                                                            <?php
                                                            } elseif(isset($id_usuario)){ ?>
                                                                <a class="dropdown-item" id="" href="<?php echo $links[$n]; ?>/<?php echo $id_usuario; ?>">
                                                            <?php } else { ?>
                                                                <a class="dropdown-item" id="" href="<?php echo $links[$n]; ?>/<?php echo $n; ?>">
                                                            <?php
                                                            }
                                                            ?>
                                                                <div class="dropdown-item-icon"><i class="text-green fas fa-2x <?php echo $imagenes[$n]?>"></i></div>
                                                            </a>
                                                        </td>
                                    <?php   echo    '</tr>';
                                        $n++;
                                        } ?>
                            </tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    <?php
    if(isset($opciones_tabla_medicos)){ ?>
        <div class="container">
            <div class="card mb-4">
                <div class="card-header">
                    Tabla medicos
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="tabla_opciones">
                        <table class="table table-bordered table-hover size_table" width="100%" cellspacin="0">
                            <thead>			
                                <tr class="text-blue">
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="text-blue">
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Telefono</th>
                                    <th>Direccion</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php                                                  
                                    foreach( $opciones_tabla_medicos as $usuario ){
                                        if($usuario->TIPO_DE_PERFIL == '2'){
                                        echo '  <tr>
                                                    <td>'.$usuario->NOMBRE.'</td>
                                                    <td>'.$usuario->APELLIDO.'</td>
                                                    <td>'.$usuario->NUMERO_TELEFONO.'</td>
                                                    <td>'.$usuario->DIRECCION.'</td>'; ?>
                                                    <td class="text-center">
                                                        <a class="dropdown-item" href="menuConsultas/<?php echo $usuario->ID; ?>">
                                                            <div class="dropdown-item-icon"><i class="text-gray-500 fas fa-2x fa-edit"></i></div>
                                                        </a>
                                                    </td>
                                <?php   echo    '</tr>';
                                        }
                                    } ?>
                            </tbody>
						</table>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>    
    </main>
    <?= $this->include('footer_general'); ?>
</div>