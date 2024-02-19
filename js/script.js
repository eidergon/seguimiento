document.addEventListener("DOMContentLoaded", function () {
  const openModalBtn = document.getElementById("openModalBtn");
  const closeModalBtn = document.getElementById("closeModalBtn");
  const userModal = document.getElementById("userModal");
  const userForm = document.getElementById("userForm");

  openModalBtn.addEventListener("click", function () {
    // Agrega la clase .modal-fade para mostrar con animación
    userModal.classList.add("modal-fade");
    userModal.style.display = "block";
  });

  closeModalBtn.addEventListener("click", function () {
    // Elimina la clase .modal-fade para ocultar con animación
    userModal.classList.remove("modal-fade");
    userModal.style.display = "none";
  });

  userForm.addEventListener("submit", function (event) {
    event.preventDefault();

    // Recopilar los datos del formulario
    const formData = new FormData(userForm);

    // Realizar una solicitud AJAX para enviar los datos al servidor
    fetch("../php/crear.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        // Verificar el resultado de la operación
        if (data.includes("Usuario creado")) {
          // Si el mensaje incluye "Usuario creado", es una creación de usuario.
          Swal.fire({
            title: "Usuario Creado",
            text: "El usuario se ha creado con éxito.",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Aceptar",
          });
        } else if (data.includes("Contraseña cambiada")) {
          // Si el mensaje incluye "Contraseña cambiada", es un cambio de contraseña.
          Swal.fire({
            title: "Contraseña Cambiada",
            text: "La contraseña se ha cambiado con éxito.",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Aceptar",
          });
        } else {
          // Si no se reconoce el mensaje, mostrar un mensaje de error genérico.
          Swal.fire({
            title: "Error",
            text: "Se produjo un error durante la operación.",
            icon: "error",
            confirmButtonColor: "#d33",
            confirmButtonText: "Aceptar",
          });
        }

        // Cerrar la ventana modal después de crear el usuario o cambiar la contraseña
        userModal.style.display = "none";

        // Restablecer el formulario para limpiar los campos
        userForm.reset();
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });

  //eliminar
  const openDeleteModalBtn = document.getElementById("openDeleteModalBtn");
  const deleteModal = document.getElementById("deleteModal");

  openDeleteModalBtn.addEventListener("click", function () {
    // Abre el modal de eliminación
    deleteModal.classList.add("modal-fade");
    deleteModal.style.display = "block";
  });

  const deleteUserForm = document.getElementById("deleteUserForm");

  deleteUserForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const formData = new FormData(deleteUserForm);

    fetch("../php/eliminar.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.text())
      .then((data) => {
        // Mostrar mensaje de éxito o error en una alerta
        if (data === "Usuario eliminado") {
          Swal.fire({
            title: "Usuario Eliminado",
            text: "El usuario se ha eliminado con éxito.",
            icon: "success",
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Aceptar",
          });
        } else {
          Swal.fire({
            title: "Error",
            text: "No se pudo eliminar el usuario.",
            icon: "error",
            confirmButtonColor: "#d33",
            confirmButtonText: "Aceptar",
          });
        }

        // Cerrar el modal después de eliminar al usuario
        deleteModal.style.display = "none";

        // Restablecer el formulario de eliminación para limpiar los campos
        deleteUserForm.reset();
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  });
});
