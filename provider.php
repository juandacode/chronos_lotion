<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
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
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="document" class="form-control" placeholder="Ingrese documento" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Ingrese nombre" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="address" class="form-control" placeholder="Ingrese direccion" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="phone" class="form-control" placeholder="Ingrese Telefono" required autofocus>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Ingrese Email" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="product" class="form-control" placeholder="Ingrese Producto" required autofocus>
          </div>
          <input type="submit" name="save_provider" class="btn btn-success btn-block" value="Guardar Proveedor">
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
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Producto</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM proveedor";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
          <td><?php echo $row['id_proveedor']; ?></td>
          <td><?php echo $row['nit']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['direccion']; ?></td>
            <td><?php echo $row['telefono']; ?></td>
            <td><?php echo $row['correo']; ?></td>
            <td><?php echo $row['producto']; ?></td>
            <td>
              <a href="edit_provider.php?id=<?php echo $row['id_proveedor']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_provider.php?id=<?php echo $row['id_proveedor']?>" class="btn btn-primary">
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
