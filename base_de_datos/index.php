<link href="css/styles.css" rel="stylesheet" />
<link href="css/custom_styles.css" rel="stylesheet" />
<script type="text/javascript" language="javascript" src="js/index/funciones.js"></script>
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
                                Creación de base de datos
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="container mt-n10">
            <div class="card mb-4">
                <div class="card-header">
                    Opciones de creacion de bases de datos
                </div>
                <div class="card-body">

                    <!-- Modal -->
                    <div class="d-none" id="addBookDialog" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo "Base de datos"; ?></h5>
                                    <button class="btn btn-red" type="button" onclick="cerrarModal();"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body" id="modal_body_mensaje"></div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" type="button" onclick="cerrarModal();" ><?php echo "cerrar"; ?></button>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                    <td>Creación base de datos</td>								
                                    <td class="text-center">
                                        <a class="dropdown-item" id="a_create_1" onclick="cambiarPantalla('createdatabase');">
                                            <div class="dropdown-item-icon"><i class="text-green fas fa-2x fa-plus-circle"></i></div>
                                        </a>

                                        <a class="dropdown-item d-none" id="a_create_2">
                                            <div class="dropdown-item-icon"><i class="text-gray-500 fas fa-2x fa-plus-circle"></i></div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Creación tablas</td>
                                    <td class="text-center">
                                        <a class="dropdown-item d-none" id="a_tables_1" onclick="cambiarPantalla('createtables');">
                                            <div class="dropdown-item-icon"><i class="text-green fas fa-2x fa-plus-circle"></i></div>
                                        </a>

                                        <a class="dropdown-item" id="a_tables_2">
                                            <div class="dropdown-item-icon"><i class="text-gray-500 fas fa-2x fa-plus-circle"></i></div>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Insercion de valores</td>
                                    <td class="text-center">
                                        <a class="dropdown-item d-none" id="a_values_1" onclick="cambiarPantalla('createValues');"> 
                                            <div class="dropdown-item-icon"><i class="text-green fas fa-2x fa-plus-circle"></i></div>
                                        </a>

                                        <a class="dropdown-item" id="a_values_2">
                                            <div class="dropdown-item-icon"><i class="text-gray-500 fas fa-2x fa-plus-circle"></i></div>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
						</table>
                    </div>	
                </div>
            </div>
        </div>
    </main>
</div>