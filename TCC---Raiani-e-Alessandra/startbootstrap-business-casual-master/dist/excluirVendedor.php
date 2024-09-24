<?php
include 'db_connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM usuario WHERE id=$id";
if($conn->query(query: $sql) === TRUE){
    echo "O vendedor foi excluído com sucesso!";
} else {
echo "Erro ao excluir o vendedor!" .$conn->error;
}  
$conn->close();
header(header: "Location: tabelaVendedor.php"); // se for excluído vai voltar para a tela de cadastro de vendedor