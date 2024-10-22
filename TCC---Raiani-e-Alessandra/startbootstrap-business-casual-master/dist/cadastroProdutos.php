<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"]== "POST") {
    $tipo = $_POST ['tipo'];
    $descricao = $_POST ['descricao'];
    $aro = $_POST ['aro'];
    $preco = $_POST ['preco'];
    $marca = $_POST ['marca'];
    
    $sql = "INSERT INTO produto (id_tipo, descricao, aro, preco, id_marca) VALUES (?,?,?,?,?)";

if ($stmt = $conn->prepare($sql)){
    $stmt->bind_param("isidi", $tipo, $descricao, $aro, $preco, $marca);
    if($stmt->execute()){
        echo "Novo produto cadastrado com sucesso.";
    } else {
echo "Erro: " . $stmt->error;
    }
    $stmt->close();
}
}
$conn->close();
header(header: "Location: ./cadastroProduto.php");
?>
