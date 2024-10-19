<body class="d-none">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                                    <th>NOMBRE</th>
                                    <th>CORREO</th>
                                    <th>TELEFONO</th>
                                    <th width="260">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">

                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>CORREO</th>
                                    <th>TELEFONO</th>
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
    <div class="modal fade" id="modalApp" tabindex="-1" aria-labelledby="modalAppLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAppLabel">Request information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form id="formRequest">
                        <input type="hidden" class="form-control" id="id" value>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
                            <label for="nombre">NOMBRE</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="correo" placeholder="Email" required>
                            <label for="correo">CORREO</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="telefono" placeholder="Telefono">
                            <label for="telefono" required>TELEFONO</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="descripcion" placeholder="descripcion" required>
                            <label for="descripcion" required>DESCRIPCION</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="predioId" placeholder="predioId" required>
                            <label for="predioId" required>ID PREDIO RELACIONADO</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select style="height:61px!important;" class="form-control" id="estado"
                                placeholder="Estado">
                                <option value="sin_resolver">Sin resolver</option>
                                <option value="resuelta">Resuelta</option>
                            </select>
                            <label for="estado">ESTADO DE LA SOLICITUD</label>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btnSubmit" form="formRequest" class="btn btn-primary">Guardar
                        Cambios</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<!--Script RFC4122-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.2/uuid.min.js"></script>
<!--Script my script-->
<script src="./assets/js/Requests/mainRequests.js"></script>
<!--Script my script-->
<script src="./assets/js/Requests/firebaseRequests.js"></script>