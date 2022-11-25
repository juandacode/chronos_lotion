<?php
include("db.php");
    if(isset($_GET['id'])) {
        $idProducto= $_GET['id'];
        $query = "DELETE FROM producto WHERE id_producto = $idProducto";
        $result = mysqli_query($conn, $query);
        if(!$result) {
          die("Query Failed.");
        }
      
        $_SESSION['message'] = 'Task Removed Successfully';
        $_SESSION['message_type'] = 'danger';
        header('Location: product.php');
      }

?>