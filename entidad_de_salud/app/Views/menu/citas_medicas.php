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
                    </div>
                </div>
            </div>
        </header>

        <div class="container mt-n10">
            <div class="card mb-4">
                <div class="card-header">
                    Tabla de citas paciente
	                <a href="" class="btn btn-barra btn-icon" data-placement="bottom" title="volver"><i class="fas fa-2x fa-home"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="tabla_opciones">
                        <table class="table table-bordered table-hover size_table" width="100%" cellspacin="0">
                            <thead>			
                                <tr class="text-blue">
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Medico</th>
                                    <th>Usuario</th>
                                    <th>Consultorio</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="text-blue">
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Medico</th>
                                    <th>Usuario</th>
                                    <th>Consultorio</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <?php
                                        if($lista_citas != false){
                                            foreach( $lista_citas as $cita ){
                                                echo '  <tr>
                                                            <td>'.$cita->ID.'</td>
                                                            <td>'.$cita->FECHA.'</td>
                                                            <td>'.$cita->MEDICO.'</td>
                                                            <td>'.$cita->USUARIO.'</td>
                                                            <td>'.$cita->CONSULTORIO.'</td>';?>
                                        <?php   echo    '</tr>';
                                            
                                            } 
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