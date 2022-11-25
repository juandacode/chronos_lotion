<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $document = $_POST['document'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $query = "INSERT INTO cliente(documento_cliente, nombre_cliente, correo_cliente, direccion_cliente, telefono_cliente) VALUES ('$document', '$name', '$email', '$address', '$phone')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}


if (isset($_POST['save_product'])) {
  $referencia = $_POST['referencia'];
  $cantidad = $_POST['cantidad'];
  $valor = $_POST['valor'];
  $nombre = $_POST['nombre'];
  $query = "INSERT INTO producto(referencia, cantidad, valor, nombre) VALUES ('$referencia', '$cantidad', '$valor', '$nombre')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: product.php');

}


if (isset($_POST['save_provider'])) {
  $document = $_POST['document'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $product = $_POST['product'];
  
  $query = "INSERT INTO proveedor(nit, nombre, direccion, telefono, correo, producto) VALUES ('$document', '$name', '$address', '$phone', '$email', '$product')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: provider.php');

}



?>
