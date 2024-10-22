<?php
include 'db_connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM produto WHERE id=$id";
if($conn->query(query: $sql) === TRUE){
    echo "O produto foi excluído com sucesso!";
} else {
echo "Erro ao excluir o produto!" .$conn->error;
}  
$conn->close();
header(header: "Location:tabelaProdutos.php");