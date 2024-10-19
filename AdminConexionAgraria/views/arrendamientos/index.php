<body class="d-none">
    <style>
        #id_predio,
        #id_cliente {
            height: 4rem !important;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--btn add-->
                <form class="d-flex">
                    <button class="btn btn-outline-success" type="button" onclick="createArrendamiento();">Crear un
                        nuevo
                        arrendamiento</button>
                </form>
            </div>
        </div>
    </nav>
    <!--End Container nav-->

    <!--Container -->

    <div class="card">
        <div class="card-index">
            <div class="card-body">
                <div class="container">
                    <!--Container table-->
                    <div class="table-responsive tableApp">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>CLIENTE</th>
                                    <th>PREDIO</th>
                                    <th>VALOR</th>
                                    <th width="260">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>CLIENTE</th>
                                    <th>PREDIO</th>
                                    <th>VALOR</th>
                                    <th width="260">OPCIONES</th>
                                </tr>
                            </tfoot>

                        </table>
                    </div>
                    <!--End Container table-->
                </div>
            </div>
        </div>
    </div>
    <!--End Container -->

    <!--Container modal-->
    <!-- Modal -->
    <div class="modal fade" id="modalArrendamientos" tabindex="-1" aria-labelledby="modalAppLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAppLabel">Información del arriendo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form id="formArrendamientos">
                        <div class="form-floating mb-3">
                            <select class="form-control" id="id_cliente">
                                <option value="" selected>Clientes....</option>
                            </select>
                            <label for="id_cliente">CLIENTE</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-control" id="id_predio">
                                <option value="" selected>Predios....</option>
                            </select>
                            <label for="id_predio">PREDIO ARRENDADO</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="fecha_inicio"
                                placeholder="Fecha de inicio del arrendamiento">
                            <label for="fecha_inicio">FECHA DE INICIO DEL ARRENDAMIENTO (YYYY-MM-DD)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="fecha_finalizacion"
                                placeholder="Fecha de fin del arrendamiento">
                            <label for="fecha_finalizacion">FECHA DE FINALIZACIÓN DEL ARRENDAMIENTO (YYYY-MM-DD)</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="valor_arrendamiento"
                                placeholder="Valor del arrendamiento (en COP)">
                            <label for="valor_arrendamiento">VALOR DEL ARRENDAMIENTO</label>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btnSubmit" form="formArrendamientos" class="btn btn-primary">Guardar
                        Cambios</button>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<!--Script RFC4122-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.2/uuid.min.js"></script>
<!--Script my script-->
<script src="./assets/js/Arrendamientos/mainArrendamientos.js"></script>
<!--Script my script-->
<script src="./assets/js/Arrendamientos/firebaseArrendamientos.js"></script>
<script src="./assets/js/Arrendamientos/formateoContenido.js"></script>