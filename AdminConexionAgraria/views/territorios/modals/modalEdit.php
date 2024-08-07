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
                                <input type="input" class="form-control" id="input1EditModal">
                                <button type="button" class="btn btn-danger eliminarImagen btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input2EditModal" class="form-label">Imagen 2</label>
                            <div class="input-group">
                                <input type="input" class="form-control" id="input2EditModal">
                                <button type="button" class="btn btn-danger eliminarImagen btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input3EditModal" class="form-label">Imagen 3</label>
                            <div class="input-group">
                                <input type="input" class="form-control" id="input3EditModal">
                                <button type="button" class="btn btn-danger eliminarImagen btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input4EditModal" class="form-label">Imagen 4</label>
                            <div class="input-group">
                                <input type="input" class="form-control" id="input4EditModal">
                                <button type="button" class="btn btn-danger eliminarImagen btn-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input5EditModal" class="form-label">Imagen 5</label>
                            <div class="input-group">
                                <input type="input" class="form-control" id="input5EditModal">
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

<script>
    /** Función para poblar select de estatus de predio */
    async function populateStatusSelectEdit(selectedValue = "") {
        try {
            const response = await fetch('https://conexion-agraria-default-rtdb.firebaseio.com/Api/PropertiesStatus.json');
            if (!response.ok) {
                throw new Error('Error al obtener los estados de predio');
            }
            const data = await response.json();
            const selectStatus = document.getElementById('estadoPredioEdit');

            // Limpiar opciones existentes
            selectStatus.innerHTML = '<option value="">Estatus de los predios...</option>';

            // Llenar el select con los estatus obtenidos
            for (const key in data) {
                const option = document.createElement('option');
                option.value = key;
                option.textContent = data[key].estado_predio;
                selectStatus.appendChild(option);
            }

            // Preseleccionar el valor si se proporciona
            if (selectedValue) {
                selectStatus.value = selectedValue;
            }

        } catch (error) {
            console.error(error);
        }
    }

    // Llamar a la función para poblar el select cuando el documento esté listo
    document.addEventListener('DOMContentLoaded', () => {
        populateStatusSelectEdit();
    });


    document.addEventListener('DOMContentLoaded', () => {

        // Obtener referencia al campo del nombre
        const nombreInput = document.getElementById('nombreEditModal');

        // Agregar evento de escucha para validar longitud al cambiar el valor
        nombreInput.addEventListener('input', () => {
            const nombre = nombreInput.value.trim();
            if (nombre.length > 25) {
                alert('Introduce un nombre válido con un límite de 25 caracteres.');
                nombreInput.value = direccion.slice(0, 25); // Recortar a 100 caracteres
            }
        });

        // Obtener referencia al campo de dirección
        const direccionInput = document.getElementById('direccionEditModal');

        // Agregar evento de escucha para validar longitud al cambiar el valor
        direccionInput.addEventListener('input', () => {
            const direccion = direccionInput.value.trim();
            if (direccion.length > 100) {
                alert('Introduce una dirección válida con un límite de 100 caracteres.');
                direccionInput.value = direccion.slice(0, 100); // Recortar a 100 caracteres
            }
        });

        // Obtener referencia al campo de clima
        const climaInput = document.getElementById('climaEditModal');

        // Agregar evento de escucha para validar longitud al cambiar el valor
        climaInput.addEventListener('input', () => {
            const clima = climaInput.value.trim();
            if (clima.length > 15) {
                alert('Introduce un clima con un límite de 15 caracteres.');
                climaInput.value = clima.slice(0, 15); // Recortar a 15 caracteres
            }
        });

        // Obtener referencia al campo de descripcion
        const descripcionInput = document.getElementById('descripcionEditModal');

        // Agregar evento de escucha para validar longitud al cambiar el valor
        descripcionInput.addEventListener('input', () => {
            const descripcion = descripcionInput.value.trim();
            if (descripcion.length > 255) {
                alert('Introduce una descripcion con un límite de 255 caracteres.');
                descripcionInput.value = descripcion.slice(0, 255); // Recortar a 255 caracteres
            }
        });

    });


    // Función para mostrar solo el primer paso y ocultar los demás
    function resetModalSteps() {
        $('#modalEditStep1').removeClass('d-none');
        $('#modalEditStep2').addClass('d-none');
        $('#modalEditStep3').addClass('d-none');
        $('#modalEditStep4').addClass('d-none');
        $('#nextBtnEditModal').text('Siguiente');
        currentEditStep = 1;
    }

    // Evento para cuando el modal de edición se muestra
    $('#modalEdit').on('shown.bs.modal', function () {
        resetModalSteps();
        const propertyId = $('#idEditModal').val();
        if (propertyId) {
            getEditPropertyData(propertyId).then(() => {
                // Esperar a que se complete la población del select de estado del predio
                populateStatusSelectEdit($('#estadoPredioEdit').val());
            });
        }
    });


    $(document).ready(function () {
        $('#modalEdit').on('hidden.bs.modal', function () {
            $('.modal-backdrop').remove();
        });
    });

    $(document).ready(function () {
        $('#modalEdit').on('hidden.bs.modal', function () {
            // Recarga la página
            location.reload();
        });

        // Función para manejar el clic en el botón de eliminación de imagen
        $(document).on('click', '.eliminarImagen', function () {
            // Obtener el contenedor del input y el botón
            var inputGroup = $(this).closest('.input-group');

            // Obtener el ID del input original
            var inputId = inputGroup.find('input[type="input"]').attr('id');
            if (inputId) {
                // Extraer el número del ID del input
                var number = inputId.replace(/[^\d]/g, '');

                // Eliminar el input existente y el botón
                inputGroup.find('input[type="input"]').remove();
                $(this).remove();

                // Crear un nuevo input de tipo file con el ID dinámico
                var newInput = $('<input type="file" class="form-control">').attr('id', 'fileEdit' + number);

                // Insertar el nuevo input después del label
                inputGroup.append(newInput);
            } else {
                console.error('No se encontró el ID del input.');
            }
        });
    });

    // Función para manejar la subida de imágenes a Firebase Storage
    $(document).ready(function () {

        // Función para generar un hash único utilizando CryptoJS
        function generateUniqueHash(file) {
            // Lee el contenido del archivo
            const reader = new FileReader();
            reader.readAsBinaryString(file);

            // Devuelve una promesa que resuelve con el hash calculado
            return new Promise((resolve, reject) => {
                reader.onload = function (event) {
                    const fileContent = event.target.result;
                    const hash = CryptoJS.SHA256(fileContent).toString(CryptoJS.enc.Hex);
                    resolve(hash);
                };
                reader.onerror = function (error) {
                    reject(error);
                };
            });
        }

        // Función para subir una imagen a Firebase Storage en la carpeta 'predios'
        async function uploadImageToStorage(file, hash) {
            try {
                // Referencia al storage de Firebase y a la carpeta 'predios'
                const storageRef = firebase.storage().ref();
                const prediosRef = storageRef.child('predios');

                // Nombre de archivo único
                const fileName = hash;

                // Ruta completa donde se almacenará la imagen dentro de la carpeta 'predios'
                const fileRef = prediosRef.child(fileName);

                // Subir archivo a Firebase Storage
                const snapshot = await fileRef.put(file);
                console.log('Imagen subida con éxito:', snapshot);

                // Obtener la URL de descarga de la imagen
                const downloadURL = await fileRef.getDownloadURL();
                console.log('URL de descarga:', downloadURL);

                // Aquí puedes manejar la URL de descarga, por ejemplo, guardarla en tu base de datos
            } catch (error) {
                console.error('Error al subir la imagen:', error);
            }
        }


        // Manejar el evento de cambio en los inputs tipo file
        $(document).on('change', 'input[type="file"]', async function (event) {
            // Obtener el archivo seleccionado
            const file = event.target.files[0];

            // Generar un hash único para este archivo usando CryptoJS
            const hash = await generateUniqueHash(file);

            // Subir la imagen a Firebase Storage con el hash único
            uploadImageToStorage(file, hash);
        });
    });



    let currentEditStep = 1;

    async function getEditPropertyData(propertyId) {
        const url = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties/${propertyId}.json`;
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error('Error al obtener los datos de la propiedad');
            }
            const data = await response.json();
            if (data) {
                $('#nombreEditModal').val(data.nombre);
                $('#direccionEditModal').val(data.direccion);
                $('#descripcionEditModal').val(data.descripcion);
                $('#fecha_creacion_edit').val(data.fecha_creacion);
                $('#medidaEditModal').val(data.medida);
                $('#climaEditModal').val(data.clima);
                $('#precioArrendamientoEdit').val(data.precio_arriendo);
                $('#precioM2Edit').val(data.precio_metro_cuadrado);
                $('#idEditModal').val(propertyId);
                $('#input1EditModal').val(data.imagenes[0]);
                $('#input2EditModal').val(data.imagenes[1]);
                $('#input3EditModal').val(data.imagenes[2]);
                $('#input4EditModal').val(data.imagenes[3]);
                $('#input5EditModal').val(data.imagenes[4]);

                // Preseleccionar el valor del estado del predio
                $('#estadoPredioEdit').val(data.estado_predio_id);

                // Preseleccionar el valor del estado de arrendamiento
                $('#arrendamientoPredioEdit').val(data.estado);

                await fetchEditOwnersData(data.usuarios);
                await loadDepartmentsAndMunicipalities(data.departamento[0], data.municipio);
                await loadUsersIntoSelect();
            }
        } catch (error) {
            console.error(error);
        }
    }

    async function loadUsersIntoSelect() {
        const selectUsers = $('#select1EditModal');
        selectUsers.empty();
        selectUsers.append(`<option value="">Seleccione...</option>`);

        const token = localStorage.getItem('firebaseToken');
        const usersUrl = 'https://conexion-agraria-default-rtdb.firebaseio.com/Api/Users.json';

        try {
            const response = await fetch(usersUrl, {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            });

            if (!response.ok) {
                throw new Error('Error al obtener los usuarios');
            }

            const userData = await response.json();

            for (const userId in userData) {
                if (userData.hasOwnProperty(userId)) {
                    const userIdentification = userData[userId].numero_documento;
                    selectUsers.append(`<option value="${userId}">${userIdentification}</option>`);
                }
            }
        } catch (error) {
            console.error('Error al cargar los usuarios:', error);
        }
    }

    async function fetchEditOwnersData(userIds) {
        const ownersDiv = $('#selectedOwnersEditModal');
        ownersDiv.empty();

        const token = localStorage.getItem('firebaseToken');

        for (const userId of userIds) {
            const userUrl = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Users/${userId}.json`;
            try {
                const response = await fetch(userUrl, {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });
                if (!response.ok) {
                    throw new Error('Error al obtener los datos del usuario');
                }
                const userData = await response.json();
                if (userData) {
                    const ownerDiv = $(`
                    <div class="selected-owner" id="${userId}">
                        ${userData.numero_documento}
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeEditOwner('${userId}')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                `);
                    ownersDiv.append(ownerDiv);
                }
            } catch (error) {
                console.error(error);
            }
        }
    }

    $(document).ready(function () {
        loadUsersIntoSelect();

        $('#select1EditModal').on('change', function () {
            const selectedUserId = $(this).val();
            const selectedUserName = $(this).find('option:selected').text();
            if (selectedUserId) {
                addSelectedOwner(selectedUserId, selectedUserName);
            }
        });
    });

    function addSelectedOwner(userId, userName) {
        const ownersDiv = $('#selectedOwnersEditModal');
        const ownerDiv = $(`
        <div class="selected-owner" id="${userId}">
            ${userName}
            <button type="button" class="btn btn-danger btn-sm" onclick="removeEditOwner('${userId}')">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
    `);
        ownersDiv.append(ownerDiv);

        $(`#select1EditModal option[value="${userId}"]`).remove();
    }

    function removeEditOwner(ownerId) {
        const ownerDiv = $(`#${ownerId}`);
        const userName = ownerDiv.text().trim();
        ownerDiv.remove();

        const selectUsers = $('#select1EditModal');
        selectUsers.append(`<option value="${ownerId}">${userName}</option>`);
    }

    async function updateEditPropertyData(propertyId, data) {
        const url = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties/${propertyId}.json`;
        const token = localStorage.getItem('firebaseToken');

        try {
            const response = await fetch(url, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify(data)
            });

            if (!response.ok) {
                throw new Error('Error al actualizar los datos de la propiedad');
            }
            const responseData = await response.json();
            console.log('Datos actualizados:', responseData);
        } catch (error) {
            console.error(error);
        }
    }

    async function loadDepartmentsAndMunicipalities(selectedDepartmentId, selectedMunicipio) {
        const url = 'https://conexion-agraria-default-rtdb.firebaseio.com/Api/Department.json';
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error('Error al obtener los datos de departamentos y municipios');
            }
            const data = await response.json();
            const selectDepartamento = $('#select2EditModal');
            const selectMunicipio = $('#select3EditModal');

            selectDepartamento.empty();
            selectMunicipio.empty();

            selectDepartamento.append('<option value="">Departamentos...</option>');
            selectMunicipio.append('<option value="">Municipios...</option>');

            for (const key in data) {
                if (data.hasOwnProperty(key)) {
                    const departamento = data[key];
                    selectDepartamento.append(`<option value="${key}">${departamento.nombre}</option>`);
                }
            }

            selectDepartamento.on('change', function () {
                const selectedDepartamento = $(this).val();
                selectMunicipio.empty();
                selectMunicipio.append('<option value="">Municipios...</option>');
                for (const key in data) {
                    if (data.hasOwnProperty(key)) {
                        const departamento = data[key];
                        if (key === selectedDepartamento) {
                            departamento.municipios.forEach(municipio => {
                                selectMunicipio.append(`<option value="${municipio}">${municipio}</option>`);
                            });
                        }
                    }
                }
            });

            if (selectedDepartmentId) {
                selectDepartamento.val(selectedDepartmentId).trigger('change');
                const selectedDepartamento = data[selectedDepartmentId];
                if (selectedDepartamento) {
                    selectedDepartamento.municipios.forEach(municipio => {
                        if (municipio === selectedMunicipio) {
                            selectMunicipio.append(`<option value="${municipio}" selected>${municipio}</option>`);
                        } else {
                            selectMunicipio.append(`<option value="${municipio}">${municipio}</option>`);
                        }
                    });
                }
            }
        } catch (error) {
            console.error(error);
        }
    }

    $(document).on('click', '.btn-edit', function () {
        const propertyId = $(this).data('id');
        getEditPropertyData(propertyId);
        $('#modalEdit').modal('show');
    });

    $('#nextBtnEditModal').on('click', async function () {
        if (currentEditStep < 4) {
            $(`#modalEditStep${currentEditStep}`).addClass('d-none');
            currentEditStep++;
            $(`#modalEditStep${currentEditStep}`).removeClass('d-none');

            if (currentEditStep === 4) {
                $('#nextBtnEditModal').text('Guardar Cambios');
            } else {
                $('#nextBtnEditModal').text('Siguiente');
            }
        } else {
            const propertyId = $('#idEditModal').val();
            const updatedData = {
                nombre: $('#nombreEditModal').val(),
                direccion: $('#direccionEditModal').val(),
                descripcion: $('#descripcionEditModal').val(),
                estado: $('#arrendamientoPredioEdit').val(),
                estado_predio_id: $('#estadoPredioEdit').val(),
                medida: $('#medidaEditModal').val(),
                clima: $('#climaEditModal').val(),
                precio_arriendo: $('#precioArrendamientoEdit').val(),
                precio_metro_cuadrado: $('#precioM2Edit').val(),
                imagenes: [
                    $('#input1EditModal').val(),
                    $('#input2EditModal').val(),
                    $('#input3EditModal').val(),
                    $('#input4EditModal').val(),
                    $('#input5EditModal').val()
                ],
                departamento: [$('#select2EditModal').val()],
                municipio: $('#select3EditModal').val(),
                usuarios: $('#selectedOwnersEditModal .selected-owner').map(function () {
                    return this.id;
                }).get()
            };

            await updateEditPropertyData(propertyId, updatedData);
            $('#modalEdit').modal('hide');
        }
    });
</script>