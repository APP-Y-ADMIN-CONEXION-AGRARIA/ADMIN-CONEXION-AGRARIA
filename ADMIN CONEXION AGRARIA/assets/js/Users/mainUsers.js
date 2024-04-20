class firebaseUsers {

    /** Método constructor */
    constructor(idTbody) {
        this.objTbody = document.getElementById(idTbody);
        this.URL = "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Users";
    }

    /** Método para obtener datos de los usuarios */
    async getDataUsers() {
        return fetch(this.URL + ".json")
            .then((res) => {
                if (!res.ok) {
                    console.log('Resultado: Problema');
                    return;
                }
                return res.json();
            })
            .then((data) => {
                this.setTableUser(data);
            })
            .catch((error) => {
                console.error(error);
            });
    }

    /** Método para obtener datos de un usuario por su id */
    async getDataUser(id) {
        return fetch(this.URL + "/" + id + ".json")
            .then((res) => {
                if (!res.ok) {
                    console.log('Resultado: Problema');
                    return;
                }
                return res.json();
            })
            .then((data) => {
                return data;
            })
            .catch((error) => {
                console.error(error);
            });
    }

    /** Método para crear las filas de la tabla usando un formato JSON de usuarios */
    setTableUser(data) {
        let contRow = 1;
        let rowTable = "";
        let btnActions = "";
        for (const user in data) {
            let getId = "'" + user + "'";
            btnActions = '<div class="btn-group " role="group" aria-label="Basic mixed styles example">' +
            '<button type="button" onclick="showUser(' + getId + ')" class="btn btn-info"><i class="bi bi-eye-fill"></i></button>' +
            '<button type="button" onclick="editUser(' + getId + ')" class="btn btn-warning" style="color:white;"><i class="bi bi-pencil-square"></i></button>' +
            '<button type="button" onclick="deleteUser(' + getId + ')" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>' +
                '</div>';
            rowTable += "<tr>" +
                "<td>" + contRow + "</td>" +
                "<td>" + data[user].nombre + "</td>" +
                "<td>" + data[user].numero_documento + "</td>" +
                "<td>" + data[user].telefono + "</td>" +
                "<td>" + data[user].correo + "</td>" +
                "<td class='text-center'>" + btnActions + "</td>" +
                "<tr>";
            contRow++;
        }
        this.objTbody.innerHTML = rowTable;
    }

    /** Método para crear un nuevo elemento de datos en formato JSON de usuario */
    async setCreateUser(data) {
        return fetch(this.URL + ".json", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then((res) => {
                if (!res.ok) {
                    console.log('Resultado: Problema');
                    return;
                }
                return res.json();
            })
            .then((data) => {
                this.getDataUsers();
            })
            .catch((error) => {
                console.error(error);
            });
    }

    /** Método para actualizar el elemento enviando un conjunto de datos en formato JSON del usuario */
    async setUpdateUser(id, data) {
        return fetch(this.URL + "/" + id + ".json", {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        })
            .then((res) => {
                if (!res.ok) {
                    console.log('Resultado: Problema');
                    return;
                }
                return res.json();
            })
            .then((data) => {
                this.getDataUsers();
            })
            .catch((error) => {
                console.error(error);
            });
    }

    /** Método para eliminar el elemento */
    async setDeleteUser(id) {
        return fetch(this.URL + "/" + id + ".json", {
            method: 'DELETE'
        })
            .then((res) => {
                if (!res.ok) {
                    console.log('Resultado: Problema');
                    return;
                }
                return res.json();
            })
            .then((data) => {
                return data;
            })
            .catch((error) => {
                console.error(error);
            });
    }
}
