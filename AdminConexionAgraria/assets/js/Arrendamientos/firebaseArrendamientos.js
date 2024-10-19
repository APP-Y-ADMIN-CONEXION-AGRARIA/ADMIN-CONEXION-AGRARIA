/** DEFINE */
const tbodyId = "tbody";
const firebaseGame = new firebaseUsers(tbodyId);
const formArrendamientos = document.getElementById("formArrendamientos");
const btnSubmit = document.getElementById("btnSubmit");
const myModal = new bootstrap.Modal(
  document.getElementById("modalArrendamientos"),
  {}
);
const textConfirm = "¿Estas seguro de esto? No podras deshacer esta acción";
var getIdUser = "";

/** Function get user data */
function getDataUser() {
  firebaseGame.getDataUsers().then(() => {});
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

/** Function create user */
function createArrendamiento() {
  cleanForm();
  enableForm();
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
  formArrendamientos.reset();
}

/** Function enable form */
function enableForm() {
  let elements = formArrendamientos.querySelectorAll("input, select");
  for (let i = 0; i < elements.length; i++) {
    elements[i].disabled = false;
  }
}

/** Function disable form */
function disableForm() {
  let elements = formArrendamientos.querySelectorAll("input, select");
  for (let i = 0; i < elements.length; i++) {
    elements[i].disabled = true;
  }
}

function setDataForm(data) {
  let elements = formArrendamientos.querySelectorAll("input, select");
  for (let i = 0; i < elements.length; i++) {
    if (data[elements[i].id]) {
      document.getElementById(elements[i].id).value = data[elements[i].id];
    }
  }
}

/** Load HTML view */
document.addEventListener("DOMContentLoaded", (event) => {
  getDataUser();
});
