<?php
include("db.php");
$referencia = '';
$cantidad = '';
$valor = '';
$nombre = '';

if  (isset($_GET['id_proveedor'])) {
  $id = $_GET['id_proveedor'];
  $query = "SELECT * FROM producto WHERE id_producto = $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $referencia = $_POST['referencia'];
    $cantidad = $_POST['cantidad'];
    $valor = $_POST['valor'];
    $nombre = $_POST['nombre'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $referencia = $_POST['referencia'];
  $cantidad = $_POST['cantidad'];
  $valor = $_POST['valor'];
  $nombre = $_POST['nombre'];

  $update = "UPDATE producto set referencia = '$referencia', cantidad = '$cantidad', valor  = '$valor', nombre  = '$nombre' WHERE id_producto = $id";
  mysqli_query($conn, $update);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: product.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_product.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
          <input name="referencia" type="text" class="form-control" value="<?php echo $referencia; ?>" placeholder="Update Referencia">
        </div>
        <div class="form-group">
          <input name="cantidad" type="text" class="form-control" value="<?php echo $cantidad; ?>" placeholder="Update Cantidad">
        </div>
        <div class="form-group">
          <input name="valor"e type="text" class="form-control" value="<?php echo $valor; ?>" placeholder="Update Valor">
        </div>
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Nombre">
        </div>
        <button class="btn-success" name="update">
          Update
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
