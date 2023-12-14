<?php 

require_once('modelo.php');

class usuarios extends modeloCredencialesBD{

public function __construct(){
    parent::__construct();      
}

public function validar_usuario($usr, $pwd){
    $instruccion = "CALL sp_validar_usuario(?, ?)";
    
    // Preparar la declaración
    $stmt = $this->_db->prepare($instruccion);
    $stmt->bind_param("ss", $usr, $pwd);
    
    // Ejecutar la consulta
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    
    // Verificar si el usuario y la contraseña son válidos
    if ($count > 0) {
        // Usuario y contraseña válidos, retornar verdadero (true)
        return true;
    }
    
    // Usuario no encontrado o contraseña incorrecta, retornar falso (false)
    return false;
}
}
?>