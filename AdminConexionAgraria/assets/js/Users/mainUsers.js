class firebaseUsers {
  constructor(idTbody) {
    this.objTbody = document.getElementById(idTbody);
    this.URL = "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Users";
    this.firebaseToken = localStorage.getItem("firebaseToken"); // Obtener el token de localStorage

    if (!this.firebaseToken) {
      alert("No estás autorizado. Por favor, inicia sesión.");
      window.location.href = "?c=login&m=login";
    } else {
      document.body.classList.remove("d-none"); // Mostrar el contenido si hay token
    }
  }

  async fetchWithToken(url, options = {}) {
    const firebaseToken = localStorage.getItem("firebaseToken");
    if (!firebaseToken) {
      throw new Error("No Firebase token found");
    }

    options.headers = {
      ...options.headers,
      Authorization: `Bearer ${firebaseToken}`,
      "Content-Type": "application/json",
    };

    return fetch(url, options);
  }

  async getDataUsers() {
    const firebaseToken = localStorage.getItem("firebaseToken");

    return this.fetchWithToken(this.URL + ".json")
      .then((res) => {
        if (!res.ok) {
          console.log("Failed to fetch users data");
          throw new Error("Failed to fetch users data");
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

  setTableUser(data) {
    let contRow = 1;
    let rowTable = "";
    let btnActions = "";
    for (const user in data) {
      let getId = "'" + user + "'";
      btnActions =
        '<div class="btn-group " role="group" aria-label="Basic mixed styles example">' +
        '<button type="button" onclick="showUser(' +
        getId +
        ')" class="btn btn-info"><i class="bi bi-eye-fill"></i></button>' +
        '<button type="button" onclick="editUser(' +
        getId +
        ')" class="btn btn-warning" style="color:white;"><i class="bi bi-pencil-square"></i></button>' +
        '<button type="button" onclick="deleteUser(' +
        getId +
        ')" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>' +
        "</div>";
      rowTable +=
        "<tr>" +
        "<td>" +
        contRow +
        "</td>" +
        "<td>" +
        data[user].nombre +
        "</td>" +
        "<td>" +
        data[user].numero_documento +
        "</td>" +
        "<td>" +
        data[user].telefono +
        "</td>" +
        "<td>" +
        data[user].correo +
        "</td>" +
        "<td class='text-center'>" +
        btnActions +
        "</td>" +
        "<tr>";
      contRow++;
    }
    this.objTbody.innerHTML = rowTable;
  }

  async getDataUser(id) {
    return this.fetchWithToken(this.URL + "/" + id + ".json")
      .then((res) => {
        if (!res.ok) {
          console.log("Failed to fetch user data");
          throw new Error("Failed to fetch user data");
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

  async setCreateUser(data) {
    return this.fetchWithToken(this.URL + ".json", {
      method: "POST",
      body: JSON.stringify(data),
    })
      .then((res) => {
        if (!res.ok) {
          console.log("Failed to create user");
          throw new Error("Failed to create user");
        }
        return res.json();
      })
      .then(() => {
        this.getDataUsers();
      })
      .catch((error) => {
        console.error(error);
      });
  }

  async setUpdateUser(id, data) {
    return this.fetchWithToken(this.URL + "/" + id + ".json", {
      method: "PUT",
      body: JSON.stringify(data),
    })
      .then((res) => {
        if (!res.ok) {
          console.log("Failed to update user");
          throw new Error("Failed to update user");
        }
        return res.json();
      })
      .then(() => {
        this.getDataUsers();
      })
      .catch((error) => {
        console.error(error);
      });
  }

  async setDeleteUser(id) {
    return this.fetchWithToken(this.URL + "/" + id + ".json", {
      method: "DELETE",
    })
      .then((res) => {
        if (!res.ok) {
          console.log("Failed to delete user");
          throw new Error("Failed to delete user");
        }
        return res.json();
      })
      .catch((error) => {
        console.error(error);
      });
  }

  async getRoles() {
    return this.fetchWithToken(
      "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Role.json"
    )
      .then((res) => {
        if (!res.ok) {
          console.log("Failed to fetch roles data");
          throw new Error("Failed to fetch roles data");
        }
        return res.json();
      })
      .then((data) => {
        this.populateRoleSelect(data);
      })
      .catch((error) => {
        console.error(error);
      });
  }

  populateRoleSelect(data) {
    const roleSelect = document.getElementById("role_id");
    roleSelect.innerHTML = '<option value="">Seleccione un rol</option>'; // Limpiar select
    for (const role in data) {
      const option = document.createElement("option");
      option.value = role;
      option.text = data[role].nombre_rol;
      roleSelect.appendChild(option);
    }

    // Preseleccionar el rol si se está editando un usuario
    const currentUserRole = document.getElementById("role_id").value;
    if (currentUserRole) {
      const dataUser = firebaseGame.getDataUser(currentUserRole);
      dataUser.then((data) => {
        roleSelect.value = data.role_id || "";
      });
    }
  }
}
