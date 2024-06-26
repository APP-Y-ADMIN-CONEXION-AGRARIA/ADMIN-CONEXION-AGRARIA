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
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion">
                        </div>
                        <div class="mb-3">
                            <label for="medida" class="form-label">Medida</label>
                            <input type="text" class="form-control" id="medida">
                        </div>
                        <div class="mb-3">
                            <label for="clima" class="form-label">Clima</label>
                            <input type="text" class="form-control" id="clima">
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
                            <input type="file" class="form-control" id="file1">
                        </div>
                        <div class="mb-3">
                            <label for="file2" class="form-label">Imagen 2</label>
                            <input type="file" class="form-control" id="file2">
                        </div>
                        <div class="mb-3">
                            <label for="file3" class="form-label">Imagen 3</label>
                            <input type="file" class="form-control" id="file3">
                        </div>
                        <div class="mb-3">
                            <label for="file4" class="form-label">Imagen 4</label>
                            <input type="file" class="form-control" id="file4">
                        </div>
                        <div class="mb-3">
                            <label for="file5" class="form-label">Imagen 5</label>
                            <input type="file" class="form-control" id="file5">
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
                const userName = data[userId].nombre;
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
    });

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
                submitStep1Data();
            } else if (currentStep === 1) {
                submitStep2Data();
            } else if (currentStep === 2) {
                submitStep3Data();
            } else if (currentStep === 3) {
                submitStep4Data();
            } else {
                steps[currentStep].classList.add('d-none');
                currentStep = (currentStep + 1) % steps.length;
                steps[currentStep].classList.remove('d-none');
            }
        });

        function submitStep1Data() {
            const data = {
                id: document.getElementById('id').value || null,
                nombre: document.getElementById('nombre').value || null,
                direccion: document.getElementById('direccion').value || null,
                descripcion: document.getElementById('descripcion').value || null,
                medida: document.getElementById('medida').value || null,
                clima: document.getElementById('clima').value || null,
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