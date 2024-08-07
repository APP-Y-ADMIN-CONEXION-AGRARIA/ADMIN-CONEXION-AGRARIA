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
                <button type="button" class="btn btn-primary" id="nextBtn">Siguiente</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS y jQuery (Necesario para el modal) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Obtener referencia al campo del nombre
        const nombreInput = document.getElementById('nombre');

        // Agregar evento de escucha para validar longitud al cambiar el valor
        nombreInput.addEventListener('input', () => {
            const nombre = nombreInput.value.trim();
            if (nombre.length > 25) {
                alert('Introduce un nombre válido con un límite de 25 caracteres.');
                nombreInput.value = direccion.slice(0, 25); // Recortar a 100 caracteres
            }
        });

        // Obtener referencia al campo de dirección
        const direccionInput = document.getElementById('direccion');

        // Agregar evento de escucha para validar longitud al cambiar el valor
        direccionInput.addEventListener('input', () => {
            const direccion = direccionInput.value.trim();
            if (direccion.length > 100) {
                alert('Introduce una dirección válida con un límite de 100 caracteres.');
                direccionInput.value = direccion.slice(0, 100); // Recortar a 100 caracteres
            }
        });

        // Obtener referencia al campo de clima
        const climaInput = document.getElementById('clima');

        // Agregar evento de escucha para validar longitud al cambiar el valor
        climaInput.addEventListener('input', () => {
            const clima = climaInput.value.trim();
            if (clima.length > 15) {
                alert('Introduce un clima con un límite de 15 caracteres.');
                climaInput.value = clima.slice(0, 15); // Recortar a 15 caracteres
            }
        });

        // Obtener referencia al campo de descripcion
        const descripcionInput = document.getElementById('descripcion');

        // Agregar evento de escucha para validar longitud al cambiar el valor
        descripcionInput.addEventListener('input', () => {
            const descripcion = descripcionInput.value.trim();
            if (descripcion.length > 255) {
                alert('Introduce una descripcion con un límite de 255 caracteres.');
                descripcionInput.value = descripcion.slice(0, 255); // Recortar a 255 caracteres
            }
        });

    });


    document.getElementById('nombre').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '');
    });

    function validateImage(input) {
        const file = input.files[0];
        if (file) {
            const fileSizeMB = file.size / (1024 * 1024); // Tamaño en MB
            if (fileSizeMB >= 1.5) {
                alert('Estás intentando subir un archivo con un peso mayor a 1,5 MB, por favor selecciona otra imagen.');
                input.value = ''; // Reiniciar el input
            }
        }
    }

    function validateCoordinatesInput(event) {
        const char = String.fromCharCode(event.which);
        const regex = /[0-9\.\-]/;

        if (!regex.test(char)) {
            event.preventDefault();
        }
    }

    function formatNumber(input) {
        let value = input.value;
        value = value.replace(/\D/g, ''); // Eliminar todo lo que no sea dígito
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Agregar puntos de separación de miles
        input.value = value;
    }

    /** Función para obtener y mostrar usuarios en el primer select del modal */
    async function populateOwnersSelect() {
        const firebaseToken = localStorage.getItem('firebaseToken');
        const firebaseURL = "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Users.json";

        try {
            const response = await fetch(firebaseURL, {
                headers: {
                    'Authorization': 'Bearer ' + firebaseToken
                }
            });

            if (!response.ok) {
                throw new Error('Error al obtener usuarios desde Firebase');
            }

            const data = await response.json();
            const select1 = document.getElementById('select1');

            // Limpiar opciones existentes
            select1.innerHTML = '<option value="">Choose...</option>';

            // Llenar el select con los usuarios obtenidos
            for (const userId in data) {
                const userName = data[userId].numero_documento;
                const option = document.createElement('option');
                option.value = userId;
                option.textContent = userName;
                select1.appendChild(option);
            }
        } catch (error) {
            console.error(error);
        }
    }

    // Llamar a la función para poblar el select al cargar la página
    document.addEventListener('DOMContentLoaded', () => {
        populateOwnersSelect();

        document.getElementById('precioArrendamiento').addEventListener('input', (event) => {
            formatNumber(event.target);
        });
        document.getElementById('precioM2').addEventListener('input', (event) => {
            formatNumber(event.target);
        });

    });

    /** Función para poblar select de estatus de predio */
    async function populateStatusSelect() {
        try {
            const response = await fetch('https://conexion-agraria-default-rtdb.firebaseio.com/Api/PropertiesStatus.json');
            if (!response.ok) {
                throw new Error('Error al obtener los estados de predio');
            }
            const data = await response.json();
            const selectStatus = document.getElementById('estadoPredio');

            // Limpiar opciones existentes
            selectStatus.innerHTML = '<option value="">Estatus de los predios...</option>';

            // Llenar el select con los estatus obtenidos
            for (const key in data) {
                const option = document.createElement('option');
                option.value = key;
                option.textContent = data[key].estado_predio;
                selectStatus.appendChild(option);
            }

        } catch (error) {
            console.error(error);
        }
    }

    // Llamar a la función para poblar el select cuando el documento esté listo
    document.addEventListener('DOMContentLoaded', populateStatusSelect);

    /** Función para poblar select de departamentos */
    async function populateDepartmentsSelect() {
        try {
            const response = await fetch(firebaseURLDepartments);
            if (!response.ok) {
                throw new Error('Error al obtener departamentos desde Firebase');
            }
            const data = await response.json();
            const select2 = document.getElementById('select2');

            // Limpiar opciones existentes
            select2.innerHTML = '<option value="">Choose...</option>';

            // Llenar el select con los departamentos obtenidos
            for (const key in data) {
                const option = document.createElement('option');
                option.value = key;
                option.textContent = data[key].nombre;
                select2.appendChild(option);
            }

            // Llamar a la función para poblar los municipios del primer departamento
            populateMunicipalitiesSelect();
        } catch (error) {
            console.error(error);
        }
    }

    /** Función para poblar select de municipios según departamento seleccionado */
    async function populateMunicipalitiesSelect() {
        const select2 = document.getElementById('select2');
        const select3 = document.getElementById('select3');
        const departmentId = select2.value; // Obtener el ID del departamento seleccionado

        if (!departmentId) return; // Evitar consultar si no hay departamento seleccionado

        // Obtener los municipios del departamento seleccionado
        const firebaseURLMunicipios = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Department/${departmentId}/municipios.json`;

        try {
            const response = await fetch(firebaseURLMunicipios);
            if (!response.ok) {
                throw new Error('Error al obtener municipios desde Firebase');
            }
            const data = await response.json();

            // Limpiar opciones existentes
            select3.innerHTML = '<option value="">Choose...</option>';

            // Llenar el select con los municipios obtenidos
            for (const municipio of data) {
                const option = document.createElement('option');
                option.value = municipio;
                option.textContent = municipio;
                select3.appendChild(option);
            }
        } catch (error) {
            console.error(error);
        }
    }

    // Llamar a la función para poblar el select de departamentos al cargar la página
    document.addEventListener('DOMContentLoaded', () => {
        populateDepartmentsSelect();

        // Agregar listener para cambiar los municipios cuando se cambie el departamento
        document.getElementById('select2').addEventListener('change', populateMunicipalitiesSelect);
    });

    document.addEventListener('DOMContentLoaded', () => {
        // Código existente ...

        const select1 = document.getElementById('select1');
        const selectedOwners = document.getElementById('selectedOwners');

        select1.addEventListener('change', () => {
            const selectedOption = select1.options[select1.selectedIndex];
            if (selectedOption.value !== "") {
                addUserToSelectedOwners(selectedOption);
                select1.remove(select1.selectedIndex); // Elimina la opción del select
            }
        });

        function addUserToSelectedOwners(option) {
            const userDiv = document.createElement('div');
            userDiv.className = 'selected-owner';
            userDiv.id = option.value;  // Agrega el ID del usuario como ID del div
            userDiv.innerHTML = `
            ${option.textContent} 
            <button type="button" class="btn btn-danger btn-sm ms-2 remove-owner">
                <i class="bi bi-trash"></i>
            </button>
        `;
            selectedOwners.appendChild(userDiv);

            const removeButton = userDiv.querySelector('.remove-owner');
            removeButton.addEventListener('click', () => {
                select1.add(option); // Devuelve la opción al select
                selectedOwners.removeChild(userDiv); // Elimina el usuario de la lista seleccionada
            });
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        const steps = Array.from(document.querySelectorAll('.modal-step'));
        let currentStep = 0;
        let predioId = null; // Variable para almacenar el ID del predio creado

        const nextBtn = document.getElementById('nextBtn');

        nextBtn.addEventListener('click', () => {
            if (currentStep === 0) {
                if (validateStep1()) {
                    submitStep1Data();
                } else {
                    alert('Por favor, verifica que todos los campos estén llenos.');
                }
            } else if (currentStep === 1) {
                if (validateStep2()) {
                    submitStep2Data();
                } else {
                    alert('Selecciona un propietario para este predio.');
                }
            } else if (currentStep === 2) {
                if (validateStep3()) {
                    submitStep3Data();
                } else {
                    alert('Por favor, selecciona un departamento y municipio para este predio.');
                }
            } else if (currentStep === 3) {
                submitStep4Data();
            } else {
                steps[currentStep].classList.add('d-none');
                currentStep = (currentStep + 1) % steps.length;
                steps[currentStep].classList.remove('d-none');
            }
        });

        function validateStep1() {
            const nombre = document.getElementById('nombre').value.trim();
            const direccion = document.getElementById('direccion').value.trim();
            const latitud = document.getElementById('latitud').value.trim();
            const longitud = document.getElementById('longitud').value.trim();
            const descripcion = document.getElementById('descripcion').value.trim();
            const medida = document.getElementById('medida').value.trim();
            const clima = document.getElementById('clima').value.trim();
            const precioArrendamiento = document.getElementById('precioArrendamiento').value.trim();
            const precioM2 = document.getElementById('precioM2').value.trim();

            return nombre && direccion && descripcion && medida && clima && precioArrendamiento && precioM2;
        }

        function validateStep2() {
            const selectedUsers = Array.from(document.querySelectorAll('#selectedOwners .selected-owner'));
            return selectedUsers.length > 0;
        }

        function validateStep3() {
            const departamentoId = document.getElementById('select2').value;
            const municipioName = document.getElementById('select3').value;

            return departamentoId && municipioName;
        }

        function setFechaCreacion() {
            const fechaCreacionInput = document.getElementById('fecha_creacion');
            const ahora = new Date();
            const dia = ahora.getDate().toString().padStart(2, '0');
            const mes = (ahora.getMonth() + 1).toString().padStart(2, '0'); // Los meses en JavaScript son 0-11
            const año = ahora.getFullYear();
            const horas = ahora.getHours().toString().padStart(2, '0');
            const minutos = ahora.getMinutes().toString().padStart(2, '0');
            const segundos = ahora.getSeconds().toString().padStart(2, '0');

            const fechaYHora = `${dia}/${mes}/${año} ${horas}:${minutos}:${segundos}`;
            fechaCreacionInput.value = fechaYHora;
        }

        // Llamamos a la función para establecer la fecha y la hora actual
        setFechaCreacion();

        function submitStep1Data() {
            const data = {
                id: document.getElementById('id').value || null,
                nombre: document.getElementById('nombre').value || null,
                direccion: document.getElementById('direccion').value || null,
                latitud: parseFloat(document.getElementById('latitud').value, 10) || null,
                longitud: parseFloat(document.getElementById('longitud').value, 10) || null,
                descripcion: document.getElementById('descripcion').value || null,
                medida: document.getElementById('medida').value + " m²" || null,
                clima: document.getElementById('clima').value || null,
                precio_arriendo: document.getElementById('precioArrendamiento').value + " COP" || null,
                precio_metro_cuadrado: document.getElementById('precioM2').value + " COP/m²" || null,
                fecha_creacion: document.getElementById('fecha_creacion').value || null,
                estado: document.getElementById('arrendamientoPredio').value,
                estado_predio_id: document.getElementById('estadoPredio').value,
                departamento: null,
                municipio: null,
                imagenes: [],
                usuarios: []
            };

            const firebaseToken = localStorage.getItem('firebaseToken');
            const firebaseURL = "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties.json";

            fetch(firebaseURL, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + firebaseToken
                },
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la solicitud POST a Firebase');
                    }
                    return response.json();
                })
                .then(responseData => {
                    predioId = responseData.name; // Guardar el ID del predio creado
                    steps[currentStep].classList.add('d-none');
                    currentStep = (currentStep + 1) % steps.length;
                    steps[currentStep].classList.remove('d-none');
                })
                .catch(error => {
                    console.error('Error al subir los datos a Firebase:', error);
                });
        }

        function submitStep2Data() {
            const selectedUsers = Array.from(document.querySelectorAll('#selectedOwners .selected-owner'))
                .map(element => parseInt(element.id, 10));

            if (!predioId) {
                console.error('ID del predio no encontrado.');
                return;
            }

            const firebaseToken = localStorage.getItem('firebaseToken');
            const firebaseURL = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties/${predioId}.json`;

            fetch(firebaseURL, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + firebaseToken
                },
                body: JSON.stringify({ usuarios: selectedUsers })
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la solicitud PATCH a Firebase');
                    }
                    return response.json();
                })
                .then(responseData => {
                    steps[currentStep].classList.add('d-none');
                    currentStep = (currentStep + 1) % steps.length;
                    steps[currentStep].classList.remove('d-none');
                })
                .catch(error => {
                    console.error('Error al actualizar los usuarios en Firebase:', error);
                });
        }

        function submitStep3Data() {
            const departamentoId = document.getElementById('select2').value;
            const municipioName = document.getElementById('select3').value;

            if (!predioId) {
                console.error('ID del predio no encontrado.');
                return;
            }

            const data = {
                departamento: [departamentoId],
                municipio: municipioName
            };

            const firebaseToken = localStorage.getItem('firebaseToken');
            const firebaseURL = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties/${predioId}.json`;

            fetch(firebaseURL, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + firebaseToken
                },
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la solicitud PATCH a Firebase');
                    }
                    return response.json();
                })
                .then(responseData => {
                    steps[currentStep].classList.add('d-none');
                    currentStep = (currentStep + 1) % steps.length;
                    steps[currentStep].classList.remove('d-none');
                })
                .catch(error => {
                    console.error('Error al actualizar el departamento y municipio en Firebase:', error);
                });
        }

        function submitStep4Data() {
            const files = [
                document.getElementById('file1').files[0],
                document.getElementById('file2').files[0],
                document.getElementById('file3').files[0],
                document.getElementById('file4').files[0],
                document.getElementById('file5').files[0]
            ];

            const uploadPromises = files.map(file => {
                if (file) {
                    const hashName = generateHash(file.name);
                    const storageRef = firebase.storage().ref().child(`predios/${hashName}`);
                    return storageRef.put(file).then(snapshot => {
                        return hashName; // Devuelve el nombre del hash después de subir la imagen
                    });
                }
                return Promise.resolve(null); // Si no hay archivo, devuelve null
            });

            Promise.all(uploadPromises)
                .then(hashNames => {
                    const filteredHashNames = hashNames.filter(name => name !== null); // Filtrar los null
                    console.log('Imágenes subidas con los siguientes hashes:', filteredHashNames);

                    if (!predioId) {
                        console.error('ID del predio no encontrado.');
                        return;
                    }

                    const firebaseToken = localStorage.getItem('firebaseToken');
                    const firebaseURL = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties/${predioId}.json`;

                    fetch(firebaseURL, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer ' + firebaseToken
                        },
                        body: JSON.stringify({ imagenes: filteredHashNames })
                    })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Error en la solicitud PATCH a Firebase');
                            }
                            return response.json();
                        })
                        .then(responseData => {
                            console.log('Imágenes actualizadas correctamente:', responseData);

                            // Aquí cerramos el modal y recargamos la página
                            $('#modalApp').modal('hide');
                            $('#modalApp').on('hidden.bs.modal', () => {
                                location.reload();
                            });
                        })
                        .catch(error => {
                            console.error('Error al actualizar las imágenes en Firebase:', error);
                        });
                })
                .catch(error => {
                    console.error('Error al subir las imágenes:', error);
                });
        }

        function generateHash(input) {
            return CryptoJS.MD5(input + Date.now().toString()).toString();
        }

        window.createUser = function () {
            $('#modalApp').modal('show');

            steps.forEach((step, index) => {
                if (index === 0) {
                    step.classList.remove('d-none');
                } else {
                    step.classList.add('d-none');
                }
            });
        };
    });

</script>