<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Inicio ></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""> Usuarios</a>
                </li>
            </ul>
            <!--btn add-->
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit" style="margin-right:10px;">Buscar</button>
                <button class="btn btn-outline-success" type="button" onclick="createUser();">Crear</button>
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
                    <table class="table table-dark table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>No DOCUMENTO</th>
                                <th>TELEFONO</th>
                                <th>CORREO</th>
                                <th width="260">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>No DOCUMENTO</th>
                                <th>TELEFONO</th>
                                <th>CORREO</th>
                                <th width="260">ACTIONS</th>
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
                <h5 class="modal-title" id="modalAppLabel">User information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form id="formUsers">
                    <input type="hidden" class="form-control" id="id" value>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
                        <label for="nombre">NOMBRE</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="numero_documento" placeholder="No. Documento" required>
                        <label for="direccion">NO. DOCUMENTO</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="telefono" placeholder="Telefono" required>
                        <label for="medida">TELEFONO</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="correo" placeholder="Correo" required>
                        <label for="img">CORREO</label>
                    </div>
                </form>
                <!-- End Form -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" id="btnSubmit" form="formUsers" class="btn btn-primary">Guardar
                    Cambios</button>
            </div>
        </div>
    </div>
</div>
<!--Container modal-->

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-BAP6MR6AuMTqq3iAq5E51Dw2spHtzeXJK3xvZxMBYbBkzRJb/sHf5BiJqJfZQ+8V"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<!--Script RFC4122-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.2/uuid.min.js"></script>
<!--Script my script-->
<script src="./assets/js/Users/mainUsers.js"></script>
<!--Script my script-->
<script src="./assets/js/Users/firebaseUsers.js"></script>
