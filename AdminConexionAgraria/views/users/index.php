<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!--btn add-->
            <form class="d-flex">
                <button class="btn btn-outline-success" type="button" onclick="createUser();">Crear un nuevo
                    usuario</button>
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
                                <th>NOMBRE</th>
                                <th>No DOCUMENTO</th>
                                <th>TELEFONO</th>
                                <th>CORREO</th>
                                <th width="260">OPCIONES</th>
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
                <h5 class="modal-title" id="modalAppLabel">User information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form id="formUsers">
                    <input type="hidden" class="form-control" id="id" value>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombre" placeholder="Nombre">
                        <label for="nombre">NOMBRE</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="numero_documento" placeholder="No. Documento"
                            pattern="\d*">
                        <label for="numero_documento">NO. DOCUMENTO</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="telefono" placeholder="Telefono" pattern="\d*">
                        <label for="telefono">TELEFONO</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="correo" placeholder="Correo">
                        <label for="correo">CORREO</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select style="height:61px!important;" class="form-control" id="role_id" placeholder="Rol">
                            <option value="">Seleccione un rol</option>
                        </select>
                        <label for="role">ROL</label>
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

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
<!--Script RFC4122-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.2/uuid.min.js"></script>
<!--Script my script-->
<script src="./assets/js/Users/mainUsers.js"></script>
<!--Script my script-->
<script src="./assets/js/Users/firebaseUsers.js"></script>

<script>
    document.getElementById('numero_documento').addEventListener('input', function (e) {
        this.value = this.value.replace(/\D/g, '');
    });

    document.getElementById('telefono').addEventListener('input', function (e) {
        this.value = this.value.replace(/\D/g, '');
    });

    document.getElementById('nombre').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
    });
</script>