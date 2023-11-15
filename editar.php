<?php
include("db.php");
$nombre = '';
$apellido = '';
$email = '';
$contacto = '';
$rfc = '';
$genero = '';
$domicilio = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tbl_vendedores WHERE id_vendedor=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $email = $row['email'];
    $contacto = $row['contacto'];
    $rfc = $row['rfc'];
    $genero = $row['genero'];
    $domicilio = $row['domicilio'];
  }
}

if (isset($_POST['actualizar'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $apellido= $_POST['apellido'];
  $email= $_POST['email'];
  $contacto= $_POST['contacto'];
  $rfc= $_POST['rfc'];
  $genero= $_POST['genero'];
  $domicilio = $_POST['domicilio'];

  $query = "UPDATE tbl_vendedores set nombre = '$nombre', apellido = '$apellido', email='$email', contacto='$contacto', rfc='$rfc', genero='$genero', domicilio='$domicilio' WHERE id_vendedor=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado Correctamente';
  $_SESSION['message_type'] = 'Advertencia';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="apellido" type="text" class="form-control" value="<?php echo $apellido; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="email" type="text" class="form-control" value="<?php echo $email; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="contacto" type="text" class="form-control" value="<?php echo $contacto; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="rfc" type="text" class="form-control" value="<?php echo $rfc; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="genero" type="text" class="form-control" value="<?php echo $genero; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
          <input name="domicilio" type="text" class="form-control" value="<?php echo $domicilio; ?>" placeholder="Update Title">
        </div>
        <button class="btn-success" name="actualizar">Actualizar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
