<body class="d-none">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex">
                    <button class="btn btn-outline-success" type="button" id="botonCrear" onclick="createUser();">Crear
                        un nuevo predio</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="card">
        <div class="card-index">
            <div class="card-body">
                <div class="container">
                    <div class="table-responsive tableApp">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>DIRECCION</th>
                                    <th>MEDIDA</th>
                                    <th>CLIMA</th>
                                    <th width="260">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <!-- Aquí se agregarán las filas dinámicamente -->
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>ID</th>
                                    <th>NOMBRE</th>
                                    <th>DIRECCION</th>
                                    <th>MEDIDA</th>
                                    <th>CLIMA</th>
                                    <th width="260">OPCIONES</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create -->
    <?php
    require_once('views/territorios/modals/modalCreate.php');
    ?>

    <!-- Modal View -->
    <?php
    require_once('views/territorios/modals/modalView.php');
    ?>

    <!-- Modal Edit -->
    <?php
    require_once('views/territorios/modals/modalEdit.php');
    ?>



    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <!--Script RFC4122-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uuid/8.3.2/uuid.min.js"></script>

    <!-- Scripts personalizados -->
    <script src="./assets/js/Properties/mainProperties.js"></script>
    <script src="./assets/js/Properties/firebaseProperties.js"></script>
    <!-- Añade otros scripts de Firebase que puedas necesitar, como firebase-auth, etc. -->
</body>

</html>