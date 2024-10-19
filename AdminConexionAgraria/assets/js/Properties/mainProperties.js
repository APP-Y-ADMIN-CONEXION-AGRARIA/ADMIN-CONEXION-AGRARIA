class firebaseTerrenos {
  constructor(idTbody) {
    this.objTbody = document.getElementById(idTbody);
    this.URL =
      "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties";
    this.firebaseToken = localStorage.getItem("firebaseToken"); // Obtener el token de localStorage

    if (!this.firebaseToken) {
      alert("No estás autorizado. Por favor, inicia sesión.");
      window.location.href = "?c=login&m=login";
    } else {
      document.body.classList.remove("d-none"); // Mostrar el contenido si hay token
    }
  }

  async getDataUsers() {
    return fetch(this.URL + ".json", {
      headers: {
        Authorization: `Bearer ${this.firebaseToken}`, // Agregar el token a los headers
      },
    })
      .then((res) =>
        res.ok ? res.json() : Promise.reject("Error al obtener datos")
      )
      .then((data) => this.setTableUser(data))
      .catch((error) => console.error(error));
  }

  setTableUser(data) {
    let contRow = 1;
    let rowTable = "";

    for (const user in data) {
      let getId = `'${user}'`;
      const btnActions = `
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <button type="button" class="btn btn-info btn-view" data-id=${getId} data-toggle="modal" data-target="#modalView">
            <i class="bi bi-eye-fill"></i>
          </button>            
          <button type="button" class="btn btn-warning btn-edit" data-id=${getId} data-toggle="modal" data-target="#modalEdit" style="color:white;">
            <i class="bi bi-pencil-square"></i>
          </button>
          <button type="button" class="btn btn-danger btn-delete" onclick=deleteUser(${getId});>
            <i class="bi bi-trash-fill"></i>
          </button>
        </div>`;

      rowTable += `
        <tr>
          <td>${contRow}</td>
          <td>${data[user].nombre}</td>
          <td>${data[user].direccion}</td>
          <td>${data[user].medida}</td>
          <td>${data[user].clima}</td>
          <td class='text-center'>${btnActions}</td>
        </tr>`;

      contRow++;
    }

    this.objTbody.innerHTML = rowTable;
  }

  async setDeleteUser(id) {
    return fetch(`${this.URL}/${id}.json`, {
      method: "DELETE",
      headers: {
        Authorization: `Bearer ${this.firebaseToken}`, // Agregar el token a los headers
      },
    })
      .then((res) =>
        res.ok ? res.json() : Promise.reject("Error al eliminar predio")
      )
      .then(() => this.getDataUsers())
      .catch((error) => console.error(error));
  }
}
