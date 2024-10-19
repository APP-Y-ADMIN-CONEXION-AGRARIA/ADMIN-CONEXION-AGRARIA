<!-- Modal de Edición -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditLabel">Editar Propiedades</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Paso 1: Información del predio -->
                <div id="modalEditStep1" class="modal-step">
                    <h5>Información del predio</h5>
                    <form id="formEditStep1">
                        <div class="mb-3">
                            <label for="nombreEditModal" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreEditModal">
                        </div>
                        <div class="mb-3">
                            <label for="direccionEditModal" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionEditModal">
                        </div>
                        <div class="mb-3">
                            <label for="descripcionEditModal" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcionEditModal">
                        </div>
                        <div class="mb-3">
                            <label for="fecha_creacion_edit" class="form-label">Fecha de creación del predio</label>
                            <input type="text" class="form-control" id="fecha_creacion_edit" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="estadoPredioEdit" class="form-label">Seleccione el estado del predio</label>
                            <select class="form-select" id="estadoPredioEdit">
                                <option value="">Estados del predio...</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="arrendamientoPredioEdit" class="form-label">Seleccione el estado de
                                arrendamiento
                                del predio</label>
                            <select class="form-select" id="arrendamientoPredioEdit">
                                <option value="">Estados de arrendamiento...</option>
                                <option value="arrendado">Arrendado</option>
                                <option value="no_arrendado">No arrendado</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="medidaEditModal" class="form-label">Medida</label>
                            <input type="text" class="form-control" id="medidaEditModal">
                        </div>
                        <div class="mb-3">
                            <label for="climaEditModal" class="form-label">Clima</label>
                            <input type="text" class="form-control" id="climaEditModal">
                        </div>
                        <div class="mb-3">
                            <label for="precioArrendamientoEdit" class="form-label">Precio de arrendamiento</label>
                            <input type="text" class="form-control" id="precioArrendamientoEdit">
                        </div>
                        <div class="mb-3">
                            <label for="precioM2Edit" class="form-label">Precio de metro cuadrado</label>
                            <input type="text" class="form-control" id="precioM2Edit">
                        </div>
                        <div class="mb-3">
                            <label for="riosCercanosEdit" class="form-label">Rios cercanos (Separados por comas)</label>
                            <input type="text" class="form-control" id="riosCercanosEdit">
                        </div>
                        <div class="mb-3">
                            <label for="serviciosDisponiblesEdit" class="form-label">Servicios disponibles (Separados
                                por comas)</label>
                            <input type="text" class="form-control" id="serviciosDisponiblesEdit">
                        </div>
                        <div class="mb-3">
                            <label for="tipoCultivoEdit" class="form-label">Tipo de cultivos (Separados por
                                comas)</label>
                            <input type="text" class="form-control" id="tipoCultivoEdit">
                        </div>
                        <div class="mb-3">
                            <label for="tipoGanaderiaEdit" class="form-label">Tipo de ganaderia (Separados por
                                comas)</label>
                            <input type="text" class="form-control" id="tipoGanaderiaEdit">
                        </div>
                        <div class="mb-3">
                            <label for="tipoTierraEdit" class="form-label">Tipo de tierra</label>
                            <input type="text" class="form-control" id="tipoTierraEdit">
                        </div>
                        <div class="mb-3">
                            <label for="distanciaCiudadEdit" class="form-label">Distancia a la ciudad más cercana (En
                                kilometros)</label>
                            <input type="text" class="form-control" id="distanciaCiudadEdit">
                        </div>
                        <div class="mb-3">
                            <label for="accesoEdit" class="form-label">Accesos al predio</label>
                            <input type="text" class="form-control" id="accesoEdit">
                        </div>
                        <div class="mb-3">
                            <label for="topografiaEdit" class="form-label">Topografía</label>
                            <input type="text" class="form-control" id="topografiaEdit">
                        </div>
                        <div class="mb-3">
                            <label for="zonificacionEdit" class="form-label">Zonificación</label>
                            <input type="text" class="form-control" id="zonificacionEdit">
                        </div>
                        <input type="hidden" id="idEditModal">
                    </form>
                </div>

                <!-- Paso 2: Asignar propietarios -->
                <div id="modalEditStep2" class="modal-step d-none">
                    <h5>Asignar propietarios</h5>
                    <form id="formEditStep2">
                        <div class="mb-3">
                            <label for="select1EditModal" class="form-label">Propietario(s) del terreno</label>
                            <select class="form-select" id="select1EditModal">
                                <option value="">Usuarios...</option>
                                <!-- Opciones de propietarios se cargarán dinámicamente -->
                            </select>
                        </div>
                        <div id="selectedOwnersEditModal" class="mt-3"></div>
                    </form>
                </div>

                <!-- Paso 3: Departamento y municipio del terreno -->
                <div id="modalEditStep3" class="modal-step d-none">
                    <h5>Departamento y municipio del terreno</h5>
                    <form id="formEditStep3">
                        <div class="mb-3">
                            <label for="select2EditModal" class="form-label">Seleccione el departamento</label>
                            <select class="form-select" id="select2EditModal">
                                <option value="">Departamentos...</option>
                                <!-- Opciones de departamentos -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="select3EditModal" class="form-label">Seleccione el municipio</label>
                            <select class="form-select" id="select3EditModal">
                                <option value="">Municipios...</option>
                                <!-- Opciones de municipios -->
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Paso 4: Cargar imágenes del terreno -->
                <div id="modalEditStep4" class="modal-step d-none">
                    <h5>Cargar imágenes del terreno</h5>
                    <form id="formEditStep4">
                        <div class="mb-3">
                            <label for="input1EditModal" class="form-label">Imagen 1</label>
                            <div class="input-group">
                                <input type="input" class="form-control" id="input1EditModal" disabled>
                                <button type="button" class="btn btn-danger eliminarImagen btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input2EditModal" class="form-label">Imagen 2</label>
                            <div class="input-group">
                                <input type="input" class="form-control" id="input2EditModal" disabled>
                                <button type="button" class="btn btn-danger eliminarImagen btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input3EditModal" class="form-label">Imagen 3</label>
                            <div class="input-group">
                                <input type="input" class="form-control" id="input3EditModal" disabled>
                                <button type="button" class="btn btn-danger eliminarImagen btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input4EditModal" class="form-label">Imagen 4</label>
                            <div class="input-group">
                                <input type="input" class="form-control" id="input4EditModal" disabled>
                                <button type="button" class="btn btn-danger eliminarImagen btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input5EditModal" class="form-label">Imagen 5</label>
                            <div class="input-group">
                                <input type="input" class="form-control" id="input5EditModal" disabled>
                                <button type="button" class="btn btn-danger eliminarImagen btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="nextBtnEditModal">Siguiente</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS y jQuery (Necesario para el modal) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- JS Modal de Edición -->
<script src="./assets/js/Properties/Modals/modalEdit.js"></script>