<?php
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <title>Tabela Marca</title>
</head>

<body>
    <div class="container">
        <h1>Ver Marca!</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Marca</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM marca";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['marca'] . "</td>";
                        echo "<td>";
                        echo "<a href='excluirMarca.php?id=" .$row['id']."'class='botaoExcluir' onclick='return confirm(\"Deseja excluir a marca?\")'> Excluir </a>";
                        echo "<a href='editarMarca.php?id=" .$row['id']."'class='botaoEditar' '> Editar </a>";
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