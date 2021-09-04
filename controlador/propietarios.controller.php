<?php
    require_once 'modelo/propietarios.php';

    class propietarioController{
        private $model;

        public function __construct(){
            $this->model = new propietarios();
        }

        public function Index(){
            require_once 'vista/header.php';
            require_once 'vista/propietarios/propietarios.php';
        }

        public function Crud(){
            $propietario = new propietarios();

            if(isset($_REQUEST['id'])){
                $propietario=$this->model->Obtener($_REQUEST['id']);
            }

            require_once 'vista/header.php';
            require_once 'vista/propietarios/propietario_editar.php';
        }

        public function Guardar(){
            $propietario = new propietarios();

            $propietario->id = $_REQUEST['id'];
            $propietario->identificacion = $_REQUEST['doc'];
            $propietario->nombres = $_REQUEST['nombre'];
            $propietario->apellidos = $_REQUEST['apellido'];
            $propietario->telefono = $_REQUEST['telefono'];
            $propietario->email = $_REQUEST['correo'];
            $propietario->direccion = $_REQUEST['direccion'];

            $propietario->id > 0
                ? $this->model->Actualizar($propietario)
                : $this->model->Registrar($propietario);

            header('Location: index.php');
        }

        public function Eliminar(){
            $this->model->Eliminar($_REQUEST['id']);
            header('Location: index.php');
        }
    }
?>