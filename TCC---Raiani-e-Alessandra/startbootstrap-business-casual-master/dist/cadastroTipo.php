<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $tipo = $_POST ['tipo'];
    
    $sql = "INSERT INTO tipo (tipo) VALUES (?)";

if ($stmt = $conn->prepare($sql)){
    $stmt->bind_param("s", $tipo);
    if($stmt->execute()){
        echo "Novo tipo cadastrado com sucesso.";
    } else {
echo "Erro: " . $stmt->error;
    }
    $stmt->close();
}
}
$conn->close();
header(header: "Location: ./cadastroProduto.php");
?>