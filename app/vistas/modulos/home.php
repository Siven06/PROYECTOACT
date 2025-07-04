<div class="col-12">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Bienvenido, <?php echo $_SESSION["user_name"] ?? "Usuario"; ?>!</h5>
        <h5 class="card-title">id del usuario <?php echo $_SESSION["USER_ID"] ?? "Rol"; ?>!</h5>
        <h5 class="card-title">Nombre del rol <?php echo $_SESSION["ROLE_NAME"] ?? "NULL"; ?>!</h5>
      <p class="card-text">Selecciona una opción del menú lateral para comenzar.</p>
    </div>
  </div>
</div>
