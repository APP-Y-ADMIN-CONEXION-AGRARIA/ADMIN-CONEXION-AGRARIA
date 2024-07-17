/** DEFINE */
const tbodyId = "tbody";
const firebaseGame = new firebaseSolicitud('tbody');
const formRequest = document.getElementById('formRequest'); // Corregido el nombre del formulario
const btnSubmit = document.getElementById('btnSubmit');
const myModal = new bootstrap.Modal(document.getElementById("modalApp"), {});
const textConfirm = "¿Estas seguro de esto? No podras deshacer esta acción";
var getIdUser = "";
var validate = true;

/** Function get user data */
function getDataUser() {
    firebaseGame.getDataUsers().then((result) => {
    });
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


/** Function get data from modal form */
formRequest.addEventListener('submit', (e) => { // Corregido el evento de escucha para el formulario correcto
    e.preventDefault();
    let inputId = document.getElementById('id');
    if (inputId.value.length === 0) {
        inputId.value = uuid.v1();
    }
    let elements = formRequest.querySelectorAll('input'); // Corregido el formulario al que se hace referencia
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

/** Function show modal */
function showModal() {
    myModal.show();
};

/** Function hide modal */
function hideModal() {
    myModal.hide();
}

/** Function clean form */
function cleanForm() {
    formRequest.reset(); // Corregido el formulario al que se hace referencia
};

/** Function enable form */
function enableForm() {
    let elements = formRequest.querySelectorAll("input"); // Corregido el formulario al que se hace referencia
    for (let i = 0; i < elements.length; i++) {
        elements[i].disabled = false;
    }
};

/** Function disable form */
function disableForm() {
    let elements = formRequest.querySelectorAll("input"); // Corregido el formulario al que se hace referencia
    for (let i = 0; i < elements.length; i++) {
        elements[i].disabled = true;
    }
};

/** Function to populate form with data */
function setDataForm(data) {
    let elements = formRequest.querySelectorAll("input"); // Corregido el formulario al que se hace referencia
    for (let i = 0; i < elements.length; i++) {
        if (data[elements[i].id]) {
            document.getElementById(elements[i].id).value = data[elements[i].id];
        }
    }
};

/* Load HTML view */
window.addEventListener('load', (e) => {
    getDataUser();
});
