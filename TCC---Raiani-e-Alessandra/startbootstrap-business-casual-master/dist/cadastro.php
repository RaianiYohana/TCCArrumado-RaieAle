<?php 
include 'db_connection.php';

if($_SERVER["REQUEST_METHOD"]== "POST"){
    $nome = $_POST['nome'];
    $email = $_POST [ 'email'];
    $telefone = $_POST ['telefone'];
    $dataNascimento = $_POST ['dataNascimento'];
    $cnpj = $_POST ['cnpj'];
    $senha = password_hash ($_POST['senha'], PASSWORD_BCRYPT);

$sql = "INSERT INTO usuario (nome, email, telefone, dataNascimento, cnpj, senha) VALUES (?,?,?,?,?,?) ";

if ($stmt = $conn->prepare($sql)){
    $stmt->bind_param("ssssss", $nome, $email, $telefone, $dataNascimento, $cnpj, $senha);
    if($stmt->execute()){
        echo "Novo usuário cadastrado com sucesso.";
    } else {
echo "Erro:" . $stmt->error;
    }
    $stmt->close();
}
}
$conn->close();
?>