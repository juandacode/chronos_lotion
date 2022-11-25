<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-12">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form id="form" action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="document" class="form-control" placeholder="Ingrese documento" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Ingrese nombre" required autofocus>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Ingrese email" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="address" class="form-control" placeholder="Ingrese direccion" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Ingrese telefono" required autofocus>
          </div>
          <ul class="errors">
               
            </ul>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Guardar Cliente">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
          <th>ID</th>
          <th>Documento</th>
            <th>Nombre</th>
            <th>Email Completo</th>
            <th>Direccion</th>
            <th>Teléfono</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM cliente";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
          <td><?php echo $row['id_cliente']; ?></td>
          <td><?php echo $row['documento_cliente']; ?></td>
            <td><?php echo $row['nombre_cliente']; ?></td>
            <td><?php echo $row['correo_cliente']; ?></td>
            <td><?php echo $row['direccion_cliente']; ?></td>
            <td><?php echo $row['telefono_cliente']; ?></td>
            <td>
              <a href="edit_task.php?id=<?php echo $row['id_cliente']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_task.php?id=<?php echo $row['id_cliente']?>" class="btn btn-primary">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
