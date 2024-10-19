/** Función para poblar select de estatus de predio */
async function populateStatusSelectEdit(selectedValue = "") {
  try {
    const response = await fetch(
      "https://conexion-agraria-default-rtdb.firebaseio.com/Api/PropertiesStatus.json"
    );
    if (!response.ok) {
      throw new Error("Error al obtener los estados de predio");
    }
    const data = await response.json();
    const selectStatus = document.getElementById("estadoPredioEdit");

    // Limpiar opciones existentes
    selectStatus.innerHTML =
      '<option value="">Estatus de los predios...</option>';

    // Llenar el select con los estatus obtenidos
    for (const key in data) {
      const option = document.createElement("option");
      option.value = key;
      option.textContent = data[key].estado_predio;
      selectStatus.appendChild(option);
    }

    // Preseleccionar el valor si se proporciona
    if (selectedValue) {
      selectStatus.value = selectedValue;
    }
  } catch (error) {
    console.error(error);
  }
}

// Llamar a la función para poblar el select cuando el documento esté listo
document.addEventListener("DOMContentLoaded", () => {
  populateStatusSelectEdit();
});

// Validación de input para solo aceptar números y agregar puntos decimales
function formatInputAsNumber(inputElement) {
  inputElement.addEventListener("input", function (e) {
    let value = e.target.value.replace(/\D/g, ""); // Eliminar cualquier carácter que no sea un número
    let formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Agregar puntos decimales
    e.target.value = formattedValue;
  });
}

document.addEventListener("DOMContentLoaded", () => {
  // Validación de campos en los inputs de nombre, dirección, clima y descripción
  const nombreInput = document.getElementById("nombreEditModal");
  const direccionInput = document.getElementById("direccionEditModal");
  const climaInput = document.getElementById("climaEditModal");
  const descripcionInput = document.getElementById("descripcionEditModal");
  const precioArrendamientoInput = document.getElementById(
    "precioArrendamientoEdit"
  );
  const precioM2Input = document.getElementById("precioM2Edit");

  // Agregar validaciones de longitud
  nombreInput.addEventListener("input", () => {
    if (nombreInput.value.length > 25) {
      alert("Introduce un nombre válido con un límite de 25 caracteres.");
      nombreInput.value = nombreInput.value.slice(0, 25);
    }
  });

  direccionInput.addEventListener("input", () => {
    if (direccionInput.value.length > 100) {
      alert("Introduce una dirección válida con un límite de 100 caracteres.");
      direccionInput.value = direccionInput.value.slice(0, 100);
    }
  });

  climaInput.addEventListener("input", () => {
    if (climaInput.value.length > 15) {
      alert("Introduce un clima válido con un límite de 15 caracteres.");
      climaInput.value = climaInput.value.slice(0, 15);
    }
  });

  descripcionInput.addEventListener("input", () => {
    if (descripcionInput.value.length > 255) {
      alert(
        "Introduce una descripción válida con un límite de 255 caracteres."
      );
      descripcionInput.value = descripcionInput.value.slice(0, 255);
    }
  });

  // Validar y formatear los campos de precio arrendamiento y precio por m² como números
  formatInputAsNumber(precioArrendamientoInput);
  formatInputAsNumber(precioM2Input);
});

// Función para mostrar solo el primer paso y ocultar los demás
function resetModalSteps() {
  $("#modalEditStep1").removeClass("d-none");
  $("#modalEditStep2").addClass("d-none");
  $("#modalEditStep3").addClass("d-none");
  $("#modalEditStep4").addClass("d-none");
  $("#nextBtnEditModal").text("Siguiente");
  currentEditStep = 1;
}

// Evento para cuando el modal de edición se muestra
$("#modalEdit").on("shown.bs.modal", function () {
  resetModalSteps();
  const propertyId = $("#idEditModal").val();
  if (propertyId) {
    getEditPropertyData(propertyId).then(() => {
      // Esperar a que se complete la población del select de estado del predio
      populateStatusSelectEdit($("#estadoPredioEdit").val());
    });
  }
});

$(document).ready(function () {
  $("#modalEdit").on("hidden.bs.modal", function () {
    // Recargar la página al cerrar el modal
    location.reload();
  });

  // Función para manejar el clic en el botón de eliminación de imagen
  $(document).on("click", ".eliminarImagen", function () {
    const inputGroup = $(this).closest(".input-group");
    const inputId = inputGroup.find('input[type="input"]').attr("id");

    if (inputId) {
      const number = inputId.replace(/[^\d]/g, "");
      inputGroup.find('input[type="input"]').remove();
      $(this).remove();
      const newInput = $('<input type="file" class="form-control">').attr(
        "id",
        "fileEdit" + number
      );
      inputGroup.append(newInput);
    } else {
      console.error("No se encontró el ID del input.");
    }
  });
});

