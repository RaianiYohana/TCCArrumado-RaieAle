<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST ['tipo'];
    $descricao = $_POST ['descricao'];
    $aro = $_POST ['aro'];
    $preco = $_POST ['preco'];
    $marca = $_POST ['marca'];
    
    $sql = "INSERT INTO produto (tipo, descricao, aro, preco, marca) VALUES (?,?,?,?,?)";

if ($stmt = $conn->prepare($sql)){
    $stmt->bind_param("ssss", $tipo, $descricao, $aro, $preco, $marca);
    if($stmt->execute()){
        echo "Novo produto cadastrado com sucesso.";
    } else {
echo "Erro: " . $stmt->error;
    }
    $stmt->close();
}
}

$conn->close();
?>
