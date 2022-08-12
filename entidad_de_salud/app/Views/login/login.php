<?= $this->include('header_general'); ?>

        <div class="container mt-n10">
            <form action="<?php echo $inicio; ?>" class="form-horizontal" name="form_busqueda" id="form_busqueda" method="POST" accept-charset="utf-8">					
                <div class="form-row">
                    <div class="form-group col-md-4"></div>
                    <div class="form-group col-md-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                Login
                            </div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="" class="small mb-1 font-weight-bold"><?php echo "Usuario"; ?></label>
                                        <input type="text" class="form-control form-control-sm" name="Usuario[usuario]" id="usuario" value="">	
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="" class="small mb-1 font-weight-bold"><?php echo "Contraseña"; ?></label>
                                        <input type="text" class="form-control form-control-sm" name="Usuario[contras]" id="contras" value="">	
                                    </div>
                                </div>
                                <div class="d-flex justify-content-around">	
                                    <input type="submit" class="btn btn-primary w-100" name="login" id="login" value="login">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4"></div>
                </div>
            </form>
        </div>
    </main>
    <?= $this->include('footer_general'); ?>
</div>