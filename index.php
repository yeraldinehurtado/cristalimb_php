<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propietarios</title>
    <link rel="stylesheet" href="vista/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="vista/bootstrap/css/estilos.css" />
</head>
<body>
    <script src="vista/bootstrap/js/jquery-1.12.4-jquery.min.js"></script>
    <script src="vista/bootstrap/js/bootstrap.min.js"></script>

<div id="contenedor">
    <div id="encabezado">
    <h3>
        <img src="vista/bootstrap/img/logocristal.jpg" height="95" width="170"> Propietarios.</img>
    </h3>
    </div>
    <ul id="menu">
        <li><a href="index.php?accion=inicio">Inicio</a></li>
        <li><a href="index.php?accion=listar">Propietarios</a></li>
        <li><a href="vista/cerrar_sesion.php">Cerrar sesión</a></li>
    </ul>
    <div id="contenido">
        <?php
            require_once 'modelo/bdpropietarios.php';
            $controller = 'propietario';

            if (!isset($_REQUEST['p']))
            {
                require_once "controlador/propietarios.controller.php";
                $controller=ucwords($controller) . 'Controller';
                $controller = new $controller;
                $controller->Index();
            }
            else
            {
                $controller = strtolower($_REQUEST['p']);
                $accion = isset($_REQUEST['a']) ? $_REQUEST['a']: 'Index';

                require_once "controlador/propietarios.controller.php";
                $controller = ucwords($controller) . 'Controller';
                $controller = new $controller;

                call_user_func(array ($controller, $accion));
            }
        ?>
    </div>
</div>
    
</body>
</html>