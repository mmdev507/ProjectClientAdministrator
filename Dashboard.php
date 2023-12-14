<?php
session_start();

// Verificar si el usuario está autenticado, si no, redirigir al login
//if (!isset($_SESSION["usuario_valido"])) {
  //  header("Location: login.php");
  //  exit();
//}
?>
<!DOCTYPE html>
<HTML XMLS="http://w3.org/1999/xhtml" xml:lang="es" LANG="ES">
<head>
    <meta charset="UTF-8">
    <title>DashBoard | Administrador Clientes</title>
    <link href="css/estilo.css" rel="stylesheet">
    <link href="img/Logocompany.png" rel="icon">
    
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
if
 (isset($_COOKIE["user"]))
 echo "<H2>Bienvenido ". $_COOKIE["user"]."!</H2><BR/>";
 else
 echo
 "<H2>Bienvenido invitado!</H2><BR/>";
?>
    <header>
        <h1>Dashboard</h1>
    </header>
    <div class="container">
      <div class="section">
        <img src="img/Modificarcliente.png" alt="Modificar Clientes">
        <a href="listadocliente.php">
        <input type="button" id="listadocliente" value="Listar Clientes"> </input>
      </a>
      </div>
        <div class="section">
          <img src="img/Agregarcliente.png" alt="Registrar Clientes">
          <a href="RegistrarClientes.php">
          <input type="button" id="Agregarcliente" value="Registrar Cliente"> </input>
        </a>
        </div>
        <div class="section">
          <img src="img/Registrartransacciones.png" alt="Registrar Transacciones">
          <a href="RegistrarTransacciones.php">
          <input type="button" id="Registrartransacciones" value="Registrar Transacciones" > </input>
        </a>
        </div>
        <div class="section">
          <img src="img/reporte.png" alt="Reportes">
          <a href="Reportes.php">
          <input type="button" id="Reportes" value="Reportes"> </input>
          </a>
        </div>
      </div>
      </div>
    </center> 
    <BR><BR>
      <?php

if (isset($_SESSION["usuario_valido"]) && !empty($_SESSION["usuario_valido"])) {
  echo "La sesión está activa para el usuario: " . $_SESSION["usuario_valido"];
} else {
  echo "La sesión no está activa o el usuario no está autenticado.";
}

?>    
    <script>
   if (document.cookie.split(';').some((item) => item.trim().startsWith('user='))) {
    console.log('La cookie "user" está configurada.');
} else {
    console.log('La cookie "user" no está configurada.');
}
</script>
    <script>
document.getElementById('CerrarSesion').addEventListener('click', function() {
  
  // Eliminar la cookie 'user'
    document.cookie = "user=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    
    // Redirigir a la página de inicio de sesión
  window.location.href = 'login.php';
});
</script>
</body>
<footer>
    <p>© 2023 Services MM. Todos los derechos reservados.</p>
</footer>
</html>