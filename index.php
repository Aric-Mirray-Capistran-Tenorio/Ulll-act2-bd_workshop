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
        <form action="guardar.php" method="POST">
          <div class="form-group">
            <label for="" style="font-size:20px; fort-family: Perpetua;">Registrar Tecnicos</label>
          </div>
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Ingresa Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="apellido" class="form-control" placeholder="Ingresa Apellido" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Ingrese e-mail" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="contacto" class="form-control" placeholder="Ingrese Contacto" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="rfc" class="form-control" placeholder="Ingrese RFC" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="genero" class="form-control" placeholder="Ingrese Genero" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="domicilio" class="form-control" placeholder="Ingrese Domicilio" autofocus>
          </div>
          <input type="submit" name="guardar" class="btn btn-success btn-block" value="Registrar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>e-mail</th>
            <th>Contacto</th>
            <th>Rfc</th>
            <th>Genero</th>
            <th>Domicilio</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tbl_vendedores";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['contacto']; ?></td>
            <td><?php echo $row['rfc']; ?></td>
            <td><?php echo $row['genero']; ?></td>
            <td><?php echo $row['domicilio']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $row['id_vendedor']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="borrar.php?id=<?php echo $row['id_vendedor']?>" class="btn btn-danger">
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
