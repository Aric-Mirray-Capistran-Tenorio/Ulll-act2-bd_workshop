<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'bd_workshop'
) or die(mysqli_error($mysqli));

?>
