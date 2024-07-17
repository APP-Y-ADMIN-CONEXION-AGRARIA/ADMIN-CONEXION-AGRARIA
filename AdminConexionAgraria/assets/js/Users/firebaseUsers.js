/** DEFINE */
const tbodyId = "tbody";
const firebaseGame = new firebaseUsers(tbodyId);
const formProperties = document.getElementById("formUsers");
const btnSubmit = document.getElementById("btnSubmit");
const myModal = new bootstrap.Modal(document.getElementById("modalApp"), {});
const textConfirm = "¿Estas seguro de esto? No podras deshacer esta acción";
var getIdUser = "";
var validate = true;

/** Function get user data */
function getDataUser() {
  firebaseGame.getDataUsers().then(() => {});
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
    }
  });
  btnSubmit.disabled = false;
  showModal();
}

/** Function delete user */
function deleteUser(id) {
  if (confirm(textConfirm)) {
    firebaseGame.setDeleteUser(id).then(() => {
      getDataUser();
    });
  }
}

/** Function get data from modal form */
formProperties.addEventListener("submit", (e) => {
  e.preventDefault();

  // Validar que todos los campos estén llenos y válidos
  let isValid = true;
  let elements = formProperties.querySelectorAll("input");
  for (const elem of elements) {
    // Ignorar campos ocultos y botones de tipo submit
    if (elem.type === "hidden" || elem.type === "submit") {
      continue;
    }

    if (elem.value.trim() === "") {
      isValid = false;
      alert(`Por favor complete el campo ${elem.getAttribute("placeholder")}`);
      break;
    }
  }

  // Si algún campo está vacío, detener el envío del formulario
  if (!isValid) {
    return;
  }

  // Validar el correo electrónico
  let correoInput = document.getElementById("correo");
  let correo = correoInput.value;
  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(correo)) {
    alert("Por favor ingrese un correo electrónico válido.");
    console.log("Correo inválido: " + correo);
    return;
  }

  // Validar el teléfono
  let telefonoInput = document.getElementById("telefono");
  let telefono = telefonoInput.value;
  if (telefono.length !== 10) {
    alert("Por favor ingrese un número telefónico válido de 10 dígitos.");
    console.log("Teléfono inválido: " + telefono);
    return;
  }

  // Si todos los campos están llenos y las validaciones de correo y teléfono son correctas, enviar el formulario
  let inputId = document.getElementById("id");
  if (inputId.value.length === 0) {
    inputId.value = uuid.v1();
  }

  let formData = {};
  for (const elem of elements) {
    if (elem.type === "hidden") {
      continue; // Omitir campos ocultos
    }
    formData[elem.id] = elem.value;
  }

  if (formData.predios) {
    formData.predios = formData.predios
      .split(",")
      .map((id) => parseInt(id.trim()));
  }

  // Realizar la creación o actualización del usuario
  let submitAction;
  if (validate) {
    submitAction = firebaseGame.setCreateUser(formData);
  } else {
    submitAction = firebaseGame.setUpdateUser(getIdUser, formData);
  }

  submitAction
    .then(() => {
      hideModal();
      cleanForm();
      getDataUser();
    })
    .catch((error) => {
      console.error("Error al enviar el formulario: ", error);
    });
});

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
  formProperties.reset();
}

/** Function enable form */
function enableForm() {
  let elements = formProperties.querySelectorAll("input");
  for (let i = 0; i < elements.length; i++) {
    elements[i].disabled = false;
  }
}

/** Function disable form */
function disableForm() {
  let elements = formProperties.querySelectorAll("input");
  for (let i = 0; i < elements.length; i++) {
    elements[i].disabled = true;
  }
}

/** Function to populate form with data */
function setDataForm(data) {
  let elements = formProperties.querySelectorAll("input");
  for (let i = 0; i < elements.length; i++) {
    if (data[elements[i].id]) {
      document.getElementById(elements[i].id).value = data[elements[i].id];
    }
  }
}

/** Load HTML view */
document.addEventListener("DOMContentLoaded", (event) => {
  getDataUser();

  // Añadir validación en el evento de entrada del correo
  const correoInput = document.getElementById("correo");
  correoInput.addEventListener("input", (e) => {
    let correo = e.target.value;
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(correo)) {
      correoInput.setCustomValidity(
        "Por favor ingrese un correo electrónico válido."
      );
    } else {
      correoInput.setCustomValidity("");
    }
  });

  // Añadir validación en el evento de entrada del teléfono
  const telefonoInput = document.getElementById("telefono");
  telefonoInput.addEventListener("input", (e) => {
    let telefono = e.target.value;

    if (telefono.length !== 10) {
      telefonoInput.setCustomValidity(
        "Por favor ingrese un número telefónico válido de 10 dígitos."
      );
    } else {
      telefonoInput.setCustomValidity("");
    }
  });
});