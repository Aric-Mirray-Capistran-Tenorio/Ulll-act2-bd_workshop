<?php

include('db.php');

if (isset($_POST['guardar'])) {
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $contacto = $_POST['contacto'];
  $rfc = $_POST['rfc'];
  $genero = $_POST['genero'];
  $domicilio = $_POST['domicilio'];
  $query = "INSERT INTO tbl_vendedores(nombre, apellido, email, contacto, rfc, genero, domicilio) VALUES ('$nombre', '$apellido', '$email', '$contacto', '$rfc', '$genero', '$domicilio')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Registro Fallido.");
  }

  $_SESSION['message'] = 'Registrado con exito';
  $_SESSION['message_type'] = 'Exito';
  header('Location: index.php');

}

?>
