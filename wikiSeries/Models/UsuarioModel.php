
<?php
class UsuarioModel {
    private $db;

    public _constrruct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=wikiserie;charset=utf8', 'root', '');
    }

    public getUsuario(){
        $sentencia = $this->db->prepare( "select * from usuario");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

        return $usuarios;
    }

    public function isUsuario($usuarioIngreso, $passIngreso){
        $sentencia = $this->db->prepare( "select $usuarioIngreso, $passIngreso from usuario");
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);

        if ($usuarios != null){
            //Ingreso como administrador
                
        } else {
             //error de usuarios o pass incorrecta
        }
    }

    public function agregarUsuario($nombre,$apellido,$usuario,$constraseña){

        $sentencia = $this->db->prepare("INSERT INTO usuario(nombre, apellido, usuario, contraseña) VALUES(?,?,?,?)");
        $sentencia->execute(array($nombre,$apellido,$usuario,$contraseña));
    }

    public function borrarUsuario($id){
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id=?");
        $sentencia->execute(array($id));
    }


}

?>