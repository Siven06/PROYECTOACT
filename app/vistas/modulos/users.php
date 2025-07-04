<?php 

  $users = UserController::ctrGetAllUsers();


?>


<section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class ="d-flex justify-content-between align-items-center mb-3">
              <h5 class="card-title m-0">Usuarios Registrados</h5>
               <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#largeModal">
                Agregar Usuario
              </button>
              </div>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>
                      Nombre
                    </th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th data-type="date" data-format="YYYY/DD/MM">Fecha Registro</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($users)):?>
                    <?php foreach ($users as $user): ?>
                  <tr>
                    <td><?= htmlspecialchars($user["user_name"],ENT_QUOTES, 'UTF-8')?></td>
                    <td><?= htmlspecialchars($user["user_email"],ENT_QUOTES, 'UTF-8')?></td>
                    <td style = "withd: 100px; text-align: center;">*****</td>
                    <td><?= htmlspecialchars($user["registered_at"],ENT_QUOTES, 'UTF-8')?></td>
                  </tr>
                    <?php endforeach; ?>  
                      
                    <?php endif; ?>  

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
</section>
<div class="modal fade" id="largeModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form method="POST" action="index.php?route=users&action=save">
        <div class="modal-body">
  <div class="row mb-3">
    <label for="inputText" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-10">
      <input type="text" name="userName" class="form-control" id="inputText">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
    <div class="col-sm-10">
      <input type="email" name="userEmail" class="form-control" id="inputEmail">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
    <div class="col-sm-10">
      <input type="password" name="userPassword" class="form-control" id="inputPassword">
    </div>
  </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form><!-- End Form -->
    </div>
  </div>
</div><!-- End Basic Modal-->