// Función para manejar la subida de imágenes a Firebase Storage
$(document).ready(function () {
  async function uploadImageToStorage(file, hash) {
    try {
      const storageRef = firebase.storage().ref();
      const prediosRef = storageRef.child("predios");
      const fileName = hash;
      const fileRef = prediosRef.child(fileName);
      const snapshot = await fileRef.put(file);
      const downloadURL = await fileRef.getDownloadURL();
      console.log("URL de descarga:", downloadURL);
    } catch (error) {
      console.error("Error al subir la imagen:", error);
    }
  }

  $(document).on("change", 'input[type="file"]', async function (event) {
    const file = event.target.files[0];
    const hash = await generateUniqueHash(file);
    uploadImageToStorage(file, hash);
  });
});

let currentEditStep = 1;

async function getEditPropertyData(propertyId) {
  const url = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties/${propertyId}.json`;
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error("Error al obtener los datos de la propiedad");
    }
    const data = await response.json();
    if (data) {
      // Datos simples
      $("#nombreEditModal").val(data.nombre);
      $("#direccionEditModal").val(data.direccion);
      $("#descripcionEditModal").val(data.descripcion);
      $("#fecha_creacion_edit").val(data.fecha_creacion);
      $("#medidaEditModal").val(data.medida);
      $("#climaEditModal").val(data.clima);
      $("#precioArrendamientoEdit").val(data.precio_arriendo);
      $("#precioM2Edit").val(data.precio_metro_cuadrado);
      $("#idEditModal").val(propertyId);

      $("#tipoTierraEdit").val(data.tipo_tierra);
      $("#riosCercanosEdit").val(data.rios_cercanos);

      // Servicios disponibles (array)
      $("#serviciosDisponiblesEdit").val(data.servicios_disponibles.join(", "));

      // Tipo de cultivo (array)
      $("#tipoCultivoEdit").val(data.tipo_cultivo.join(", "));

      // Tipo de ganadería (array)
      $("#tipoGanaderiaEdit").val(data.tipo_ganaderia.join(", "));

      // Detalles adicionales (objeto anidado)
      $("#accesoEdit").val(data.detalles_adicionales.acceso);
      $("#distanciaCiudadEdit").val(data.detalles_adicionales.distancia_ciudad);
      $("#topografiaEdit").val(data.detalles_adicionales.topografia);
      $("#zonificacionEdit").val(data.detalles_adicionales.zonificacion);

      // Preseleccionar el valor del estado del predio
      $("#estadoPredioEdit").val(data.estado_predio_id);
      $("#arrendamientoPredioEdit").val(data.estado);

      // Manejar imágenes
      $("#input1EditModal").val(data.imagenes[0]);
      $("#input2EditModal").val(data.imagenes[1]);
      $("#input3EditModal").val(data.imagenes[2]);
      $("#input4EditModal").val(data.imagenes[3]);
      $("#input5EditModal").val(data.imagenes[4]);

      await fetchEditOwnersData(data.usuarios);
      await loadDepartmentsAndMunicipalities(
        data.departamento[0],
        data.municipio
      );
      await loadUsersIntoSelect();
    }
  } catch (error) {
    console.error(error);
  }
}

async function loadUsersIntoSelect() {
  const selectUsers = $("#select1EditModal");
  selectUsers.empty();
  selectUsers.append(`<option value="">Seleccione...</option>`);

  const token = localStorage.getItem("firebaseToken");
  const usersUrl =
    "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Users.json";

  try {
    const response = await fetch(usersUrl, {
      headers: { Authorization: `Bearer ${token}` },
    });

    if (!response.ok) {
      throw new Error("Error al obtener los usuarios");
    }

    const userData = await response.json();
    for (const key in userData) {
      const option = document.createElement("option");
      option.value = key;
      option.textContent = userData[key].numero_documento;
      selectUsers.append(option);
    }
  } catch (error) {
    console.error(error);
  }
}

async function fetchEditOwnersData(userIds) {
  const ownersDiv = $("#selectedOwnersEditModal");
  ownersDiv.empty();

  const token = localStorage.getItem("firebaseToken");

  for (const userId of userIds) {
    const userUrl = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Users/${userId}.json`;
    try {
      const response = await fetch(userUrl, {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      });
      if (!response.ok) {
        throw new Error("Error al obtener los datos del usuario");
      }
      const userData = await response.json();
      if (userData) {
        const ownerDiv = $(`
                    <div class="selected-owner" id="${userId}">
                        ${userData.numero_documento}
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeEditOwner('${userId}')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                `);
        ownersDiv.append(ownerDiv);
      }
    } catch (error) {
      console.error(error);
    }
  }
}

