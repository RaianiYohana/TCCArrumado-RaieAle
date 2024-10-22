<?php
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <title>Tabela Tipo</title>
</head>

<body>
    <div class="container">
        <h1>Ver Tipo!</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                                     
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tipo";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['tipo'] . "</td>";
                        echo "<td>";
                        echo "<a href='excluirTipo.php?id=" .$row['id']."'class='botaoExcluir' onclick='return confirm(\"Deseja excluir o tipo?\")'> Excluir </a>";
                        echo "<a href='editarTipo.php?id=" .$row['id']."'class='botaoEditar' '> Editar </a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Não foi encontrado nenhum vendedor!</td></tr>";
                }
                ?>
            </tbody>
        </table>
        
        <div class="mt-3">
            <a href="cadastroProduto.html" class="btn btn-primary">Voltar para o cadastro!</a>
        </div>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>