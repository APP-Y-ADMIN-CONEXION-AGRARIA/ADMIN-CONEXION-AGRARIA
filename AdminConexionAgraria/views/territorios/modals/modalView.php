<!-- Modal -->
<div class="modal fade" id="modalView" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Ver Propiedades</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="modalStep1View" class="modal-step">
                    <h5>Información del predio</h5>
                    <form id="formStep1View">
                        <div class="mb-3">
                            <label for="nombreView" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombreView">
                        </div>
                        <div class="mb-3">
                            <label for="direccionView" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccionView">
                        </div>
                        <div class="mb-3">
                            <label for="latitudView" class="form-label">Latitud</label>
                            <input type="text" class="form-control" id="latitudView">
                        </div>
                        <div class="mb-3">
                            <label for="longitudView" class="form-label">Longitud</label>
                            <input type="text" class="form-control" id="longitudView">
                        </div>
                        <div class="mb-3">
                            <label for="descripcionView" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcionView">
                        </div>
                        <div class="mb-3">
                            <label for="fecha_creacion_view" class="form-label">Fecha de creación del predio</label>
                            <input type="text" class="form-control" id="fecha_creacion_view" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="medidaView" class="form-label">Medida</label>
                            <input type="text" class="form-control" id="medidaView">
                        </div>
                        <div class="mb-3">
                            <label for="estadoPredioView" class="form-label">Estado del predio</label>
                            <input type="text" class="form-control" id="estadoPredioView">
                        </div>
                        <div class="mb-3">
                            <label for="estadoArrendamientoView" class="form-label">Estado de arrendamiento del
                                predio</label>
                            <input type="text" class="form-control" id="estadoArrendamientoView">
                        </div>
                        <div class="mb-3">
                            <label for="climaView" class="form-label">Clima</label>
                            <input type="text" class="form-control" id="climaView">
                        </div>
                        <div class="mb-3">
                            <label for="precioArrendamientoView" class="form-label">Precio de arrendamiento</label>
                            <input type="text" class="form-control" id="precioArrendamientoView">
                        </div>
                        <div class="mb-3">
                            <label for="precioM2View" class="form-label">Precio de metro cuadrado</label>
                            <input type="text" class="form-control" id="precioM2View">
                        </div>
                        <div class="mb-3">
                            <label for="riosCercanosView" class="form-label">Rios cercanos (Separados por comas)</label>
                            <input type="text" class="form-control" id="riosCercanosView">
                        </div>
                        <div class="mb-3">
                            <label for="serviciosDisponiblesView" class="form-label">Servicios disponibles (Separados
                                por comas)</label>
                            <input type="text" class="form-control" id="serviciosDisponiblesView">
                        </div>
                        <div class="mb-3">
                            <label for="tipoCultivoView" class="form-label">Tipo de cultivos (Separados por
                                comas)</label>
                            <input type="text" class="form-control" id="tipoCultivoView">
                        </div>
                        <div class="mb-3">
                            <label for="tipoGanaderiaView" class="form-label">Tipo de ganaderia (Separados por
                                comas)</label>
                            <input type="text" class="form-control" id="tipoGanaderiaView">
                        </div>
                        <div class="mb-3">
                            <label for="tipoTierraView" class="form-label">Tipo de tierra</label>
                            <input type="text" class="form-control" id="tipoTierraView">
                        </div>
                        <div class="mb-3">
                            <label for="distanciaCiudadView" class="form-label">Distancia a la ciudad más cercana (En
                                kilometros)</label>
                            <input type="text" class="form-control" id="distanciaCiudadView">
                        </div>
                        <div class="mb-3">
                            <label for="accesoView" class="form-label">Accesos al predio</label>
                            <input type="text" class="form-control" id="accesoView">
                        </div>
                        <div class="mb-3">
                            <label for="topografiaView" class="form-label">Topografía</label>
                            <input type="text" class="form-control" id="topografiaView">
                        </div>
                        <div class="mb-3">
                            <label for="zonificacionView" class="form-label">Zonificación</label>
                            <input type="text" class="form-control" id="zonificacionView">
                        </div>
                        <input type="hidden" id="idView">
                    </form>
                </div>
                <div id="modalStep2View" class="modal-step d-none">
                    <h5>Propietarios del terreno</h5>
                    <form id="formStep2View">
                        <div class="mb-3">
                            <label for="select1View" class="form-label">Propietario(s) del terreno</label>
                            <select class="form-select" id="select1View">
                                <option value="">Usuarios...</option>
                            </select>
                        </div>
                        <div id="selectedOwnersView" class="mt-3"></div>
                    </form>
                </div>
                <div id="modalStep3View" class="modal-step d-none">
                    <h5>Departamento y municipio del terreno</h5>
                    <form id="formStep3View">
                        <div class="mb-3">
                            <label for="select2View" class="form-label">Seleccione el departamento</label>
                            <select class="form-select" id="select2View">
                                <option value="">Departamentos...</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="select3View" class="form-label">Seleccione el municipio</label>
                            <select class="form-select" id="select3View">
                                <option value="">Municipios...</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div id="modalStep4View" class="modal-step d-none">
                    <h5>Cargar imágenes del terreno</h5>
                    <form id="formStep4View">
                        <div class="mb-3">
                            <label for="file1View" class="form-label">Imagen 1</label>
                            <img id="image1View" class="img-thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="file2View" class="form-label">Imagen 2</label>
                            <img id="image2View" class="img-thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="file3View" class="form-label">Imagen 3</label>
                            <img id="image3View" class="img-thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="file4View" class="form-label">Imagen 4</label>
                            <img id="image4View" class="img-thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="file5View" class="form-label">Imagen 5</label>
                            <img id="image5View" class="img-thumbnail">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="nextBtnView">Siguiente</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS y jQuery (Necesario para el modal) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- JS Modal de Visualización -->
<script src="./assets/js/Properties/Modals/modalView.js"></script>