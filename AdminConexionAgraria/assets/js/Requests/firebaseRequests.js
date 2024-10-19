/** DEFINE */
const tbodyId = "tbody";
const firebaseGame = new firebaseSolicitud("tbody");
const formRequest = document.getElementById("formRequest");
const btnSubmit = document.getElementById("btnSubmit");
const myModal = new bootstrap.Modal(document.getElementById("modalApp"), {});
const textConfirm = "¿Estas seguro de esto? No podras deshacer esta acción";
const selectStatus = document.getElementById("estado"); // Select para el estado
var currentId = ""; // Variable para almacenar el ID actual del usuario que se está editando

/** Function get user data */
function getDataUser() {
  firebaseGame.getDataUsers().then((result) => {
    // Aquí puedes manejar la visualización de los datos obtenidos
  });
}

/** Function show user */
function showUser(id) {
  cleanForm();
  disableForm();
  currentId = id; // Guardamos el ID actual
  const dataUser = firebaseGame.getDataUser(id);
  dataUser.then((data) => {
    if (data) {
      setDataForm(data);
      setSelectStatus(data.estado); // Llamamos la función para seleccionar el estado
    }
  });
  btnSubmit.disabled = true;
  showModal();
}

/** Function edit user */
async function editUser(id) {
  cleanForm();
  disableForm();
  currentId = id; // Guardamos el ID actual

  const data = await firebaseGame.getDataUser(id);
  if (data) {
    setDataForm(data);
    setSelectStatus(data.estado); // Llamamos la función para seleccionar el estado
  }

  btnSubmit.disabled = false;
  selectStatus.disabled = false;
  showModal();
}

/** Function get data from modal form */
formRequest.addEventListener("submit", (e) => {
  e.preventDefault();

  // Verificamos que haya un ID de usuario actual
  if (currentId.length === 0) {
    alert("No se ha seleccionado un usuario para editar.");
    return;
  }

  // Creamos el objeto JSON con los datos del formulario
  let elements = formRequest.querySelectorAll("input");
  var jsonArray = {};
  for (const elem of elements) {
    jsonArray[elem.id] = elem.value;
  }
  jsonArray["estado"] = selectStatus.value; // Aseguramos que el valor del select de estado se guarde

  // Llamada al método para actualizar el usuario (setUpdateUser)
  setUpdateUser(currentId, jsonArray);
});

/** Function set select status */
function setSelectStatus(estado) {
  // Si el estado traído existe, lo seleccionamos en el select
  if (estado) {
    selectStatus.value = estado;
  }
}

/** Function setUpdateUser - Actualiza el registro en Firebase usando PATCH */
function setUpdateUser(id, data) {
  // Obtenemos el firebaseToken del localStorage
  const firebaseToken = localStorage.getItem("firebaseToken");

  // Validamos que el token exista
  if (!firebaseToken) {
    console.error("No se encontró el firebaseToken en el localStorage");
    alert("Error: No se pudo autenticar. Intente nuevamente.");
    return;
  }

  // Construimos la URL con el ID del usuario y el token
  const url = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Contac/${id}.json?auth=${firebaseToken}`;

  // Hacemos la petición PATCH para actualizar solo los campos especificados
  return fetch(url, {
    method: "PATCH", // Usamos PATCH para actualizar parcialmente el registro
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data), // Solo los datos que queremos actualizar
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error actualizando en Firebase");
      }
      return response.json(); // Convertimos la respuesta a JSON
    })
    .then((result) => {
      console.log("Actualización exitosa en Firebase.", result);
      alert("Estado de la solicitud actualizado correctamente");
      hideModal(); // Ocultamos el modal después de actualizar
      getDataUser(); // Refrescamos los datos de la tabla
      resetForm(); // Limpiamos el formulario y la variable de ID
    })
    .catch((error) => {
      console.error("Error actualizando en Firebase: ", error);
    });
}

/** Function resetForm */
function resetForm() {
  cleanForm();
  currentId = ""; // Limpiamos el ID actual para evitar problemas en la siguiente edición
}

/** Function show modal */
function showModal() {
  myModal.show();
}

/** Function hide modal */
function hideModal() {
  myModal.hide();
}

/** Function clean form */
function cleanForm() {
  formRequest.reset();
  selectStatus.value = ""; // Reseteamos el select del estado también
}

/** Function enable form */
function enableForm() {
  let elements = formRequest.querySelectorAll("input");
  for (let i = 0; i < elements.length; i++) {
    elements[i].disabled = false;
  }
  selectStatus.disabled = false; // Habilitamos el select del estado
}

/** Function disable form */
function disableForm() {
  let elements = formRequest.querySelectorAll("input, select");
  for (let i = 0; i < elements.length; i++) {
    elements[i].disabled = true;
  }
}

/** Function to populate form with data */
function setDataForm(data) {
  let elements = formRequest.querySelectorAll("input");
  for (let i = 0; i < elements.length; i++) {
    if (data[elements[i].id]) {
      document.getElementById(elements[i].id).value = data[elements[i].id];
    }
  }
}

/* Load HTML view */
window.addEventListener("load", (e) => {
  getDataUser();
});
