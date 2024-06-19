/** DEFINE */
const tbodyId = "tbody";
const firebaseGame = new firebaseTerrenos("tbody");
const textConfirm = "Press a button to Delete!\nAccept or Cancel.";
const formProperties = {
  info: document.getElementById("formProperties"),
  ubicacion: document.getElementById("formPropertiesUbicacion"),
  images: document.getElementById("formPropertiesImages"),
  propietarios: document.getElementById("formPropietarios"), // Agregado el formulario de propietarios
};
const btnSubmit = document.getElementById("btnSubmit");
const myModal = new bootstrap.Modal(document.getElementById("modalApp"), {});

/** Function get user data */
function getDataUser() {
  firebaseGame.getDataUsers().then((result) => {
    hidePreload();
  });
}

/** Function hidden modal */
function createUser() {
  validate = true;
  cleanForm();
  enableForm();
  btnSubmit.disabled = false;
  showModal();
}

/** Function show user */
function showUser(id) {
  cleanForm();
  disableForm();
  const dataUser = firebaseGame.getDataUser(id);
  dataUser.then((data) => {
    if (data) {
      setDataForm(data);
      hidePreload(); // Aquí puedes llamar a hidePreload si es necesario
    }
  });
  btnSubmit.disabled = true;
  showModal();
}

/** Function edit user */
function editUser(id) {
  validate = false;
  cleanForm();
  enableForm();
  getIdUser = id;
  const dataUser = firebaseGame.getDataUser(id);
  dataUser.then((data) => {
    if (data) {
      setDataForm(data);
      hidePreload(); // Aquí puedes llamar a hidePreload si es necesario
    }
  });
  btnSubmit.disabled = false;
  showModal();
}

/** Function delete user */
function deleteUser(id) {
  if (confirm(textConfirm) == true) {
    firebaseGame.setDeleteUser(id).then((data) => {
      getDataUser();
    });
  }
  hidePreload();
}

/** Function get data from modal form */
for (const key in formProperties) {
  if (Object.hasOwnProperty.call(formProperties, key)) {
    formProperties[key].addEventListener("submit", (e) => {
      e.preventDefault();
      let inputId = formProperties[key].querySelector("#id");
      if (inputId.value.length === 0) {
        inputId.value = uuid.v1();
      }
      let elements = formProperties[key].querySelectorAll(
        "input, textarea, select"
      ); // Agregado select
      var jsonArray = {};
      for (const elem of elements) {
        jsonArray[elem.id] = elem.value;
      }
      if (validate) {
        firebaseGame.setCreateUser(jsonArray).then(hideModal());
      } else {
        firebaseGame.setUpdateUser(getIdUser, jsonArray).then(hideModal());
      }
    });
  }
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
  for (const key in formProperties) {
    if (Object.hasOwnProperty.call(formProperties, key)) {
      formProperties[key].reset();
    }
  }
}

/** Function enable form */
function enableForm() {
  for (const key in formProperties) {
    if (Object.hasOwnProperty.call(formProperties, key)) {
      let elements = formProperties[key].querySelectorAll(
        "input, textarea, select"
      ); // Agregado select
      for (let i = 0; i < elements.length; i++) {
        elements[i].disabled = false;
      }
    }
  }
}

/** Function disable form */
function disableForm() {
  for (const key in formProperties) {
    if (Object.hasOwnProperty.call(formProperties, key)) {
      let elements = formProperties[key].querySelectorAll(
        "input, textarea, select"
      ); // Agregado select
      for (let i = 0; i < elements.length; i++) {
        elements[i].disabled = true;
      }
    }
  }
}

/** Function to populate form with data */
function setDataForm(data) {
  for (const key in formProperties) {
    if (Object.hasOwnProperty.call(formProperties, key)) {
      let elements = formProperties[key].querySelectorAll(
        "input, textarea, select"
      ); // Agregado select
      for (let i = 0; i < elements.length; i++) {
        if (data[elements[i].id]) {
          elements[i].value = data[elements[i].id];
        }
      }
    }
  }
}

// Función para agregar usuarios seleccionados
function agregarUsuarioSeleccionado() {
    const propietariosSelect = document.getElementById("propietariosSelect");
    const tbody = document.getElementById("tbodyModal");
  
    // Obtener el usuario seleccionado
    const selectedUser =
      propietariosSelect.options[propietariosSelect.selectedIndex];
  
    if (selectedUser && selectedUser.value) {
      // Obtener el nombre del usuario seleccionado
      const selectedUserName = selectedUser.textContent;
  
      // Crear fila para el usuario seleccionado
      const newRow = document.createElement("tr");
      newRow.innerHTML = `
        <td>${selectedUserName}</td>
        <td><button class="btn btn-danger ms-2 btn-eliminar-usuario" onclick="eliminarUsuarioSeleccionado(this)"><i class="bi bi-trash-fill"></i></button></td>
      `;
  
      // Agregar la fila al tbody
      tbody.appendChild(newRow);
  
      // Eliminar el usuario seleccionado del select original
      propietariosSelect.remove(selectedUser.index);
    }
  }
  
  function eliminarUsuarioSeleccionado(button) {
    const propietariosSelect = document.getElementById("propietariosSelect");
    const row = button.closest("tr");
  
    // Crear opción para el usuario eliminado
    const option = document.createElement("option");
    option.value = row.querySelector("td:first-child").textContent.trim();
    option.textContent = option.value;
  
    // Agregar la opción al select original
    propietariosSelect.appendChild(option);
  
    // Eliminar la fila del tbody
    row.remove();
  }
  

/* Load HTML view */
window.addEventListener("load", (e) => {
  getDataUser();
});

// Después de la carga del HTML, obtén los datos de los usuarios y pobla el select de propietarios
window.addEventListener("load", (e) => {
  firebaseGame
    .getDataUsuarios()
    .then((data) => {
      const propietariosSelect = document.getElementById("propietariosSelect");
      // Limpiar cualquier opción previa
      propietariosSelect.innerHTML =
        '<option value="" selected disabled>Selecciona un propietario</option>';
      // Agregar las opciones de los propietarios
      for (const key in data) {
        const option = document.createElement("option");
        option.value = key;
        option.textContent = data[key].nombre;
        propietariosSelect.appendChild(option);
      }
    })
    .catch((error) => {
      console.error("Error al cargar propietarios:", error);
    });
});
