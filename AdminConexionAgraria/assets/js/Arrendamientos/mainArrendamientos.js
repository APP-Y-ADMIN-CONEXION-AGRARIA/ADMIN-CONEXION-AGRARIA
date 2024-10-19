class firebaseUsers {
  constructor(idTbody) {
    this.objTbody = document.getElementById(idTbody);
    this.usersURL =
      "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Users";
    this.leasesURL =
      "https://conexion-agraria-default-rtdb.firebaseio.com/Api/leases";
    this.propertiesURL =
      "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties.json";
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
      alert("No estas autorizado. Por favor, inicia sesión.");
      window.location.href = "?c=login&m=login";
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
    if (!firebaseToken) {
      alert("No estas autorizado. Por favor, inicia sesión.");
      window.location.href = "?c=login&m=login";
    }

    return this.fetchWithToken(this.leasesURL + ".json")
      .then((res) => {
        if (!res.ok) {
          console.log("Failed to fetch leases data");
          throw new Error("Failed to fetch leases data");
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

  async getClientName(id) {
    return this.fetchWithToken(this.usersURL + "/" + id + ".json")
      .then((res) => {
        if (!res.ok) {
          console.log("Failed to fetch client data");
          throw new Error("Failed to fetch client data");
        }
        return res.json();
      })
      .then((data) => {
        return data.nombre || "Unknown"; // Asumiendo que el nombre del cliente está en la propiedad 'name'
      })
      .catch((error) => {
        console.error(error);
        return "Unknown";
      });
  }

  async getPropertyName(id) {
    return fetch(this.propertiesURL)
      .then((res) => {
        if (!res.ok) {
          console.log("Failed to fetch properties data");
          throw new Error("Failed to fetch properties data");
        }
        return res.json();
      })
      .then((data) => {
        return data[id] ? data[id].nombre : "Unknown"; // Asumiendo que el nombre del predio está en la propiedad 'nombre'
      })
      .catch((error) => {
        console.error(error);
        return "Unknown";
      });
  }

  async setTableUser(data) {
    let contRow = 1;
    let rowTable = "";
    let btnActions = "";
    for (const lease in data) {
      let getId = "'" + lease + "'";
      let clientId = data[lease].id_cliente;
      let propertyId = data[lease].id_predio;

      let clientName = await this.getClientName(clientId); // Obtener el nombre del cliente
      let propertyName = await this.getPropertyName(propertyId); // Obtener el nombre del predio

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
        clientName + // Mostrar el nombre del cliente en lugar del ID
        "</td>" +
        "<td>" +
        propertyName + // Mostrar el nombre del predio en lugar del ID
        "</td>" +
        "<td>" +
        data[lease].valor_arrendamiento +
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
    return this.fetchWithToken(this.leasesURL + "/" + id + ".json")
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
    return this.fetchWithToken(this.leasesURL + ".json", {
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
        alert("Error al crear el usuario: " + error.message);
      });
  }

  async setUpdateUser(id, data) {
    return this.fetchWithToken(this.leasesURL + "/" + id + ".json", {
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
    return this.fetchWithToken(this.leasesURL + "/" + id + ".json", {
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

  // Nueva función para obtener usuarios con role_cliente
  async getClients() {
    return this.fetchWithToken(this.usersURL + ".json")
      .then((res) => {
        if (!res.ok) {
          console.log("Failed to fetch clients data");
          throw new Error("Failed to fetch clients data");
        }
        return res.json();
      })
      .then((data) => {
        let clients = [];
        for (const key in data) {
          if (data[key].role_id === "role_cliente") {
            clients.push({ id: key, nombre: data[key].nombre });
          }
        }
        return clients;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  // Nueva función para obtener predios
  async getProperties() {
    return fetch(this.propertiesURL)
      .then((res) => {
        if (!res.ok) {
          console.log("Failed to fetch properties data");
          throw new Error("Failed to fetch properties data");
        }
        return res.json();
      })
      .then((data) => {
        let properties = [];
        for (const key in data) {
          properties.push({ id: key, nombre: data[key].nombre });
        }
        return properties;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  // Nueva función para cargar predios en el select
  async loadPropertiesSelect() {
    return this.getProperties().then((properties) => {
      const propertySelect = document.getElementById("id_predio");
      properties.forEach((property) => {
        const option = document.createElement("option");
        option.value = property.id;
        option.textContent = property.nombre;
        propertySelect.appendChild(option);
      });
    });
  }
}

// Función para cargar clientes en el select
function loadClientsSelect() {
  const firebaseGame = new firebaseUsers();
  firebaseGame.getClients().then((clients) => {
    const clientSelect = document.getElementById("id_cliente");
    clients.forEach((client) => {
      const option = document.createElement("option");
      option.value = client.id;
      option.textContent = client.nombre;
      clientSelect.appendChild(option);
    });
  });
}

// Cargar clientes en el select cuando se carga el documento
document.addEventListener("DOMContentLoaded", () => {
  const firebaseGame = new firebaseUsers("tbody");
  loadClientsSelect(); // Cargar clientes
  firebaseGame.loadPropertiesSelect(); // Cargar predios
});

/** Load HTML view */
document.addEventListener("DOMContentLoaded", (event) => {
  getDataUser();
  formArrendamientos.addEventListener("submit", handleFormSubmit);
});

/** Function handle form submit */
function handleFormSubmit(event) {
  event.preventDefault();

  const id_cliente = document.getElementById("id_cliente").value;
  const id_predio = document.getElementById("id_predio").value;
  const fecha_final = document.getElementById("fecha_finalizacion").value;
  const fecha_inic = document.getElementById("fecha_inicio").value;
  const valor_contrato = document.getElementById("valor_arrendamiento").value;

  if (id_cliente === "") {
    alert("Por favor, seleccione un cliente para el arrendamiento.");
    return;
  } else if (id_predio === "") {
    alert("Por favor, seleccione un predio para el arrendamiento.");
    return;
  } else if (fecha_inic === "") {
    alert("Por favor, asigne una fecha de inicio para el arrendamiento.");
    return;
  } else if (fecha_final === "") {
    alert(
      "Por favor, seleccione una fecha de finalización para el arrendamiento."
    );
    return;
  } else if (valor_contrato === "") {
    alert("Por favor, asigne el valor del arrendamiento.");
    return;
  }

  const data = {
    id_cliente: id_cliente,
    id_predio: document.getElementById("id_predio").value,
    fecha_inicio: document.getElementById("fecha_inicio").value,
    fecha_finalizacion: document.getElementById("fecha_finalizacion").value,
    valor_arrendamiento:
      document.getElementById("valor_arrendamiento").value + " COP",
  };

  if (getIdUser) {
    firebaseGame.setUpdateUser(getIdUser, data).then(() => {
      hideModal();
      getDataUser();
    });
  } else {
    firebaseGame.setCreateUser(data).then(() => {
      hideModal();
      getDataUser();
    });
  }
}
