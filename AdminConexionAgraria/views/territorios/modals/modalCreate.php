<!-- Links y SDK para Firebase -->
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-storage.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-database.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script>

<script>
    // Configura tu Firebase
    const firebaseConfig = {
        apiKey: "AIzaSyDSe_2lz8x6UVV5gcLGuLD0aguzc3voMqY",
        authDomain: "conexion-agraria.firebaseapp.com",
        databaseURL: "https://conexion-agraria-default-rtdb.firebaseio.com",
        projectId: "conexion-agraria",
        storageBucket: "conexion-agraria.appspot.com",
        messagingSenderId: "875677956740",
        appId: "1:875677956740:web:a66b0f292ae7d70608a0d1"
    };

    // Inicializa Firebase
    firebase.initializeApp(firebaseConfig);
</script>

<!-- Modal -->
<div class="modal fade" id="modalApp" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Crear Propiedades</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="modalStep1" class="modal-step">
                    <h5>Información del predio</h5>
                    <form id="formStep1">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion">
                        </div>
                        <div class="mb-3">
                            <label for="latitud" class="form-label">Latitud</label>
                            <input type="text" class="form-control" id="latitud"
                                onkeypress="validateCoordinatesInput(event)">
                        </div>
                        <div class="mb-3">
                            <label for="longitud" class="form-label">Longitud</label>
                            <input type="text" class="form-control" id="longitud"
                                onkeypress="validateCoordinatesInput(event)">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion">
                        </div>
                        <div class="mb-3">
                            <label for="fecha_creacion" class="form-label">Fecha de creación del predio</label>
                            <input type="text" class="form-control" id="fecha_creacion" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="estadoPredio" class="form-label">Seleccione el estado del predio</label>
                            <select class="form-select" id="estadoPredio">
                                <option value="">Estados del predio...</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="arrendamientoPredio" class="form-label">Seleccione el estado de arrendamiento
                                del predio</label>
                            <select class="form-select" id="arrendamientoPredio">
                                <option value="">Estados de arrendamiento...</option>
                                <option value="arrendado">Arrendado</option>
                                <option value="no_arrendado">No arrendado</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="medida" class="form-label">Medida (En metros cuadrados)</label>
                            <input type="text" class="form-control" id="medida" oninput="formatNumber(this)">
                        </div>
                        <div class="mb-3">
                            <label for="clima" class="form-label">Clima</label>
                            <input type="text" class="form-control" id="clima">
                        </div>
                        <div class="mb-3">
                            <label for="precioArrendamiento" class="form-label">Precio de arrendamiento (En COP)</label>
                            <input type="text" class="form-control" id="precioArrendamiento"
                                oninput="formatNumber(this)">
                        </div>
                        <div class="mb-3">
                            <label for="precioM2" class="form-label">Precio de metro cuadrado (En COP)</label>
                            <input type="text" class="form-control" id="precioM2" oninput="formatNumber(this)">
                        </div>
                        <div class="mb-3">
                            <label for="riosCercanos" class="form-label">Rios cercanos (Separados por comas)</label>
                            <input type="text" class="form-control" id="riosCercanos">
                        </div>
                        <div class="mb-3">
                            <label for="serviciosDisponibles" class="form-label">Servicios disponibles (Separados
                                por comas)</label>
                            <input type="text" class="form-control" id="serviciosDisponibles">
                        </div>
                        <div class="mb-3">
                            <label for="tipoCultivo" class="form-label">Tipo de cultivos (Separados por
                                comas)</label>
                            <input type="text" class="form-control" id="tipoCultivo">
                        </div>
                        <div class="mb-3">
                            <label for="tipoGanaderia" class="form-label">Tipo de ganaderia (Separados por
                                comas)</label>
                            <input type="text" class="form-control" id="tipoGanaderia">
                        </div>
                        <div class="mb-3">
                            <label for="tipoTierra" class="form-label">Tipo de tierra</label>
                            <input type="text" class="form-control" id="tipoTierra">
                        </div>
                        <div class="mb-3">
                            <label for="distanciaCiudad" class="form-label">Distancia a la ciudad más cercana (En
                                kilometros)</label>
                            <input type="text" class="form-control" id="distanciaCiudad">
                        </div>
                        <div class="mb-3">
                            <label for="acceso" class="form-label">Accesos al predio</label>
                            <input type="text" class="form-control" id="acceso">
                        </div>
                        <div class="mb-3">
                            <label for="topografia" class="form-label">Topografía</label>
                            <input type="text" class="form-control" id="topografia">
                        </div>
                        <div class="mb-3">
                            <label for="zonificacion" class="form-label">Zonificación</label>
                            <input type="text" class="form-control" id="zonificacion">
                        </div>
                        <input type="hidden" id="id">
                    </form>
                </div>
                <div id="modalStep2" class="modal-step d-none">
                    <h5>Asignar propietarios</h5>
                    <form id="formStep2">
                        <div class="mb-3">
                            <label for="select1" class="form-label">Propietario(s) del terreno</label>
                            <select class="form-select" id="select1">
                                <option value="">Usuarios...</option>
                            </select>
                        </div>
                        <div id="selectedOwners" class="mt-3"></div>
                    </form>
                </div>
                <div id="modalStep3" class="modal-step d-none">
                    <h5>Departamento y municipio del terreno</h5>
                    <form id="formStep3">
                        <div class="mb-3">
                            <label for="select2" class="form-label">Seleccione el departamento</label>
                            <select class="form-select" id="select2">
                                <option value="">Departamentos...</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="select3" class="form-label">Seleccione el municipio</label>
                            <select class="form-select" id="select3">
                                <option value="">Municipios...</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div id="modalStep4" class="modal-step d-none">
                    <h5>Cargar imágenes del terreno</h5>
                    <form id="formStep4">
                        <div class="mb-3">
                            <label for="file1" class="form-label">Imagen 1</label>
                            <input type="file" class="form-control" id="file1" onchange="validateImage(this)">
                        </div>
                        <div class="mb-3">
                            <label for="file2" class="form-label">Imagen 2</label>
                            <input type="file" class="form-control" id="file2" onchange="validateImage(this)">
                        </div>
                        <div class="mb-3">
                            <label for="file3" class="form-label">Imagen 3</label>
                            <input type="file" class="form-control" id="file3" onchange="validateImage(this)">
                        </div>
                        <div class="mb-3">
                            <label for="file4" class="form-label">Imagen 4</label>
                            <input type="file" class="form-control" id="file4" onchange="validateImage(this)">
                        </div>
                        <div class="mb-3">
                            <label for="file5" class="form-label">Imagen 5</label>
                            <input type="file" class="form-control" id="file5" onchange="validateImage(this)">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                    id="cancelarBtn">Cancelar</button>
                <button type="button" class="btn btn-primary" id="nextBtn">Siguiente</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS y jQuery (Necesario para el modal) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- JS Modal de Creación -->
<script src="./assets/js/Properties/Modals/modalCreate.js"></script>