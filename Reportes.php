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
<H1>Reporte de Tareas</H1>
        </Center> 

        <FORM NAME="FormFiltro" METHOD="post" ACTION="Reportes.php">
<BR/>
Filtrar por:
<INPUT NAME="ConsultarTodos"   VALUE="Clientes" TYPE="submit"/> 
<?php

require_once("class/clientes.php");

$obj_clientes = new cliente();
$clientes = $obj_clientes->listado_clientes();

if(array_key_exists('ConsultarTodos', $_POST)) {

    $obj_clientes = new cliente();
    $clientes= $obj_clientes->listado_clientes();
}

/*
if(array_key_exists('ConsultarFiltro', $_POST)) {
                                                                                    
    $obj_tareas = new tarea();
    $tareas = $obj_tareas->consultar_tareas_hoy();
}

if(array_key_exists('ConsultarEstado', $_POST)) {
  
  $estado = $_POST['estado'];
  
  $obj_tareas = new tarea();
  $tareas = $obj_tareas->consultar_tareas_estado($estado);

  if ($tareas !== null) {
    $nfilas = count($tareas);
} else {
  echo "No hay registros para este estado";
}
}

if(array_key_exists('Consultartipo', $_POST)) {
  
  $tipo = $_POST['tipo'];
  
  $obj_tareas = new tarea();
  $tareas = $obj_tareas->consultar_tareas_tipo($tipo);

  if ($tareas !== null) {
    $nfilas = count($tareas);
} else {
  echo "No hay registros para este tipo ";
}
}

if (array_key_exists('fechas', $_POST)) {
  $desde = $_POST['desde'];
  $hasta = $_POST['hasta'];

  $obj_tareas = new tarea();
  $tareas = $obj_tareas->consultar_tareas_fechas($desde, $hasta);

  if ($tareas !== null) {
      $nfilas = count($tareas);
  } else {
    echo " No hay tareas para este rango";
  }
}  */

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
    
</body>
<footer>
    <p>© 2023 Services MM. Todos los derechos reservados.</p>
</footer>
</html>