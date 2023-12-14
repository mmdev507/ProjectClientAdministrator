<?php
session_start();

$mensaje_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['usuario']) && isset($_POST['password'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        require_once("class/usuarios.php");
        $obj_usuarios = new usuarios();
        $usuario_validado = $obj_usuarios->validar_usuario($usuario, $password);

        if ($usuario_validado) {
            $_SESSION["usuario_valido"] = $usuario;
            $expire = time() + 60 * 5; // 5 minutes
            setcookie("user", $usuario, $expire);
            header("Location: Dashboard.php");
            exit();
        } else {
            $mensaje_error = 'Acceso no autorizado';
        }
    }
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C/DTD HTML 4.0//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<HTML XMLS="http://w3.org/1999/xhtml" xml:lang="es" LANG="ES">
<head>
    <meta charset="UTF-8">
    <title>Login | Administrador Clientes</title>
    <link href="css/estilo.css" rel="stylesheet">
    <link href="img/Logocompany.png" rel="icon">
</head>
<body>
<nav>
    <ul>
        <li><img src="img/logoempresa.png" alt="Logo de la empresa" width="50px" height="50"></li>
    </ul>
</nav>
<header>
    <h1>Iniciar Sesión</h1>
</header>

<form action="login.php" method="POST" class="formulario">
    <div class="campo">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
    </div>
    <div class="campo">
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div class="boton">
        <input type="submit" value="Iniciar Sesión" class="buttoninis">
    </div>
</form>

<?php if ($mensaje_error !== ''): ?>
    <p><?php echo $mensaje_error; ?></p>
<?php endif; ?>

<!-- Resto del contenido de la página (mensajes de error, etc.) -->
<footer>
    <p>© 2023 Services MM. Todos los derechos reservados.</p>
</footer>
</body>
</html>