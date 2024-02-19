<input type="button" id="openModalBtn" value="Crear usuario / Cambiar contraseña">
<input type="button" id="openDeleteModalBtn" value="Eliminar usuario">
<div id="userModal" class="modal">
    <div class="modal-content" style="width: 80%;">
        <span class="close" id="closeModalBtn">&times;</span>
        <h2>Crear Nuevo Usuario / Cambiar Contraseña</h2>
        <form id="userForm">
            <input type="text" id="username" name="username" placeholder="Nombre del BackOffice" >
            <input type="text" id="user" name="user" placeholder="Usuario" required>
            <input type="text" id="password" name="password" placeholder="Contraseña">
            <input type="text" id="newPassword" name="newPassword" placeholder="Nueva Contraseña (dejar en blanco para crear nuevo usuario)">
            <input type="submit" value=" Crear / Cambiar ">
        </form>
    </div>
</div>
<div id="deleteModal" class="modal">
    <div class="modal-content" style="width: 60%;">
        <span class="close" id="closeDeleteModalBtn">&times;</span>
        <h2>Eliminar Usuario</h2>
        <form id="deleteUserForm">
            <input type="text" id="deleteUser" name="deleteUser" placeholder="Usuario a eliminar" required>
            <input type="submit" value="Eliminar usuario">
        </form>
    </div>
</div>
