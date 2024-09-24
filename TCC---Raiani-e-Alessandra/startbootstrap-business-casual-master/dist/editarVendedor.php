<?php
include 'db_connection';

$id = $_GET['id'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $email = $_POST [ 'email'];
    $telefone = $_POST ['telefone'];
    $dataNascimento = $_POST ['dataNascimento'];

$sql = "UPDATE usuario SET nome='$nome', email='$email', telefone='$telefone', dataNascimento='$dataNascimento' WHERE id=$id";

if($conn->query(query: $sql) === TRUE){
    echo "Vendedor editado com sucesso!";
} else {
    echo "Erro ao editar um vendedor" .$sconn->error;
}
$sconn->close();

}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="cadastro1.css"/>
<title>Cadastro Vendedor</title>
</head>
<body>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Crie sua conta</h4>
	<p class="text-center">Esteja sempre pronto com a sua conta!</p>
	
	<form method="POST" action="cadastro.php">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nome" class="form-control" placeholder="Insira seu nome completo" type="text">
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" placeholder="Insira seu endereço e-mail" type="email">
    </div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select class="custom-select" style="max-width: 120px;">
		    <option selected="">(47)</option>
		    <option value="1">(48)</option>
			<option value="1">(49)</option>
		</select>
    	<input name="telefone" class="form-control" placeholder="Insira seu número de telefone" type="text">
    </div>     <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>

		<div class="form-control">
			<input name="dataNascimento" id="date" type="date" />
		</div>
		
	</div> 
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>