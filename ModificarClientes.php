<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login | Administrador Clientes</title>
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
  $row = $obj_clientes->consultar_registro($id);

}

if (array_key_exists('Modificarcliente', $_POST)) {;
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $id_membresia = $_POST['membresia'];


$obj_clientes = new cliente();
$clientes = $obj_clientes->modificar_cliente($nombre, $apellido, $fecha_nacimiento, $direccion, $email, $celular, $id_membresia);

if ($clientes === "Los datos se han guardado correctamente.") {
  header('Location: modificadoexitoso.php');
  exit;
} else {
  echo $clientes;
}
 

echo $clientes;

} 
?>
    <header>
        <h1>Modificar Clientes</h1>
    </header>
    <center>
        <form action="ModificarClientes.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="Nom">Nombre:</label><br>
            <input type="text" placeholder="Digite su nombre" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" required><br><br>
            <label for="Apel">Apellido:</label><br>
            <input type="text" id="apellido" name="apellido" value="<?php echo $row['apellido']; ?>" required><br><br>
            <label>Fecha de Nacimiento</label><br>
            <input type="date" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required><br><br>
            <label for="direccion">Dirección</label><br>
            <input type="text" id="direccion" name="direccion" value="<?php echo $row['direccion']; ?>" required><br><br>
            <label for="email">Correo electrónico</label><br>
            <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
            <label for="celular">Celular</label><br>
            <input type="text" id="celular" name="celular" value="<?php echo $row['celular']; ?>" required><br><br>
          <label for="membresia">Membresía:</label><br>
              <select id="membresia" name="membresia" required>
                <option value="1" <?php if ($row['membresia'] == "Plata") echo "selected"; ?>>Plata</option>
                <option value="2" <?php if ($row['membresia'] == "Premium") echo "selected"; ?>>Premium</option>
                <option value="3" <?php if ($row['membresia'] == "Gold") echo "selected"; ?>>Gold</option>
            </select><br><br>
            <INPUT NAME="Modificarcliente"   VALUE="Modificar Cliente" class="Modificarcliente" TYPE="submit"/>
        </form>    
        </center>
    <BR><BR><BR><BR>
   
</body>
<footer>
    <p>© 2023 Services MM. Todos los derechos reservados.</p>
</footer>
</html>