$(document).ready(function () {
  loadUsersIntoSelect();

  $("#select1EditModal").on("change", function () {
    const selectedUserId = $(this).val();
    const selectedUserName = $(this).find("option:selected").text();
    if (selectedUserId) {
      addSelectedOwner(selectedUserId, selectedUserName);
    }
  });
});

function addSelectedOwner(userId, userName) {
  const ownersDiv = $("#selectedOwnersEditModal");
  const ownerDiv = $(`
        <div class="selected-owner" id="${userId}">
            ${userName}
            <button type="button" class="btn btn-danger btn-sm" onclick="removeEditOwner('${userId}')">
                <i class="fas fa-trash-alt"></i>
            </button>
        </div>
    `);
  ownersDiv.append(ownerDiv);

  $(`#select1EditModal option[value="${userId}"]`).remove();
}

function removeEditOwner(ownerId) {
  const ownerDiv = $(`#${ownerId}`);
  const userName = ownerDiv.text().trim();
  ownerDiv.remove();

  const selectUsers = $("#select1EditModal");
  selectUsers.append(`<option value="${ownerId}">${userName}</option>`);
}

async function updateEditPropertyData(propertyId) {
  // Obtener el token desde el localStorage
  const firebaseToken = localStorage.getItem("firebaseToken");

  // Verificar si el token existe
  if (!firebaseToken) {
    alert(
      "No se encontró el token de autenticación. Por favor, inicia sesión."
    );
    return;
  }

  const url = `https://conexion-agraria-default-rtdb.firebaseio.com/Api/Properties/${propertyId}.json`;

  // Recoge los datos modificados del formulario
  const updatedData = {
    nombre: $("#nombreEditModal").val(),
    direccion: $("#direccionEditModal").val(),
    descripcion: $("#descripcionEditModal").val(),
    fecha_creacion: $("#fecha_creacion_edit").val(),
    medida: $("#medidaEditModal").val(),
    clima: $("#climaEditModal").val(),
    precio_arriendo: $("#precioArrendamientoEdit").val(),
    precio_metro_cuadrado: $("#precioM2Edit").val(),
    rios_cercanos: $("#riosCercanosEdit").val(),
    tipo_tierra: $("#tipoTierraEdit").val(),

    // Convierte la cadena de texto en un array
    servicios_disponibles: $("#serviciosDisponiblesEdit")
      .val()
      .split(", ")
      .map((item) => item.trim()),
    tipo_cultivo: $("#tipoCultivoEdit")
      .val()
      .split(", ")
      .map((item) => item.trim()),
    tipo_ganaderia: $("#tipoGanaderiaEdit")
      .val()
      .split(", ")
      .map((item) => item.trim()),

    // Detalles adicionales
    detalles_adicionales: {
      acceso: $("#accesoEdit").val(),
      distancia_ciudad: $("#distanciaCiudadEdit").val(),
      topografia: $("#topografiaEdit").val(),
      zonificacion: $("#zonificacionEdit").val(),
    },

    // Manejar imágenes
    imagenes: [
      $("#input1EditModal").val(),
      $("#input2EditModal").val(),
      $("#input3EditModal").val(),
      $("#input4EditModal").val(),
      $("#input5EditModal").val(),
    ],

    estado_predio_id: $("#estadoPredioEdit").val(),
    estado: $("#arrendamientoPredioEdit").val(),
    departamento: [$("#select2EditModal").val()],
    municipio: $("#select3EditModal").val(),
    usuarios: $("#selectedOwnersEditModal .selected-owner")
      .map(function () {
        return this.id;
      })
      .get(),
  };

  try {
    const response = await fetch(url, {
      method: "PATCH", // Usar PATCH para actualizar solo los campos que cambian
      headers: {
        "Content-Type": "application/json",
        Authorization: `Bearer ${firebaseToken}`, // Token en los headers
      },
      body: JSON.stringify(updatedData),
    });

    if (!response.ok) {
      throw new Error("Error al actualizar la propiedad");
    }

    alert("Datos actualizados correctamente");
  } catch (error) {
    console.error(error);
    alert("Hubo un problema al actualizar los datos");
  }
}

