<style>
    .carousel img {
        height: 567px !important;
        width: 80% !important;
        margin-left: 133px !important;
        border-radius: 20px;
    }

    input:hover {
        color: greenyellow;
        border: 1px dashed greenyellow;
    }

    .imagenesCarrusel{
        margin-bottom: 20px;
    }
</style>
<div class="container">
    <div class="mt-2 mb-2">
        <ol class="breadcrumb m-1 mt-4">
            <li class="breadcrumb-item"><a href="?c=dashboard&m=dashboard">Conexion agraria</a></li>
            <li class="breadcrumb-item"><a href="?c=territorios&m=index">Territorios</a></li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>
    </div>
    <div class="card mt-4 card-edit">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="mb-3">
                        <label for="nombreFinca" class="form-label">Propietario</label>
                        <input type="text" class="form-control" id="nombreFinca" value="RICARDO CASTRO" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form>
                            <div class="mb-3">
                                <label for="imagenesCarrusel" class="imagenesCarrusel">Imagenes del terreno</label>
                                <div id="carouselExampleControlsNoTouching" class="carousel slide"
                                    data-bs-touch="false">
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
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <form>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción del terreno</label>
                                <textarea class="form-control text-justify" id="descripcion"
                                    rows="7">Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, maiores? Unde in delectus, neque sapiente natus quam porro dolore minus sint, cum veritatis esse culpa distinctio. Eum veniam explicabo magni. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam saepe sed mollitia officiis ullam voluptatibus amet reiciendis, beatae quod at magni optio veniam nihil esse dicta iusto aliquid est repellat? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi aliquid laudantium excepturi, fuga nihil consequuntur sequi est, vero saepe dignissimos laborum distinctio cupiditate beatae placeat corrupti delectus minima a sunt!</textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <form>
                            <div class="mb-3">
                                <label for="nombreFinca" class="form-label">Nombre del terreno</label>
                                <input type="text" class="form-control" id="nombreFinca" value="Finca Maria Juana"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="areaPrivada" class="form-label">Area construida en m2</label>
                                <input type="number" class="form-control" id="areaConstruida" value="800" required>
                            </div>
                            <div class="mb-3">
                                <label for="areaPrivada" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" value="AUTOPISTA MEDELLIN KM 1"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="areaPrivada" class="form-label">Clima</label>
                                <input type="text" class="form-control" id="direccion" value="Soleado" required>
                            </div>
                            <div class="mb-3">
                                <label for="areaPrivada" class="form-label">Servicios</label>
                                <input type="text" class="form-control" id="direccion" value="Electricidad, Agua"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="areaPrivada" class="form-label">Precio de arrendamiento por hectarea</label>
                                <input type="number" class="form-control" id="direccion" value="100000" required>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-success">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <form>
                            <div class="mb-3">
                                <label for="areaConstruida" class="form-label">Medidas en m2</label>
                                <input type="number" class="form-control" id="medidas" value="1000" required>
                            </div>
                            <div class="mb-3">
                                <label for="areaConstruida" class="form-label">Área privada en m2</label>
                                <input type="number" class="form-control" id="areaPrivada" value="1000" required>
                            </div>
                            <div class="mb-3">
                                <label for="areaPrivada" class="form-label">Departamento</label>
                                <input type="text" class="form-control" id="departamento" value="Antioquia" required>
                            </div>
                            <div class="mb-3">
                                <label for="areaPrivada" class="form-label">Vias</label>
                                <input type="text" class="form-control" id="departamento" value="Antioquia" required>
                            </div>
                            <div class="mb-3">
                                <label for="areaPrivada" class="form-label">Altitud en m</label>
                                <input type="text" class="form-control" id="departamento" value="1500" required>
                            </div>
                            <div class="mb-3">
                                <label for="areaPrivada" class="form-label">Precio arrendamiento de la propiedad</label>
                                <input type="text" class="form-control" id="departamento" value="1000000" required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>