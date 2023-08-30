<style>
    .carousel img {
        height: 567px !important;
        width: 80% !important;
        margin-left: 133px !important;
        border-radius: 20px;
    }

    .accordion-button {
        background-color: #ffffff !important;
        border: 1px solid rgba(0, 0, 0, 0.125) !important;
    }

    .accordion-button:not(.collapsed) {
        color: #000;
    }

    .price-card {
        box-shadow: -10px 0 10px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="container">
    <div class="conteiner-fluid">
        <div class="mt-2 mb-2">
            <ol class="breadcrumb m-1 mt-4">
                <li class="breadcrumb-item"><a href="?c=dashboard&m=dashboard">Conexion agraria</a></li>
                <li class="breadcrumb-item"><a href="?c=territorios&m=index">Territorios</a></li>
                <li class="breadcrumb-item active">Detalles</li>
            </ol>
        </div>
        <div class="card mt-4 card-show">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <h2 class="nombrePropiedad">FINCA MARIA JUANA</h2>
                        <p class="propietario">PROPIETARIO: RICARDO CASTRO</p>
                    </div>
                    <div class="col-md-12">
                        <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="./assets/images/imagen1.jpg" class="d-block" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="./assets/images/imagen1.jpg" class="d-block" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="./assets/images/imagen1.jpg" class="d-block" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                        <div class="col-md-6 offset-md-1">
                            <h3 class="titulo-descripcion mt-4">Descripción</h3>
                        </div>
                        <div class="col-md-10 offset-md-1">
                            <p class="descripcion mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias
                                impedit molestiae officia sequi dolores veniam debitis voluptate veritatis, voluptatibus
                                tenetur ad ut magnam quasi corrupti, libero voluptatem harum exercitationem? Nulla.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias impedit molestiae officia
                                sequi dolores veniam debitis voluptate veritatis, voluptatibus tenetur ad ut magnam
                                quasi corrupti, libero voluptatem harum exercitationem? Nulla. Lorem ipsum dolor sit
                                amet consectetur adipisicing elit. Alias impedit molestiae officia sequi dolores veniam
                                debitis voluptate veritatis, voluptatibus tenetur ad ut magnam quasi corrupti, libero
                                voluptatem harum exercitationem? Nulla. Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Alias impedit molestiae officia sequi dolores veniam debitis voluptate
                                veritatis, voluptatibus tenetur ad ut magnam quasi corrupti, libero voluptatem harum
                                exercitationem? Nulla. Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias
                                impedit molestiae officia sequi dolores veniam debitis voluptate veritatis, voluptatibus
                                tenetur ad ut magnam quasi corrupti, libero voluptatem harum exercitationem? Nulla.</p>
                        </div>
                        <div class="col-md-12">
                            <div class="container mt-5">
                                <div class="row">
                                    <div class="col-md-5 offset-md-1">
                                        <div class="accordion" id="propertyDetails">
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="areaHeading">
                                                    <button class="accordion-button" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#areaCollapse"
                                                        aria-expanded="true" aria-controls="areaCollapse">
                                                        <span><i data-feather="info"></i> Detalles del terreno</span>
                                                    </button>
                                                </h2>
                                                <div id="areaCollapse" class="accordion-collapse collapse show"
                                                    aria-labelledby="areaHeading" data-bs-parent="#propertyDetails">
                                                    <div class="accordion-body">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <p><strong><i data-feather="globe"></i> Area
                                                                        Privada</strong></p>
                                                                <p><strong><i data-feather="layout"></i> Area
                                                                        Construida</strong></p>
                                                                <p><strong><i data-feather="map-pin"></i>
                                                                        Dirección</strong></p>
                                                                <p><strong><i data-feather="maximize"></i>
                                                                        Medidas</strong></p>
                                                                <p><strong><i data-feather="home"></i>
                                                                        Departamento</strong></p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p>1000 m²</p>
                                                                <p>800 m²</p>
                                                                <p>AV MEDELLIN KM 1</p>
                                                                <p>50x20 m</p>
                                                                <p>Antioquia</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p><strong><i data-feather="map"></i> Estado</strong>
                                                                </p>
                                                                <p><strong><i data-feather="sun"></i> Clima</strong></p>
                                                                <p><strong><i data-feather="map-pin"></i> Vías</strong>
                                                                </p>
                                                                <p><strong><i data-feather="zap"></i> Servicios</strong>
                                                                </p>
                                                                <p><strong><i data-feather="activity"></i>
                                                                        Altitud</strong></p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="text-success">Disponible</p>
                                                                <p>Soleado</p>
                                                                <p>Principales</p>
                                                                <p>Electricidad, Agua</p>
                                                                <p>1500 m</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card price-card">
                                            <div class="card-body">
                                                <h5 class="card-title">Precios</h5>
                                                <p class="card-text"><strong>Precio Arriendo por Hectárea (COP)</strong>
                                                </p>
                                                <p class="card-text">$100.000</p>
                                                <p class="card-text"><strong>Precio Arriendo Propiedad (COP)</strong>
                                                </p>
                                                <p class="card-text">$1.000.000</p>
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
    </div>
</div>