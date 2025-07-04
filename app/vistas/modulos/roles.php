<?php

$role = RoleController::ctrGetAllRoles();

?>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Agregar Rol</h5>
          <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class ="d-flex justify-content-between align-items-center mb-3">
              <h5 class="card-title m-0">Roles Registrados</h5>
               <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#largeModal">
                Agregar Rol
              </button>
              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      Nombre
                    </th>
                    <th>Rol</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($role)):?>
                    <?php foreach ($role as $rol): ?>
                  <tr>
                    <td><?= htmlspecialchars($rol["role_name"],ENT_QUOTES, 'UTF-8')?></td>
                    <td><?= htmlspecialchars($rol["role_description"],ENT_QUOTES, 'UTF-8')?></td>
                  </tr>
                    <?php endforeach; ?>  
                      
                    <?php endif; ?>  

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

                <div class="modal fade" id="largeModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="index.php?route=role&action=save">
        <div class="modal-body">
                <div class="row mb-3">
                <label for="inputRole" class="col-sm-2 col-form-label">Nombre Rol</label>
                <div class="col-sm-10">
                    <input type="text" name="roleName" class="form-control" id="inputRole">
                </div>
                </div>
                <div class="row mb-3">
                <label for="inputDescription" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-10">
                    <input type="text" name="roleDescription" class="form-control" id="inputDescription">
                </div>
                </div>
              
            </form>
             <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form><!-- End Form -->
        </div>
      </div>
    
    </div>
  </div>
</section>