<?php
include("db.php");
$document = '';
$name = '';
$email = '';
$address = '';
$phone = '';

if  (isset($_GET['id_cliente'])) {
  $id = $_GET['id_cliente'];
  $query = "SELECT * FROM cliente WHERE id_cliente = $id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $document = $_POST['document'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $document = $_POST['document'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  $update = "UPDATE cliente set documento_cliente = '$document', nombre_cliente = '$name', correo_cliente  = '$email', direccion_cliente  = '$address', telefono_cliente  = '$phone'  WHERE id_cliente = $id";
  mysqli_query($conn, $update);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_task.php?id=<?php echo $_GET['id']; ?>" method="POST">
      <div class="form-group">
          <input name="document" type="text" class="form-control" value="<?php echo $document; ?>" placeholder="Update Documento">
        </div>
        <div class="form-group">
          <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Update Nombre">
        </div>
        <div class="form-group">
          <input name="email"e type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Update Email">
        </div>
        <div class="form-group">
          <input name="address" type="text" class="form-control" value="<?php echo $address; ?>" placeholder="Update Direccion">
        </div>
        <div class="form-group">
          <input name="phone" type="text" class="form-control" value="<?php echo $phone; ?>" placeholder="Update Telefono">
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

