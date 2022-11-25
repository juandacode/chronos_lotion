<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'chronos_lotion'
) or die(mysqli_error($mysqli));

?>
