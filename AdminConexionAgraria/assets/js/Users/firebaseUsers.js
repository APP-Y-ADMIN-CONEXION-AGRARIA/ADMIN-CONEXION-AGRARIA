/** DEFINE */
const tbodyId = "tbody";
const firebaseGame = new firebaseUsers(tbodyId);
const formProperties = document.getElementById('formUsers');
const btnSubmit = document.getElementById('btnSubmit');
const myModal = new bootstrap.Modal(document.getElementById("modalApp"), {});
const textConfirm = "Press a button to Delete!\nAccept or Cancel.";
var getIdUser = "";
var validate = true;

/** Function get user data */
function getDataUser() {
    firebaseGame.getDataUsers().then(() => {
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
            hidePreload();
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
            hidePreload();
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
    hidePreload();
}

/** Function get data from modal form */
formProperties.addEventListener('submit', (e) => {
    e.preventDefault();
    let inputId = document.getElementById('id');
    if (inputId.value.length === 0) {
        inputId.value = uuid.v1();
    }
    let elements = formProperties.querySelectorAll('input');
    var formData = {};
    for (const elem of elements) {
        formData[elem.id] = elem.value;
    }
    if (formData.predios) {
        formData.predios = formData.predios.split(',').map(id => parseInt(id.trim()));
    }
    if (validate) {
        firebaseGame.setCreateUser(formData).then(hideModal());
    } else {
        firebaseGame.setUpdateUser(getIdUser, formData).then(hideModal());
    }
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
document.addEventListener('DOMContentLoaded', (event) => {
    getDataUser();
});