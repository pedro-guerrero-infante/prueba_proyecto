<link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>/css/custom_styles.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>/js/funciones.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<?= $this->include('header_general'); ?>

        <div class="container mt-n10">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-around">
                        Tabla de consultas
                        <a href="" class="btn btn-barra btn-icon" data-toggle="tooltip" data-placement="bottom" title="nueva consulta"><i class="fas fa-2x fa-plus-circle"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="tabla_opciones">
                        <table class="table table-bordered table-hover size_table" width="100%" cellspacin="0">
                            <thead>			
                                <tr class="text-blue">
                                    <th>Codigo</th>
                                    <th>Valor</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="text-blue">
                                    <th>Codigo</th>
                                    <th>Valor</th>
                                    <th>Accion</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <?php
                                    foreach( $consultas as $consulta ){
                                        echo '  <tr>
                                                    <td>'.$consulta->ID.'</td>
                                                    <td>'.$consulta->VALOR.'</td>' ?>
                                                    <td class="text-center">
                                                        <a class="dropdown-item" id="" href="">
                                                            <div class="dropdown-item-icon"><i class="text-gray-500 fas fa-2x fa-edit"></i></div>
                                                        </a>
                                                    </td>
                                <?php   echo    '</tr>';
                                    
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