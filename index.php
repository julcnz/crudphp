<?php include 'template/header.php' ?>

<?php include_once "model/conexion.php";
$sentencia = $bd->query("select * from persona");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card">
        <div class="card-header">
          Lista de personas
        </div>
        <div class="p-4">
          <table class="table aling-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Signo</th>
                <th scope="col" colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($persona as $dato) {

              ?>

                <tr>
                  <td scope="row"><?php echo $dato->codigo; ?></td>
                  <td><?php echo $dato->nombre; ?></td>
                  <td><?php echo $dato->edad; ?></td>
                  <td><?php echo $dato->signo; ?></td>
                  <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
                  <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
                </tr>

              <?php
              }
              ?>

            </tbody>
          </table>

        </div>
      </div>
    </div>
    <div class="col-md-4">

      <!-- inicio alerta -->
      <?php 
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Ha ocurrido un error</strong> Debes rellenar todos los campos del formulario.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
      
      <?php 
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hecho</strong> Se ha agregadoo correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>

      <?php 
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Ha ocurrido un error</strong> Vuelve a intentarlo.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>

      <?php 
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hecho</strong> Se ha editado correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>

      <?php 
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hecho</strong> Se ha eliminado correctamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php } ?>
      <!-- fin alerta -->

      <div class="card">
        <div class="card-header">
          Ingresar datos:
        </div>
        <form action="registrar.php" class="p-4" method="POST">
          <div class="mb-3">
            <label class="form-label">Nombre: </label>
            <input type="text" class="form-control" name="txtNombre" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Edad: </label>
            <input type="number" class="form-control" name="txtEdad" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Signo: </label>
            <input type="text" class="form-control" name="txtSigno" autofocus required>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registrar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php include 'template/footer.php' ?>