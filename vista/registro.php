<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Cristalimb registro</title>
		
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/jquery-1.12.4-jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/estilos.css"/>

</head>
	<body>
<?php

require_once "../modelo/dbconect.php";

if(isset($_REQUEST['btn_register'])) 
{
	$username	= $_REQUEST['txt_username'];	
	$email		= $_REQUEST['txt_email'];	
	$password	= $_REQUEST['txt_password'];
	$role		= $_REQUEST['txt_role'];
		



	
	if(empty($username)){
		$errorMsg[]="Ingrese nombre de usuario";
	}
	else if(empty($email)){
		$errorMsg[]="Ingrese email";
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errorMsg[]="Ingrese email valido";
	}
	else if(empty($password)){
		$errorMsg[]="Ingrese password";	
	}
	else if(strlen($password) < 6){
		$errorMsg[] = "Password minimo 6 caracteres";
	}
	else if(empty($role)){
		$errorMsg[]="Seleccione rol";
	}
	else
	{	
		try
		{	
			$select_stmt=$db->prepare("SELECT username, email FROM clogin 
										WHERE username=:uname OR email=:uemail"); 
			$select_stmt->bindParam(":uname",$username);   
			$select_stmt->bindParam(":uemail",$email); 
			$select_stmt->execute();
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);	
			if($row["username"]==$username){
				$errorMsg[]="Usuario ya existe";
			}
			else if($row["email"]==$email){
				$errorMsg[]="Email ya existe";
			}
			
			else if(!isset($errorMsg))
			{
				$insert_stmt=$db->prepare("INSERT INTO clogin(username,email,password,role) VALUES(:uname,:uemail,:upassword,:urole)"); 		
				$insert_stmt->bindParam(":uname",$username);	
				$insert_stmt->bindParam(":uemail",$email);	  		
				$insert_stmt->bindParam(":upassword", $password);
				$insert_stmt->bindParam(":urole",$role);
				
				if($insert_stmt->execute())
				{
					$registerMsg="Registro exitoso: Esperar página de inicio de sesión"; 
					header("refresh:2;login.php"); 
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}
include("header.php");
?>
	<div class="wrapper">
	<div class="container">
		<div class="col-lg-12">
		
		<?php
		if(isset($errorMsg))
		{
			foreach($errorMsg as $error)
			{
			?>
				<div class="alert alert-danger">
					<strong>INCORRECTO ! <?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($registerMsg))
		{
		?>
			<div class="alert alert-success">
				<strong>EXITO ! <?php echo $registerMsg; ?></strong>
			</div>
        <?php
		}
		?> 
<div class="login-form">  
<center><h2>Registrar</h2></center>
<form method="post" class="form-horizontal">
    
<div class="form-group">
<label class="col-sm-9 text-left">Usuario</label>
<div class="col-sm-12">
<input type="text" name="txt_username" class="form-control" placeholder="Ingrese usuario" />
</div>
</div>

<div class="form-group">
<label class="col-sm-9 text-left">Email</label>
<div class="col-sm-12">
<input type="text" name="txt_email" class="form-control" placeholder="Ingrese email" />
</div>
</div>
    
<div class="form-group">
<label class="col-sm-9 text-left">Password</label>
<div class="col-sm-12">
<input type="password" name="txt_password" class="form-control" placeholder="Ingrese password" />
</div>
</div>
    
<div class="form-group">
    <label class="col-sm-9 text-left">Seleccione tipo</label>
    <div class="col-sm-12">
    <select class="form-control" name="txt_role">
        <option value="" selected="selected"> - seleccione rol - </option>
        <option value="admin">Admin</option>
        <option value="empleado">Empleado</option>
    </select>
    </div>
</div>

<div class="form-group">
<div class="col-sm-12">
<input type="submit" name="btn_register" class="btn btn-primary btn-block" value="Registro">
</div>
</div>

<div class="form-group">
<div class="col-sm-12">
¿Tienes una cuenta? <a href="login.php"><p class="text-info">Inicio de sesión</p></a>		
</div>
</div>
    
</form>
</div>
		</div>
		
	</div>
			
	</div>
										
	</body>
</html>