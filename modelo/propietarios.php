<?php
    class propietarios
    {
        private $pdo;

        public $id;
        public $identificacion;
        public $nombres;
        public $apellidos;
        public $telefono;
        public $email;
        public $direccion;

        public function __construct()
        {
            try
            {
                $this->pdo = bdpropietarios::Startup();
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Listar()
        {
            try
            {
                $result=array();
                $stm = $this->pdo->prepare("select * from propietarios");
                $stm->execute();

                return $stm->fetchAll(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
        
        public function Obtener($id)
        {
            try
            {
                $stm = $this->pdo->prepare("select * from propietarios where id=?");
                $stm->execute(array($id));

                return $stm->fetch(PDO::FETCH_OBJ);
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Eliminar($id)
        {
            try
            {
                $stm = $this->pdo->prepare("delete from propietarios where id=?");
                $stm->execute(array($id));

            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Actualizar($data)
        {
            try
            {
                $sql='update propietarios set 
                            identificacion = ?,
                            nombres = ?,
                            apellidos = ?,
                            telefono = ?,
                            email = ?,
                            direccion = ?
                            where id = ?';
                            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->identificacion,
                        $data->nombres,
                        $data->apellidos,
                        $data->telefono,
                        $data->email,
                        $data->direccion,
                        $data->id,
                    )
                    );
                

            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }

        public function Registrar($data)
        {
            try
            {
                $sql="insert into propietarios (identificacion, nombres, apellidos, telefono, email, direccion) 
                            values(?, ?, ?, ?, ?, ?)";
                $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->identificacion,
                        $data->nombres,
                        $data->apellidos,
                        $data->telefono,
                        $data->email,
                        $data->direccion,
                    )
                    );
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }
    }
?>