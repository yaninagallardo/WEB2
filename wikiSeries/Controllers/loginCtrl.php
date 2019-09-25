<?php
    require_once '.\Models\UsuarioModel.php';
    require_once '.\View\loginView.php';

    class loginCtrl {
        private $model;
        
        function __construct(){
            $this->model = new UsuarioModel();
        }
        
        public function getUsuario() {
            echo "<p> </p>";
            $usuario = $_GET['usu'];
            $pass = $_GET['pass'];
            
            $exist = $this->model->isUsuario($usuario, $pass);
            $this->view->user($exist);
            
        }       
        
    }
    
?>