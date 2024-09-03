<?php
session_start();
include 'db_connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, senha FROM usuario WHERE nome = ?";
    if($stmt = $sconn->prepare($sql)){
        $stmt->bind_param("s","nome");
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows == 1) {
            $stmt->bind_result($id, $hashed_senha);
            $stmt->fetch();

            if(senha_verify($senha, $hashed_senha)) {
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $id;
                $_SESSION['nome'] = $nome;

                header("location: welcome.php");
            } else {
                echo "Senha incorreta!;"
            }
        } else {
        echo "Nenhum usuário encontrado com esse nome!"
        }
        $stmt->close();
    }
}

$conn->close();
?>