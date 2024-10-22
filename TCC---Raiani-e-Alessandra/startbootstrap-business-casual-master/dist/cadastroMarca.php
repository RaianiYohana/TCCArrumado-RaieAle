<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $marca = $_POST ['marca'];
    
    $sql = "INSERT INTO marca (marca) VALUES (?)";

if ($stmt = $conn->prepare($sql)){
    $stmt->bind_param("s", $marca);
    if($stmt->execute()){
        echo "Nova marca cadastrada com sucesso.";
    } else {
echo "Erro: " . $stmt->error;
    }
    $stmt->close();
}
}
$conn->close();
header(header: "Location: ./cadastroProduto.php");
?>