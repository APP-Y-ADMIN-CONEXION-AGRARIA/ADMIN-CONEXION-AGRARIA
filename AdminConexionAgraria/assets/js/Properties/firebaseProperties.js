/** DEFINE */
const tbodyId = "tbody";
const firebaseGame = new firebaseTerrenos(tbodyId);
const textConfirm = "Press a button to Delete!\nAccept or Cancel.";
const myModal = new bootstrap.Modal(document.getElementById("modalApp"), {});
const firebaseURLDepartments = "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Department.json";
let validate = true;
let getIdUser = null;

/** Obtener elementos del formulario */
const formProperties = document.querySelectorAll('form[id^="formStep"]');
const btnSubmit = document.getElementById("nextBtn");

/** Function get user data */
function getDataUser() {
    firebaseGame.getDataUsers().then(() => {
    });
}

function setSelectedOwners(userIds) {
    const select1 = document.getElementById('select1');
    const selectedOwners = document.getElementById('selectedOwners');
    
    // Limpiar selección anterior
    select1.innerHTML = '<option value="">Usuarios...</option>';
    selectedOwners.innerHTML = '';

    // Obtener todos los usuarios disponibles para poblar el select
    populateOwnersSelect().then(() => {
        // Seleccionar los usuarios según los IDs proporcionados
        userIds.forEach(userId => {
            const option = select1.querySelector(`option[value="${userId}"]`);
            if (option) {
                addUserToSelectedOwners(option);
            }
        });
    });
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
formProperties.forEach((form) => {
    form.addEventListener("submit", (e) => {
        e.preventDefault();
        let inputId = form.querySelector("#id");
        if (inputId.value.length === 0) {
            inputId.value = uuid.v1();
        }
        let elements = form.querySelectorAll("input, textarea, select");
        let jsonArray = {};
        elements.forEach((elem) => {
            jsonArray[elem.id] = elem.value;
        });
        if (validate) {
            firebaseGame.setCreateUser(jsonArray).then();
        } else {
            firebaseGame.setUpdateUser(getIdUser, jsonArray).then();
        }
    });
});

/** Function clean form */
function cleanForm() {
    formProperties.forEach((form) => {
        form.reset();
    });
}

/** Function enable form */
function enableForm() {
    formProperties.forEach((form) => {
        let elements = form.querySelectorAll("input, textarea, select");
        elements.forEach((elem) => {
            elem.disabled = false;
        });
    });
}

/** Function disable form */
function disableForm() {
    formProperties.forEach((form) => {
        let elements = form.querySelectorAll("input, textarea, select");
        elements.forEach((elem) => {
            elem.disabled = true;
        });
    });
}

getDataUser();