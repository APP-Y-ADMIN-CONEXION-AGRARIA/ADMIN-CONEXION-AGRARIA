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
                    <a class="nav-link" href=""> Territorios</a>
                </li>
            </ul>
            <!--btn add-->
            <form class="d-flex">
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
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>DIRECCION</th>
                                <th>MEDIDA</th>
                                <th>CLIMA</th>
                                <th width="260">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">

                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>DIRECCION</th>
                                <th>MEDIDA</th>
                                <th>CLIMA</th>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAppLabel">Properties information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                            type="button" role="tab" aria-controls="info" aria-selected="true">Info</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="ubicacion-tab" data-bs-toggle="tab" data-bs-target="#ubicacion"
                            type="button" role="tab" aria-controls="ubicacion" aria-selected="false">Ubicacion</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#images"
                            type="button" role="tab" aria-controls="images" aria-selected="false">Imagenes</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="propietarios-tab" data-bs-toggle="tab"
                            data-bs-target="#propietarios" type="button" role="tab" aria-controls="propietarios"
                            aria-selected="false">Propietarios</button>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                        <!-- Form for info -->
                        <!-- Form -->
                        <form id="formProperties">
                            <input type="hidden" class="form-control" id="id" value>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
                                <label for="nombre">NOMBRE</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="descripcion" placeholder="Descripcion"
                                    required>
                                <label for="departamento">DESCRIPCION</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="direccion" placeholder="Direccion" required>
                                <label for="medida">DIRECCION</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="medida" placeholder="Medida" required>
                                <label for="medida">MEDIDA</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="clima" placeholder="Clima" required>
                                <label for="clima">CLIMA</label>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>
                    <div class="tab-pane fade" id="ubicacion" role="tabpanel" aria-labelledby="ubicacion-tab">
                        <!-- Form for ubicacion -->
                        <!-- Form -->
                        <form id="formPropertiesUbicacion">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="departamento" required>
                                    <option value="" selected disabled>Selecciona un departamento</option>
                                </select>
                                <label for="departamento">DEPARTAMENTO</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" id="municipios" required>
                                    <option value="" selected disabled>Selecciona un municipio</option>
                                </select>
                                <label for="municipios">Municipios</label>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>

                    <!-- Inputs for images in modal -->
                    <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                        <!-- Form for images -->
                        <form id="formPropertiesImages">
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="imagen1" required
                                    onchange="handleFileUpload(event, 'imagen1')">
                                <label for="imagen1">Imagen 1</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="imagen2" required
                                    onchange="handleFileUpload(event, 'imagen2')">
                                <label for="imagen2">Imagen 2</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="imagen3" required
                                    onchange="handleFileUpload(event, 'imagen3')">
                                <label for="imagen3">Imagen 3</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="imagen4" required
                                    onchange="handleFileUpload(event, 'imagen4')">
                                <label for="imagen4">Imagen 4</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="file" class="form-control" id="imagen5" required
                                    onchange="handleFileUpload(event, 'imagen5')">
                                <label for="imagen5">Imagen 5</label>
                            </div>
                        </form>
                        <!-- End Form -->
                    </div>



                    <!-- Agrega esta nueva pestaña -->
                    <div class="tab-pane fade" id="propietarios" role="tabpanel" aria-labelledby="propietarios-tab">
                        <!-- Form for propietarios -->
                        <form id="formPropietarios">
                            <div class="form-floating mb-3" id="SelectContainer">
                                <select class="form-select" id="propietariosSelect" required>
                                    <!-- Options will be populated dynamically -->
                                    <option value="" selected disabled>Selecciona un propietario</option>
                                </select>
                                <label for="propietariosSelect">Propietarios</label>
                                <!-- Botón para agregar usuarios -->
                                <button class="btn btn-primary" id="btnAgregarUsuario"
                                    onclick="agregarUsuarioSeleccionado()">+</button>
                            </div>

                            <!-- Contenedor para mostrar los usuarios seleccionados -->
                            <div id="usuariosSeleccionadosContainer">
                                <table class="table" style="width: 43rem;!important">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyModal">

                                    </tbody>
                                </table>
                            </div>

                        </form>
                        <!-- End Form -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnSubmit" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-BAP6MR6AuMTqq3iAq5E51Dw2spHtzeXJK3xvZxMBYbBkzRJb/sHf5BiJqJfZQ+8V"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<!--Script RFC4122-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.2/uuid.min.js"></script>

<!-- Firebase SDK -->
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-database.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.3.2/firebase-storage.js"></script>

<!-- Scripts personalizados -->
<script src="./assets/js/Properties/mainProperties.js"></script>
<script src="./assets/js/Properties/firebaseProperties.js"></script>
<script src="./assets/js/Properties/firebaseSDK.js"></script>