<link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>/css/custom_styles.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>/js/funciones.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet" crossorigin="anonymous" />

<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-custom pb-10">
            <div class="container">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                Citas medicas
                            </h1>
                        </div>
                        <div class="col-auto mt-4">
							<input type="button" id="busqueda" class="btn btn-white" onclick="mostrarFiltros();" value="<?php echo 'Busqueda avanzada'; ?>">
						</div>
                    </div>
                </div>
                <?= $this->include('menu/header_lista_citas_medicas'); ?>
            </div>
        </header>

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
                                    <th>Codigo</th>
                                    <th>Fecha</th>
                                    <th>Medico</th>
                                    <th>Usuario</th>
                                    <th>Completada</th>
                                    <th>Consultorio</th>
                                    <th>Tipo de consulta</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="text-blue">
                                    <th>Codigo</th>
                                    <th>Fecha</th>
                                    <th>Medico</th>
                                    <th>Usuario</th>
                                    <th>Completada</th>
                                    <th>Consultorio</th>
                                    <th>Tipo de consulta</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <?php
                                        $n = 0;
                                        foreach( $lista_citas as $cita ){
                                            echo '  <tr>
                                                        <td>'.$cita->ID.'</td>
                                                        <td>'.$cita->FECHA.'</td>
                                                        <td>'.$cita->MEDICO.'</td>
                                                        <td>'.$cita->USUARIO.'</td>
                                                        <td>'.$cita->COMPLETADA.'</td>
                                                        <td>'.$cita->CONSULTORIO.'</td>
                                                        <td>'.$cita->TIPO_CONSULTA.'</td>';?>

                                                        <td class="text-center">
                                                            <a class="dropdown-item" id="" href="">
                                                                <div class="dropdown-item-icon"><i class="text-gray-500 fas fa-2x fa-edit"></i></div>
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
    </main>
    <?= $this->include('footer_general'); ?>
</div>