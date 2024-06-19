class LoadDepartments {
  constructor() {
      this.URL = "https://conexion-agraria-default-rtdb.firebaseio.com/Api/";
  }

  async getDepartments() {
      const response = await fetch(this.URL + "Department.json");
      const data = await response.json();
      return data;
  }
}

class firebaseTerrenos {
  constructor(idTbody) {
      this.objTbody = document.getElementById(idTbody);
      this.URL = "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties";
  }

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

  async uploadImages(images) {
      const storageRef = firebase.storage().ref('predios');
      const uploadPromises = images.map((image, index) => {
          const imageRef = storageRef.child(`imagen${index + 1}`);
          return imageRef.put(image);
      });
      return Promise.all(uploadPromises);
  }

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
              "<td>" + data[user].direccion + "</td>" +
              "<td>" + data[user].medida + "</td>" +
              "<td>" + data[user].clima + "</td>" +
              "<td class='text-center'>" + btnActions + "</td>" +
              "<tr>";
          contRow++;
      }
      this.objTbody.innerHTML = rowTable;
  }

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

  async getDataUsuarios() {
    return fetch("https://conexion-agraria-default-rtdb.firebaseio.com/Api/Users.json")
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

// Ejemplo de uso para cargar departamentos
// Crear una instancia de LoadDepartments
const loader = new LoadDepartments();

// Obtener los departamentos y poblar el primer select
loader.getDepartments()
    .then(data => {
        const departamentoSelect = document.getElementById('departamento');
        // Limpiar cualquier opción previa
        departamentoSelect.innerHTML = '<option value="" selected disabled>Selecciona un departamento</option>';
        // Agregar las opciones de los departamentos
        for (const key in data) {
            const option = document.createElement('option');
            option.value = key;
            option.textContent = data[key].nombre;
            departamentoSelect.appendChild(option);
        }
    })
    .catch(error => {
        console.error("Error al cargar departamentos:", error);
    });

// Evento change en el select de departamentos
document.getElementById('departamento').addEventListener('change', (event) => {
    const selectedDepartmentId = event.target.value;
    // Si no se ha seleccionado ningún departamento, no se hace nada
    if (!selectedDepartmentId) {
        return;
    }

    // Obtener los municipios del departamento seleccionado
    loader.getDepartments()
        .then(data => {
            const municipiosSelect = document.getElementById('municipios');
            // Limpiar cualquier opción previa
            municipiosSelect.innerHTML = '<option value="" selected disabled>Selecciona un municipio</option>';
            // Obtener los municipios del departamento seleccionado
            const municipios = data[selectedDepartmentId].municipios;
            // Agregar las opciones de los municipios
            municipios.forEach(municipio => {
                const option = document.createElement('option');
                option.value = municipio;
                option.textContent = municipio;
                municipiosSelect.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error al cargar municipios:", error);
        });
});
