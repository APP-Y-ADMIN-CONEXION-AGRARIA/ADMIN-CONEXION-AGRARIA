class firebaseSolicitud {
  /** Método constructor */
  constructor(idTbody) {
    this.objTbody = document.getElementById(idTbody);
    this.URL =
      "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Contac";
    this.firebaseToken = localStorage.getItem("firebaseToken"); // Obtener el token de localStorage

    if (!this.firebaseToken) {
      alert("No estás autorizado. Por favor, inicia sesión.");
      window.location.href = "?c=login&m=login";
    } else {
      document.body.classList.remove("d-none"); // Mostrar el contenido si hay token
    }
  }

  /** Método para obtener datos de los usuarios */
  async getDataUsers() {
    try {
      const firebaseToken = localStorage.getItem("firebaseToken");
      if (!firebaseToken) {
        alert("No estas autorizado. Por favor, inicia sesión.");
        window.location.href = "?c=login&m=login";
      }

      const response = await fetch(this.URL + ".json", {
        headers: {
          Authorization: `Bearer ${firebaseToken}`,
        },
      });
      if (!response.ok) {
        console.log(
          "Failed to fetch users data",
          response.status,
          response.statusText
        );
        return;
      }
      const data = await response.json();
      this.setTableUser(data);
    } catch (error) {
      console.error("Error:", error);
    }
  }

  /** Método para obtener datos de un usuario por su id */
  async getDataUser(id) {
    try {
      const firebaseToken = localStorage.getItem("firebaseToken");
      if (!firebaseToken) {
        alert("No tienes autorización. Por favor, inicia sesión.");
        return;
      }

      const response = await fetch(`${this.URL}/${id}.json`, {
        headers: {
          Authorization: `Bearer ${firebaseToken}`,
        },
      });
      if (!response.ok) {
        console.log(
          "Failed to fetch user data",
          response.status,
          response.statusText
        );
        return;
      }
      const data = await response.json();
      return data;
    } catch (error) {
      console.error("Error:", error);
    }
  }

  /** Método para crear las filas de la tabla usando un formato JSON de usuarios */
  setTableUser(data) {
    let contRow = 1;
    let rowTable = "";
    let btnActions = "";
    for (const user in data) {
      // Filtrar solo usuarios con estado "sin_resolver"
      if (data[user].estado === "sin_resolver") {
        let getId = `'${user}'`;
        btnActions =
          '<div class="btn-group" role="group" aria-label="Basic mixed styles example">' +
          '<button type="button" onclick="showUser(' +
          getId +
          ')" class="btn btn-info"><i class="bi bi-eye"></i></button>' +
          "</div>" +
          '<div class="btn-group" role="group" aria-label="Basic mixed styles example">' +
          '<button type="button" style="margin-left:1rem;color:white!important;" onclick="editUser(' +
          getId +
          ')" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>' +
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
          data[user].correo +
          "</td>" +
          "<td>" +
          data[user].telefono +
          "</td>" +
          "<td class='text-center'>" +
          btnActions +
          "</td>" +
          "</tr>";
        contRow++;
      }
    }
    this.objTbody.innerHTML = rowTable;
  }
}
