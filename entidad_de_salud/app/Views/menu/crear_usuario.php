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
                                Crear
                                <?php 
                                   echo " ".$titulo;
                                ?>
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
                                <input type="text" class="form-control form-control-sm" name="Usuario[Usuario]" id="usuario" value="">	
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Contraseña"; ?></label>
                                <input type="text" class="form-control form-control-sm" name="Usuario[Contras]" id="contras" value="">	
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Nombre"; ?></label>
                                <input type="text" class="form-control form-control-sm" name="Usuario[Nombre]" id="usuario" value="">	
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Apellido"; ?></label>
                                <input type="text" class="form-control form-control-sm" name="Usuario[Apellido]" id="usuario" value="">	
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Telefono"; ?></label>
                                <input type="text" class="form-control form-control-sm" name="Usuario[Telefono]" id="usuario" value="">	
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Departamento"; ?></label>
                                <select id="id_departamento" class="form-control form-control-sm" name="Usuario[Departamento]" onchange="getMunicipios();" >
                                    <option value="">Seleccione...</option>
                                    <?php 
                                    foreach ($departamentos as $departamento) { 
                                        echo '<option value='.$departamento->ID.'>'.$departamento->NOMBRE.'</option>';										
                                    }
                                    ?>	
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Municipio"; ?></label>
                                <select id="id_municipios" class="form-control form-control-sm" name="Usuario[Municipio]" >
                                    <option value="">Seleccione...</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="small mb-1 font-weight-bold"><?php echo "Direccion"; ?></label>
                                <input type="text" class="form-control form-control-sm" name="Usuario[Direccion]" id="usuario" value="">	
                            </div>
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