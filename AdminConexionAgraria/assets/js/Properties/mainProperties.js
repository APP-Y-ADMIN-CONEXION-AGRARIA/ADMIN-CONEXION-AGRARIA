class firebaseTerrenos {
  constructor(idTbody) {
    this.objTbody = document.getElementById(idTbody);
    this.URL =
      "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties";
    this.firebaseToken = localStorage.getItem("firebaseToken"); // Obtener el token de localStorage
  }

  async getDataUsers() {
    const firebaseToken = localStorage.getItem("firebaseToken");
    if (!firebaseToken) {
      alert("No estás autorizado. Por favor, inicia sesión.");
      window.location.href = "?c=login&m=login";
    }

    return fetch(this.URL + ".json")
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
    this.addEventListeners();
  }

  addEventListeners() {
    const viewButtons = document.querySelectorAll(".btn-view");

    viewButtons.forEach((button) => {
      button.addEventListener("click", (event) => {
        const id = event.target.getAttribute("data-id"); // Obtener data-id del botón clickeado
        viewUser(id);
      });
    });

    // También podrías añadir aquí los listeners para editar y eliminar si es necesario.
  }

  async setDeleteUser(id) {
    return fetch(`${this.URL}/${id}.json`, {
      method: "DELETE",
      headers: {
        Authorization: `Bearer ${this.firebaseToken}`, // Agregar el token a los headers
      },
    })
      .then((res) =>
        res.ok ? res.json() : Promise.reject("Error al eliminar usuario")
      )
      .then(() => this.getDataUsers())
      .catch((error) => console.error(error));
  }
}