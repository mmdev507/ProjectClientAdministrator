<?php
require_once('modelo.php');

class cliente extends modeloCredencialesBD{ 
protected $nombre;
protected $apellido;
protected $fecha_nacimiento;
protected $direccion;
protected $email;
protected $celular;
protected $id_membresia;

public function __construct()
{

    parent::__construct();
}


public function guardar_cliente($nombre, $apellido, $fecha_nacimiento, $direccion, $email, $celular, $id_membresia){

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fechadenacimiento'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $id_membresia = $_POST['membresia'];
 

    $instruccion = "CALL sp_guardar_cliente('$nombre', '$apellido', '$fecha_nacimiento', '$direccion', '$email', '$celular','$id_membresia')";

    if ($this->_db->query($instruccion) === TRUE) {
        return "Los datos se han guardado correctamente.";
    } else {
        return "Error al guardar los datos: " . $this->_db->error;
    }

}

public function modificar_cliente($nombre, $apellido, $fecha_nacimiento, $direccion, $email, $celular, $id_membresia){
    $id = $_POST['id']; 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $id_membresia = $_POST['membresia'];
 

    $instruccion = "CALL sp_modificar_cliente('$id','$nombre', '$apellido', '$fecha_nacimiento', '$direccion', '$email', '$celular','$id_membresia')";

    if ($this->_db->query($instruccion) === TRUE) {
        return "Los datos se han guardado correctamente.";
    } else {
        return "Error al guardar los datos: " . $this->_db->error;
    }

}

public function consultar_registro($id) {
    $instruccion = "CALL sp_consultar_cliente($id)";
    $consulta = $this->_db->query($instruccion);

    if ($consulta) { 
        
        $resultado = $consulta->fetch_assoc();
        $consulta->close(); 

        if ($resultado) {
        
            return $resultado;
        } else {
            echo "No se encontraron registros con el ID proporcionado.";
        }
    } else {
        echo "Error al ejecutar la consulta en la base de datos.";
    }

    return null;
}

public function consultar_clientes(){
    $instruccion = "CALL sp_listar_clientes";
    $consulta = $this->_db->query($instruccion);
    $resultado1 = $consulta->fetch_all(MYSQLI_ASSOC);


    if (!$resultado1) { 
        echo "";
    } else {
        return $resultado1;
    }
}

public function eliminar_registro($id){
    $instruccion = "CALL sp_borrar_cliente($id)";
    if ($this->_db->query($instruccion) === TRUE) {
        return "Registro eliminado correctamente.";
    } else {
        return "Error al eliminar el registro: " . $this->_db->error;
    }
}

public function listado_clientes(){

    $instruccion = "CALL sp_listar_clientes()";

    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if (!$resultado){ 
        echo "No hay registros de tareas |";
    } 
    else {
        return $resultado;
        $resultado->close();
        $this->_db->close();
        $consulta->close();

        
    }
 }

}
?>