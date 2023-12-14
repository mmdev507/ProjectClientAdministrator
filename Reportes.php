<?php
session_start ();
?>
<!DOCTYPE html>
<HTML XMLS="http://w3.org/1999/xhtml" xml:lang="es" LANG="ES">
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
    <Center>       
<H1>Reporte de Clientes</H1>
        </Center> 

        <FORM NAME="FormFiltro" METHOD="post" ACTION="Reportes.php">
<BR/>
Filtrar por:
<INPUT NAME="ConsultarTodos"   VALUE="Clientes" TYPE="submit" CLASS="card-button"/> 
<?php

require_once("class/clientes.php");

$obj_clientes = new cliente();
$clientes = $obj_clientes->listado_clientes();

if(array_key_exists('ConsultarTodos', $_POST)) {

    $obj_clientes = new cliente();
    $clientes= $obj_clientes->listado_clientes();
}

if (!empty($clientes)) {
  $nfilas = count($clientes);
} else {
  $nfilas = 0;
}

//$nfilas=count($clientes);

if ($nfilas>0)
{
print ("<TABLE>\n");
print ("<TR>\n");
print ("<TH>ID</TH>\n");
print ("<TH>Nombre</TH>\n");
print ("<TH>Apellido</TH>\n");
print ("<TH>Fecha de Nacimiento</TH>\n");
print ("<TH>Direccion</TH>\n");
print ("<TH>Email</TH>\n");
print ("<TH>Celular</TH>\n");
print ("<TH>Membresia</TH>\n");
print ("<TH>Fecha Modificación</TH>\n");
print ("</TR\n");


foreach ( $clientes as $resultado) {
    print ("<TR>\n");
    print ("<TD>". $resultado['id'] . "</TD>\n");
    print ("<TD>". $resultado['nombre'] . "</TD>\n");
    print ("<TD>". $resultado['apellido'] . "</TD>\n");
    print ("<TD>". $resultado['fecha_nacimiento'] . "</TD>\n");
    print ("<TD>". $resultado['direccion'] . "</TD>\n");
    print ("<TD>". $resultado['email'] . "</TD>\n");
    print ("<TD>". $resultado['celular'] . "</TD>\n");
    print ("<TD>". $resultado['membresia'] . "</TD>\n");
    print ("<TD>". $resultado['fecha_modificacion'] . "</TD>\n");
    
   
print("</TR>\n");
}
print("</TABLE>\n");
}

else {
    print ("");
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