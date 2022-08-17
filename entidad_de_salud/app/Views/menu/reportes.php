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
                                Reportes medicos
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container mt-n10">
            <div class="card mb-4">
                <div class="card-header">
                    Tabla de reportes
	                <a href="" class="btn btn-barra btn-icon" data-placement="bottom" title="volver"><i class="fas fa-2x fa-home"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="tabla_opciones">
                        <table class="table table-bordered table-hover size_table" width="100%" cellspacin="0">
                            <thead>			
                                <tr class="text-blue">
                                    <th>Id</th>
                                    <th>Diagnostico</th>
                                    <th>Usuario</th>
                                    <th>Medico</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="text-blue">
                                    <th>Id</th>
                                    <th>Diagnostico</th>
                                    <th>Usuario</th>
                                    <th>Medico</th>
                                    <th>Fecha</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <?php
                                        if($lista_reportes != false){
                                            foreach( $lista_reportes as $reporte ){
                                                echo '  <tr>
                                                            <td>'.$reporte->ID.'</td>
                                                            <td>'.$reporte->DIAGNOSTICO.'</td>
                                                            <td>'.$reporte->USUARIO.'</td>
                                                            <td>'.$reporte->MEDICO.'</td>
                                                            <td>'.$reporte->FECHA.'</td>';?>
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