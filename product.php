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
            <input type="text" name="referencia" class="form-control" placeholder="Ingrese referencia" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="cantidad" class="form-control" placeholder="Ingrese cantidad" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="valor" class="form-control" placeholder="Ingrese valor" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Ingrese nombre" required autofocus>
          </div>

          <input type="submit" name="save_product" class="btn btn-success btn-block" value="Guardar Producto">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Referencia</th>
            <th>Cantidad</th>
            <th>Valor</th>
            <th>Nombre</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM producto";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
          <td><?php echo $row['referencia']; ?></td>
          <td><?php echo $row['cantidad']; ?></td>
            <td><?php echo $row['valor']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td>
              <a href="edit_product.php?id=<?php echo $row['id_producto']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_product.php?id=<?php echo $row['id_producto']?>" class="btn btn-primary">
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
