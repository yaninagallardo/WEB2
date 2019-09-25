
<?php
class UsuarioModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=wikiserie;charset=utf8', 'root', '');
        
    }

    public function GetUsuario(){
        $sentencia = $this->db->prepare( "select * from usuario");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $usuarios;
    }

    /*si es usuario ingresa como administrador de la pagina */
    public function IsUsuario($usuarioIngreso, $passIngreso){
        $sentencia = $this->db->prepare( 'SELECT * FROM usuario WHERE usuario = $usuarioIngreso AND contraseña = $passIngreso');
        $sentencia->execute(['usuario' => $usuarioIngreso, 'contraseña' => $passIngreso]);
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

        if ($usuarios != null){
            return "correcto";//Ingreso como administrador
                
        } else {
             return "incorrecto";//error de usuarios o pass incorrecta
        }
    }

    public function AgregarUsuario($nombre,$apellido,$usuario,$constraseña){

        $sentencia = $this->db->prepare("INSERT INTO usuario(nombre, apellido, usuario, contraseña) VALUES(?,?,?,?)");
        $sentencia->execute(array($nombre,$apellido,$usuario,$contraseña));
    }

    public function BorrarUsuario($id){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id=?");
        $sentencia->execute(array($id));
    }


}

?>