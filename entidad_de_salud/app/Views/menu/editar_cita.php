<link href="<?php echo base_url(); ?>/css/styles.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>/css/custom_styles.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>/js/funciones.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-custom pb-10">
            <div class="container">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                Editar citas medicas
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container mt-n10">
            <form action="<?php echo $ruta; ?>" class="form-horizontal" name="form_busqueda" id="form_busqueda" method="POST" accept-charset="utf-8">				
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Usuario"; ?></label>
                                <input type="text" class="form-control form-control-sm" name="Reporte[Usuario]"  value="<?php echo $cita[0]->USUARIO ?>">	
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Medico"; ?></label>
                                <input type="text" class="form-control form-control-sm" name="Reporte[Medico]"  value="<?php echo $cita[0]->MEDICO ?>">	
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Fecha"; ?></label>
                                <input type="text" class="form-control form-control-sm" name="Reporte[Fecha]" value="<?php echo $cita[0]->FECHA ?>">	
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Diagnostico"; ?></label>
                                <input type="text" class="form-control form-control-sm" name="Reporte[Diagnostico]" value="">	
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group text-center col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Añadir medicamento"; ?></label>
                                <a class="dropdown-item" id="" onclick="addMedicamento();">
                                    <div class="dropdown-item-icon"><i class="text-green fas fa-2x fa-plus-circle"></i></div>
                                </a>
                            </div>
                            <div class="form-group text-center col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Eliminar medicamento"; ?></label>
                                <a class="dropdown-item" id="" onclick="removeMedicamento();">
                                    <div class="dropdown-item-icon"><i class="text-red fas fa-2x fa-minus-circle"></i></div>
                                </a>
                            </div>
                        </div>

                        <div id="div_medicamentos" class="form-row d-none">
                            <div class="form-group col-md-6 d-none" id="form_group_medicamento_1"></div>
                            <div class="form-group col-md-6 d-none" id="form_group_medicamento_2"></div>
                            <div class="form-group col-md-6 d-none" id="form_group_medicamento_3"></div>
                            <div class="form-group col-md-6 d-none" id="form_group_medicamento_4"></div>
                        </div>

                        <div class="d-flex justify-content-around">	
                            <input type="submit" class="btn btn-primary w-100" value="crear">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?= $this->include('footer_general'); ?>
</div>
        