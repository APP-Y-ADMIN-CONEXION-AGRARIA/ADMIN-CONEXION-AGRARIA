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
                            <label for="medidaView" class="form-label">Medida</label>
                            <input type="text" class="form-control" id="medidaView">
                        </div>
                        <div class="mb-3">
                            <label for="climaView" class="form-label">Clima</label>
                            <input type="text" class="form-control" id="climaView">
                        </div>
                        <div class="mb-3">
                            <label for="precioArrendamiento" class="form-label">Precio de arrendamiento</label>
                            <input type="text" class="form-control" id="precioArrendamientoView">
                        </div>
                        <div class="mb-3">
                            <label for="precioM2" class="form-label">Precio de metro cuadrado</label>
                            <input type="text" class="form-control" id="precioM2View">
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

<script>

    $(document).ready(function () {
        // Evento al mostrar el modal
        $('#modalView').on('shown.bs.modal', function (e) {

            $('#modalStep1View').removeClass('d-none');

            // Deshabilitar todos los inputs y selects inicialmente
            $('#modalView input, #modalView select').prop('disabled', true);

        });
    });

    let currentStep = 1;
    const totalSteps = 4;

    // Función para llenar el primer paso con datos del predio específico
    function fillStep1WithPropertyData(propertyData) {
        $('#nombreView').val(propertyData.nombre);
        $('#direccionView').val(propertyData.direccion);
        $('#descripcionView').val(propertyData.descripcion);
        $('#medidaView').val(propertyData.medida);
        $('#climaView').val(propertyData.clima);
        $('#latitudView').val(propertyData.latitud);
        $('#longitudView').val(propertyData.longitud);
        $('#precioArrendamientoView').val(propertyData.precio_arriendo);
        $('#precioM2View').val(propertyData.precio_metro_cuadrado);
    }

    // Función para obtener los datos del predio desde Firebase
    function getPropertyData(propertyId) {
        const firebaseUrl = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties/${propertyId}.json`;

        $.ajax({
            url: firebaseUrl,
            success: function (data) {
                if (data) {
                    fillStep1WithPropertyData(data);
                    fillStep2WithOwners(data.usuarios);

                    const departamentoId = data.departamento[0];
                    const municipio = data.municipio;
                    fillStep3WithDepartamentoMunicipio(departamentoId, municipio);

                    fillStep4WithImages(data.imagenes);
                } else {
                    console.error('No se encontraron datos para el id de propiedad especificado.');
                }
            },
            error: function () {
                console.error('Error al obtener datos desde Firebase.');
            }
        });
    }

    // Función para llenar el segundo paso con los propietarios del predio
    function fillStep2WithOwners(ownerIds) {
        // Limpiar el select y div de propietarios seleccionados
        $('#select1View').empty().append('<option value="">Usuarios...</option>');
        $('#selectedOwnersView').empty();

        // Recorrer los IDs de los propietarios
        ownerIds.forEach(function (ownerId) {
            // Consultar el nombre del propietario desde Firebase
            const firebaseUrl = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Users/${ownerId}.json`;
            const firebaseToken = localStorage.getItem('firebaseToken');

            $.ajax({
                url: firebaseUrl,
                headers: {
                    'Authorization': `Bearer ${firebaseToken}`
                },
                success: function (data) {
                    if (data) {
                        // Crear el div con el nombre del propietario
                        const ownerDiv = `<div class="selected-owner" id="${ownerId}">
                                            ${data.nombre} 
                                         </div>`;
                        // Agregarlo al contenedor de propietarios seleccionados
                        $('#selectedOwnersView').append(ownerDiv);

                        // Extraer el departamento y municipio del predio
                        const municipio = data.municipio;

                        // Agregar el nombre del propietario al select de propietarios
                        $('#select1View').append(`<option value="${ownerId}">${data.nombre}</option>`);
                    } else {
                        console.error(`No se encontró usuario con ID ${ownerId}.`);
                    }
                },
                error: function () {
                    console.error(`Error al obtener datos del usuario con ID ${ownerId} desde Firebase.`);
                }
            });
        });
    }

    // Mostrar el paso específico del modal
    function showStep(step) {
        $('.modal-step').addClass('d-none');
        $(`#modalStep${step}View`).removeClass('d-none');

        if (step === totalSteps) {
            $('#nextBtnView').text('Cerrar');
        } else {
            $('#nextBtnView').text('Siguiente');
        }
    }

    // Evento al hacer clic en un botón de visualización
    $(document).on('click', '.btn-view', function () {
        const propertyId = $(this).data('id'); // Obtener data-id del botón clickeado
        getPropertyData(propertyId);
        $('#modalView').modal('show');
    });

    // Avanzar al siguiente paso
    $('#nextBtnView').click(function () {
        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
        } else {
            $('#modalView').modal('hide');
        }
    });

    // Evento para eliminar propietario al hacer clic en el botón de eliminar
    $(document).on('click', '.remove-owner', function () {
        const ownerId = $(this).closest('.selected-owner').attr('id');
        // Aquí puedes implementar la lógica para eliminar al propietario del predio, si es necesario
        $(this).closest('.selected-owner').remove();
    });

    function fillStep3WithDepartamentoMunicipio(departamentoId, municipioPredio) {
        const firebaseUrl = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Department/${departamentoId}.json`;

        $.ajax({
            url: firebaseUrl,
            success: function (data) {
                if (data) {
                    const nombreDepartamento = data.nombre;
                    const municipios = data.municipios;

                    // Llenar el select del departamento
                    $('#select2View').empty();
                    $('#select2View').append(`<option value="${departamentoId}">${nombreDepartamento}</option>`);

                    // Llenar el select del municipio
                    $('#select3View').empty();
                    municipios.forEach(function (municipio) {
                        $('#select3View').append(`<option value="${municipio}">${municipio}</option>`);
                    });

                    // Seleccionar el municipio correspondiente al predio
                    $('#select3View').val(municipioPredio);
                } else {
                    console.error(`No se encontró departamento con ID ${departamentoId}.`);
                }
            },
            error: function () {
                console.error(`Error al obtener datos del departamento con ID ${departamentoId} desde Firebase.`);
            }
        });
    }

    // Función para llenar el cuarto paso con las imágenes del predio
    function fillStep4WithImages(imageUrls) {
        const storageBaseUrl = 'https://firebasestorage.googleapis.com/v0/b/conexion-agraria.appspot.com/o/';

        for (let i = 0; i < imageUrls.length; i++) {
            const imageUrl = `${storageBaseUrl}predios%2F${encodeURIComponent(imageUrls[i])}?alt=media`;
            $(`#image${i + 1}View`).attr('src', imageUrl);
        }
    }

    $(document).ready(function () {
        $('#modalView').on('hidden.bs.modal', function () {
            $('.modal-backdrop').remove();
        });
    });
</script>