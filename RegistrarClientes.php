<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Cliente | Administrador Clientes</title>
    <link href="css/estilo.css" rel="stylesheet">
    <link href="img/Logocompany.png" rel="icon">
</head>
<body>
    <nav>
        <ul>
        <li><img src="img/logoempresa.png" href="Dashboard.html" alt="Logo de la empresa" width="50px" height="50"></li>
            <li><a href="Dashboard.php">Dasboard</a></li>
            <li><a href="listadocliente.php">Clientes</a></li>
            <li><a href="RegistrarClientes.php">Registrar Clientes</a></li>
            <li><a href="RegistrarTransacciones.php">Registrar Transacciones</a></li>
            <li><a href="Reportes.php">Reportes</a></li>
            <input type="button" class="buttonsesion" id="CerrarSesion" value="Cerrar Sesion"> </input>
        </ul>
    </nav>
   
    <center>
    <div><img src="img/Registrar.jpg" alt="Imagen de Registrar"  width="250" height="250"></div>
        <p><h1>Registrar Cliente</h1></p>
        <form action="RegistrarClientes.php" method="post">
            <label for="Nom">Nombre:</label><br>
            <input type="text" placeholder="Digite su nombre" id="nombre" name="nombre" value="" required><br><br>
            <label for="Apel">Apellido:</label><br>
            <input type="text" placeholder="Digite su apellido" id="apellido" name="apellido" value="" required><br><br>
            <label>Fecha de Nacimiento</label><br>
            <input type="date" name="fechadenacimiento" required><br><br>
            <label for="direccion">Dirección</label><br>
            <input type="text" placeholder="Digite su dirección" id="direccion" name="direccion" value="" required><br><br>
            <label for="email">Correo electrónico</label><br>
            <input type="email" placeholder="Digite su email" id="email" name="email" value="" required><br><br>
            <label for="celular">Celular</label><br>
            <input type="text" placeholder="Digite su celular" id="celular" name="celular" value="" required><br><br>
          <label for="membresia">Membresía:</label><br>
              <select id="membresia" name="membresia" required>
                <option value="1">Plata</option>
                <option value="2">Premium</option>
                <option value="3">Golden</option>
            </select><br><br>
            <INPUT NAME="AgregarCliente"   VALUE="Registrar" class="AgregarCliente" TYPE="submit"/>
        </form>
            
        </center>
       
    <?php

require_once("class/clientes.php");

        if (array_key_exists('AgregarCliente', $_POST)) {
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $fecha_nacimiento = $_POST['fechadenacimiento'];
            $direccion = $_POST['direccion'];
            $email = $_POST['email'];
            $celular = $_POST['celular'];
            $id_membresia = $_POST['membresia'];

  $obj_clientes = new cliente();
  $clientes = $obj_clientes->guardar_cliente($nombre, $apellido, $fecha_nacimiento, $direccion, $email, $celular, $id_membresia);

  echo $clientes;
  
} 
?>
</body>
<footer>
    <p>© 2023 Services MM. Todos los derechos reservados.</p>
</footer>
</html>