async function loadDepartmentsAndMunicipalities(
  selectedDepartmentId,
  selectedMunicipio
) {
  const url =
    "https://conexion-agraria-default-rtdb.firebaseio.com/Api/Department.json";
  try {
    const response = await fetch(url);
    if (!response.ok) {
      throw new Error(
        "Error al obtener los datos de departamentos y municipios"
      );
    }
    const data = await response.json();
    const selectDepartamento = $("#select2EditModal");
    const selectMunicipio = $("#select3EditModal");

    selectDepartamento.empty();
    selectMunicipio.empty();

    selectDepartamento.append('<option value="">Departamentos...</option>');
    selectMunicipio.append('<option value="">Municipios...</option>');

    for (const key in data) {
      if (data.hasOwnProperty(key)) {
        const departamento = data[key];
        selectDepartamento.append(
          `<option value="${key}">${departamento.nombre}</option>`
        );
      }
    }

    selectDepartamento.on("change", function () {
      const selectedDepartamento = $(this).val();
      selectMunicipio.empty();
      selectMunicipio.append('<option value="">Municipios...</option>');
      for (const key in data) {
        if (data.hasOwnProperty(key)) {
          const departamento = data[key];
          if (key === selectedDepartamento) {
            departamento.municipios.forEach((municipio) => {
              selectMunicipio.append(
                `<option value="${municipio}">${municipio}</option>`
              );
            });
          }
        }
      }
    });

    if (selectedDepartmentId) {
      selectDepartamento.val(selectedDepartmentId).trigger("change");
      const selectedDepartamento = data[selectedDepartmentId];
      if (selectedDepartamento) {
        selectedDepartamento.municipios.forEach((municipio) => {
          if (municipio === selectedMunicipio) {
            selectMunicipio.append(
              `<option value="${municipio}" selected>${municipio}</option>`
            );
          } else {
            selectMunicipio.append(
              `<option value="${municipio}">${municipio}</option>`
            );
          }
        });
      }
    }
  } catch (error) {
    console.error(error);
  }
}

$(document).on("click", ".btn-edit", function () {
  const propertyId = $(this).data("id");
  getEditPropertyData(propertyId);
  $("#modalEdit").modal("show");
});

$("#nextBtnEditModal").on("click", async function () {
  if (currentEditStep < 4) {
    $(`#modalEditStep${currentEditStep}`).addClass("d-none");
    currentEditStep++;
    $(`#modalEditStep${currentEditStep}`).removeClass("d-none");

    if (currentEditStep === 4) {
      $("#nextBtnEditModal").text("Guardar Cambios");
    } else {
      $("#nextBtnEditModal").text("Siguiente");
    }
  } else {
    const propertyId = $("#idEditModal").val();
    const updatedData = {
      nombre: $("#nombreEditModal").val(),
      direccion: $("#direccionEditModal").val(),
      descripcion: $("#descripcionEditModal").val(),
      estado: $("#arrendamientoPredioEdit").val(),
      estado_predio_id: $("#estadoPredioEdit").val(),
      medida: $("#medidaEditModal").val(),
      clima: $("#climaEditModal").val(),
      precio_arriendo: $("#precioArrendamientoEdit").val(),
      rios_cercanos: $("#riosCercanosEdit").val(),
      servicios_disponibles: $("serviciosDisponiblesEdit").val(),
      tipo_cultivo: $("tipoCultivoEdit").val(),
      tipo_ganaderia: $("tipoGanaderiaEdit").val(),
      tipo_tierra: $("tipoTierraEdit").val(),
      acceso: $("accesoEdit").val(),
      topografia: $("topografiaEdit").val(),
      zonificacion: $("zonificacionEdit").val(),
      distancia_ciudad: $("distanciaCiudadEdit").val(),
      imagenes: [
        $("#input1EditModal").val(),
        $("#input2EditModal").val(),
        $("#input3EditModal").val(),
        $("#input4EditModal").val(),
        $("#input5EditModal").val(),
      ],
      departamento: [$("#select2EditModal").val()],
      municipio: $("#select3EditModal").val(),
      usuarios: $("#selectedOwnersEditModal .selected-owner")
        .map(function () {
          return this.id;
        })
        .get(),
    };

    await updateEditPropertyData(propertyId, updatedData);
    $("#modalEdit").modal("hide");
  }
});
