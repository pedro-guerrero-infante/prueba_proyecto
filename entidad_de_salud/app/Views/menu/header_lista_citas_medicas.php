<div class="d-none" id="filtros">
    <hr/>
    <form action="<?php echo 'Home/agendar_citas_medicas/1'; ?>" name="form_solicitud" id="form_solicitud" method="POST" accept-charset="utf-8">	
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="txtNombre" class="small mb-1 font-weight-bold">Fecha</label>
                <input type="text" class="form-control form-control-sm" name="cita[fecha_ocurrencia]" id="fecha_desde" value="" readonly/>
                <script>
                    $(function () {
                        $("#fecha_desde").daterangepicker({
                            singleDatePicker: true,
                            showDropdowns: true,
                            autoApply: true,
                            locale: {
                            format: "YYYY-MM-DD hh:mm"
                            }
                        });
                    });
                </script>					  				
            </div>
            <div class="form-group col-md-6">
                <label for="" class="small mb-1 font-weight-bold"><?php echo "Consultorio"; ?></label>
                <select class="form-control form-control-sm" name="cita[consultorio]">
                    <option value="">Seleccione...</option>
                    <?php 
                    foreach ($lista_consultorios as $consultorio) { 
                        echo '<option value='.$consultorio->ID.'>'.$consultorio->ID.'</option>';										
                    }
                    ?>	
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-around">
            <input type="submit" class="btn btn-light" name="buscar" id="buscar" value="<?php echo 'buscar'; ?>">
            <a href="<?php echo $url_ver_todas; ?>" class="btn btn-primary" name="buscarTodas" id="buscarTodas"><?php echo 'ver todas'; ?></a>	
        </div>
    </form>
    <hr/>
</div>