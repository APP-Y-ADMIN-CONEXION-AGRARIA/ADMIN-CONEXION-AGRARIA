<style>
    .fotos {
        display: none;
    }

    .fotosTerreno {
        height: 326px;
        width: 593px;
        border-radius: 10px;
        border: 1px dashed #999;
        margin-left: 338px;
        padding-top: 163px;
    }

    .fotosTerreno:hover,
    input:hover {
        color: greenyellow;
        border: 1px dashed greenyellow;
    }
</style>
<div class="container">
    <div class="mt-2 mb-2">
        <ol class="breadcrumb m-1 mt-4">
            <li class="breadcrumb-item"><a href="?c=dashboard&m=dashboard">Conexion agraria</a></li>
            <li class="breadcrumb-item"><a href="?c=territorios&m=index">Territorios</a></li>
            <li class="breadcrumb-item active">Nuevo registro</li>
        </ol>
    </div>
    <div class="card mt-4 card-create">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="mb-3">
                        <label for="nombreFinca" class="form-label">Propietario</label>
                        <input type="text" class="form-control" id="nombreFinca" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form>
                            <div class="mb-3">
                                <label for="fotos" class="form-label fotosTerreno text-center">Seleccione fotos del
                                    terreno</label>
                                <input type="file" class="form-control fotos" id="fotos" multiple>
                            </div>
                        </form>
                    </div>
                    <div class="col-12">
                        <form>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción del terreno</label>
                                <textarea class="form-control" id="descripcion" rows="5"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <form>
                            <div class="mb-3">
                                <label for="nombreFinca" class="form-label">Nombre del terreno</label>
                                <input type="text" class="form-control" id="nombreFinca" required>
                            </div>
                            <div class="mb-3">
                                <label for="areaConstruidam2" class="form-label">Area construida en m2</label>
                                <input type="number" class="form-control" id="areaConstruida" required>
                            </div>
                            <div class="mb-3">
                                <label for="Direccion" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="direccion" required>
                            </div>
                            <div class="mb-3">
                                <label for="Clima" class="form-label">Clima</label>
                                <input type="text" class="form-control" id="direccion" required>
                            </div>
                            <div class="mb-3">
                                <label for="Servicios" class="form-label">Servicios</label>
                                <input type="text" class="form-control" id="direccion" required>
                            </div>
                            <div class="mb-3">
                                <label for="arrendamientoHectarea" class="form-label">Precio de arrendamiento por hectarea</label>
                                <input type="text" class="form-control" id="direccion" required>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-success">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <form>
                            <div class="mb-3">
                                <label for="medidasm2" class="form-label">Medidas en m2</label>
                                <input type="number" class="form-control" id="medidas" required>
                            </div>
                            <div class="mb-3">
                                <label for="areaPrivadam2" class="form-label">Área privada en m2</label>
                                <input type="number" class="form-control" id="areaPrivada" required>
                            </div>
                            <div class="mb-3">
                                <label for="Departamento" class="form-label">Departamento</label>
                                <input type="number" class="form-control" id="departamento" required>
                            </div>
                            <div class="mb-3">
                                <label for="Vias" class="form-label">Vias</label>
                                <input type="number" class="form-control" id="departamento" required>
                            </div>
                            <div class="mb-3">
                                <label for="Altitud" class="form-label">Altitud en m</label>
                                <input type="number" class="form-control" id="departamento" required>
                            </div>
                            <div class="mb-3">
                                <label for="precioArrendamiento" class="form-label">Precio arrendamiento de la propiedad</label>
                                <input type="number" class="form-control" id="departamento" required>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>