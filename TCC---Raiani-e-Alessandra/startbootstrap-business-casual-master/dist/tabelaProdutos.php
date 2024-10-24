<?php
include 'db_connection.php';
 $tipos = array("Pneu de Carro", "Pneu de Moto", "Camara de ar para moto")
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <title>Tabela Produtos</title>
</head>

<body>
    <div class="container">
        <h1>Ver Produtos!</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Aro</th>
                    <th>Preço</th>
                    <th>Marca</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT p.*, m.marca, t.tipo FROM produto p join marca m on p.id_marca = m.id join tipo t on p.id_tipo = t.id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['tipo']. "</td>";
                        echo "<td>" . $row['descricao'] . "</td>";
                        echo "<td>" . $row['aro'] . "</td>";
                        echo "<td>" . $row['preco'] . "</td>";
                        echo "<td>". $row['marca'] . "</td>";  
                        echo "<td>";
                        echo "<a href='excluirProduto.php?id=" .$row['id']."'class='botaoExcluir' onclick='return confirm(\"Deseja excluir o produto?\")'> Excluir </a>";
                        echo "<a href='editarProduto.php?id=" .$row['id']."'class='botaoEditar''> Editar </a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Não foi encontrado nenhum produto!</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <div class="mt-3">
            <a href="cadastroProduto.php" class="btn btn-primary">Voltar para o cadastro!</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>