<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Clientes | Administrador Clientes</title>
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>
    <nav>
        <ul>
        <li><img src="img/logoempresa.png" alt="Logo de la empresa" width="50px" height="50"></li>
            <li><a href="Dashboard.php">Dasboard</a></li>
            <li><a href="listadocliente.php">Clientes</a></li>
            <li><a href="RegistrarClientes.php">Registrar Clientes</a></li>
            <li><a href="RegistrarTransacciones.php">Registrar Transacciones</a></li>
            <li><a href="Reportes.php">Reportes</a></li>
            <input type="button" class="buttonsesion" id="CerrarSesion" value="Cerrar Sesion"> </input>
        </ul>
    </nav>

          <?php

require_once("class/clientes.php");


if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $obj_clientes = new cliente();
  $clientes = $obj_clientes->eliminar_registro($id);
  
  if ($clientes === "Registro eliminado correctamente.") {
    header('Location: eliminadoexitoso.php');
    exit;
  } else {
    echo $clientes;
  }

} 

$clientes = new cliente(); 

echo '<div class="kanban-board">';

  $resultado1 = $clientes->consultar_clientes();

  
  echo '<div class="kanban-column">';
  echo '<div class="kanban-card">';
  if (empty($resultado1)) {
    echo "No hay tareas registradas.";
  } else {
  foreach ($resultado1 as $row) {
      echo '<div class="kanban-card">';
      echo '<div class="card-title1">';
      echo '<div class="card-title1"> <center><h2>Cliente ' . $row['id'] . ' </h2></center></div>';
    //  echo '<div class="card-title">' . $row['id'] . '</div>';
      echo '<div class="card-title">Nombre: ' . $row['nombre'] . '</div>';
      echo '<div class="card-description">apellido: ' . $row['apellido'] . '</div>';
      echo '<div class="card-fecha">Fecha de Nacimiento: ' . $row['fecha_nacimiento'] . '</div>';
      echo '<div class="card-asignado">email: ' . $row['email'] . '</div><br>';

      
     if (strtotime($row['fecha_modificacion']) !== false) {
      echo '<div class="bandera"><img src="\CheckListweb\img\Banderaroja.png"  width="20" height="20"></div>';
  }

      echo '</div>';
      echo '</div>';

      echo '<div class="card-buttons">';
      echo '<a href="ModificarClientes.php?id=' . $row['id'] . '" class="card-button">Modificar</a>';
      echo '<a href="listadocliente.php?id=' . $row['id'] . '"  class="card-button">Eliminar</a>';
      echo '</div>';
  }
}
  echo '</div>';
  echo '</div>';
    
  ?>
</body>
<footer>
    <p>© 2023 Services MM. Todos los derechos reservados.</p>
</footer>
</html>