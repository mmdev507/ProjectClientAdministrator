<?php
session_start();
?>
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
    <header>
        <h1>Registrar Transacciones</h1>
    </header>
    <<center>
    <img src="img/Registrartransacciones.png" alt="Imagen de eliminar"  width="500" height="500" posit>
    <h1>Sitio en Mantenimiento ¡Vuelva pronto!</h1>
</center>
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