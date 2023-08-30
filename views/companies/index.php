<div class="content">
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive mt-4">
                            <table class="table table-border table-hover table-striped">
                                <thead>
                                    <div class="text-md-2 mt-2 mt-md-2">
                                        <ol class="breadcrumb m-3">
                                            <li class="breadcrumb-item"><a href="">Conexion agraria</a></li>
                                            <li class="breadcrumb-item"><a href="">Usuarios</a></li>
                                            <li class="breadcrumb-item active">Compañias</li>
                                        </ol>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row justify-content-between">
                                                        <div class="col-md-8">
                                                            <form class="d-flex flex-wrap align-items-center">
                                                                <label for="" class="visually-hidden">buscar</label>
                                                                <div class="me-3">
                                                                    <input type="search"
                                                                        class="form-control my-2 my-md-2" id=""
                                                                        placeholder="buscar..."></input>
                                                                    <div class="col-md-4">
                                                                        <div class="text-md-2 mt-2 mt-md-2">
                                                                            <a href="?c=companies&m=create"
                                                                                class="btn btn-dark">Crear nueva
                                                                                compañia</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </thead>
                                <tbody>
                                    <div class="table-responsive mt-2">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card bg-pattern">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <img src="./assets/images/amazon.png" alt="logo"
                                                                class="avatar-xl rounded-circle mb-3">
                                                            <h4 class="mb-1 font-20">Amazon</h4>
                                                            <p class="text-muted  font-14">Seattle, Washington</p>
                                                        </div>
                                                        <p class="font-14 text-center text-muted">
                                                            Amazon.com, Inc., doing business as Amazon, is an American
                                                            electronic commerce and cloud computing company based in
                                                            Seattle..
                                                        </p>
                                                        <div class="text-center">
                                                            <?php for ($i = 1; $i < 2; $i++) { ?>
                                                                <a href="?c=companies&m=show"
                                                                    class="btn btn-sm btn-dark">Detalles</a>
                                                                <a href="?c=companies&m=edit"
                                                                    class="btn btn-sm btn-dark">Editar</a>
                                                                <button class="btn btn-sm btn-danger mb-1 mt-1"
                                                                    onclick="NotificacionEliminar();">Eliminar</button>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="row mt-4 text-center">
                                                            <div class="col-6">
                                                                <h5 class="fw-normal text-muted"></h5>
                                                                <h4>ID 1</h4>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="fw-normal text-muted"></h5>
                                                                <h4>NIT 3040506070</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card bg-pattern">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <img src="./assets/images/apple.png" alt="logo"
                                                                class="avatar-xl rounded-circle mb-3">
                                                            <h4 class="mb-1 font-20">Apple</h4>
                                                            <p class="text-muted  font-14">Cupertino, California</p>
                                                        </div>
                                                        <p class="font-14 text-center text-muted">
                                                            Apple Inc. is an American multinational technology company
                                                            headquartered in Cupertino, California, that designs,
                                                            develops,
                                                            and sells..
                                                        </p>
                                                        <div class="text-center">
                                                            <?php for ($i = 1; $i < 2; $i++) { ?>
                                                                <a href="?c=companies&m=show"
                                                                    class="btn btn-sm btn-dark">Detalles</a>
                                                                <a href="?c=companies&m=edit"
                                                                    class="btn btn-sm btn-dark">Editar</a>
                                                                <button class="btn btn-sm btn-danger mb-1 mt-1"
                                                                    onclick="NotificacionEliminar();">Eliminar</button>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="row mt-4 text-center">
                                                            <div class="col-6">
                                                                <h5 class="fw-normal text-muted"></h5>
                                                                <h4>ID 2</h4>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="fw-normal text-muted"></h5>
                                                                <h4>4723549235</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card bg-pattern">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <img src="./assets/images/google.png" alt="logo"
                                                                class="avatar-xl rounded-circle mb-3">
                                                            <h4 class="mb-1 font-20">Google</h4>
                                                            <p class="text-muted  font-14">Menlo Park, California</p>
                                                        </div>
                                                        <p class="font-14 text-center text-muted">
                                                            Google LLC is an American multinational technology company
                                                            that
                                                            specializes in Internet-related services and products, which
                                                            include..
                                                        </p>
                                                        <div class="text-center">
                                                            <?php for ($i = 1; $i < 2; $i++) { ?>
                                                                <a href="?c=companies&m=show"
                                                                    class="btn btn-sm btn-dark">Detalles</a>
                                                                <a href="?c=companies&m=edit"
                                                                    class="btn btn-sm btn-dark">Editar</a>
                                                                <button class="btn btn-sm btn-danger mb-1 mt-1"
                                                                    onclick="NotificacionEliminar();">Eliminar</button>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="row mt-4 text-center">
                                                            <div class="col-6">
                                                                <h5 class="fw-normal text-muted"></h5>
                                                                <h4>ID 3</h4>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="fw-normal text-muted"></h5>
                                                                <h4>NIT 72135615513</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="card bg-pattern">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <img src="./assets/images/nike.png" alt="logo"
                                                                class="avatar-xl rounded-circle mb-3">
                                                            <h4 class="mb-1 font-20">nike.</h4>
                                                            <p class="text-muted  font-14">San Francisco, California</p>
                                                        </div>
                                                        <p class="font-14 text-center text-muted">
                                                            is a company based in San Francisco that operates an online
                                                            marketplace and hospitality service
                                                            for people to lease or rent..
                                                        </p>
                                                        <div class="text-center">
                                                            <?php for ($i = 1; $i < 2; $i++) { ?>
                                                                <a href="?c=companies&m=show"
                                                                    class="btn btn-sm btn-dark">Detalles</a>
                                                                <a href="?c=companies&m=edit"
                                                                    class="btn btn-sm btn-dark">Editar</a>
                                                                <button class="btn btn-sm btn-danger mb-1 mt-1"
                                                                    onclick="NotificacionEliminar();">Eliminar</button>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="row mt-4 text-center">
                                                            <div class="col-6">
                                                                <h5 class="fw-normal text-muted"></h5>
                                                                <h4>ID 4</h4>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="fw-normal text-muted"></h5>
                                                                <h4>NIT 3563461351</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card bg-pattern">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <img src="./assets/images/facebook.png" alt="logo"
                                                                class="avatar-xl rounded-circle mb-3">
                                                            <h4 class="mb-1 font-20">Facebook</h4>
                                                            <p class="text-muted  font-14">Cambridge, Massachusetts</p>
                                                        </div>
                                                        <p class="font-14 text-center text-muted">
                                                            Facebook is an American online social media and social
                                                            networking service company based in Menlo Park, California..
                                                        </p>
                                                        <div class="text-center">
                                                            <?php for ($i = 1; $i < 2; $i++) { ?>
                                                                <a href="?c=companies&m=show"
                                                                    class="btn btn-sm btn-dark">Detalles</a>
                                                                <a href="?c=companies&m=edit"
                                                                    class="btn btn-sm btn-dark">Editar</a>
                                                                <button class="btn btn-sm btn-danger mb-1 mt-1"
                                                                    onclick="NotificacionEliminar();">Eliminar</button>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="row mt-4 text-center">
                                                            <div class="col-6">
                                                                <h5 class="fw-normal text-muted"></h5>
                                                                <h4>ID 5</h4>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="fw-normal text-muted"></h5>
                                                                <h4>NIT 65465132384</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="card bg-pattern">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <img src="./assets/images/instagram.png" alt="logo"
                                                                class="avatar-xl rounded-circle mb-3">
                                                            <h4 class="mb-1 font-20">instagram</h4>
                                                            <p class="text-muted  font-14">San Jose, California</p>
                                                        </div>
                                                        <p class="font-14 text-center text-muted">
                                                            Cisco Systems, Inc. is an American multinational technology
                                                            conglomerate headquartered in San Jose, California..
                                                        </p>
                                                        <div class="text-center">
                                                            <?php for ($i = 1; $i < 2; $i++) { ?>
                                                                <a href="?c=companies&m=show"
                                                                    class="btn btn-sm btn-dark">Detalles</a>
                                                                <a href="?c=companies&m=edit"
                                                                    class="btn btn-sm btn-dark">Editar</a>
                                                                <button class="btn btn-sm btn-danger mb-1 mt-1"
                                                                    onclick="NotificacionEliminar();">Eliminar</button>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="row mt-4 text-center">
                                                            <div class="col-6">
                                                                <h5 class="fw-normal text-muted"></h5>
                                                                <h4>ID 6</h4>
                                                            </div>
                                                            <div class="col-6">
                                                                <h5 class="fw-normal text-muted"></h5>
                                                                <h4>NIT 5646843</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </tbody>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-end">
                                            <ul class="pagination pagination-rounded justify-content-end">
                                                <li class="page-item">
                                                    <span aria-hidden="true">«</span>
                                                    <span class="visually-hidden">Previous</span>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">»</span>
                                                        <span class="visually-hidden">Next</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>