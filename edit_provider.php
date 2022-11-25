<?php
include("db.php");
$nit = '';
$nombre = '';
$direccion= '';
$telefono = '';
$correo = '';
$producto = '';

if  (isset($_GET['id_proveedor'])) {
  $id = $_GET['id_proveedor'];
  $query = "SELECT * FROM proveedor WHERE id_proveedor = $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nit = $_POST['nit'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $producto = $_POST['producto'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nit = $_POST['nit'];
  $nombre = $_POST['nombre'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $producto = $_POST['producto'];

  $update = "UPDATE proveedor set nit = '$nit', nombre= '$nombre', direccion = '$direccion', telefono  = '$telefono', correo = '$correo', producto = '$producto' WHERE id_proveedor = $id";
  mysqli_query($conn, $update);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: provider.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_provider.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
          <input name="nit" type="text" class="form-control" value="<?php echo $nit; ?>" placeholder="Update NIT">
        </div>
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Nombre">
        </div>
        <div class="form-group">
          <input name="direccion"e type="text" class="form-control" value="<?php echo $direccion; ?>" placeholder="Update direccion">
        </div>
        <div class="form-group">
          <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="Update telefono">
        </div>
        <div class="form-group">
          <input name="correo" type="text" class="form-control" value="<?php echo $correo; ?>" placeholder="Update correo">
        </div>
        <div class="form-group">
          <input name="producto" type="text" class="form-control" value="<?php echo $producto; ?>" placeholder="Update producto">
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