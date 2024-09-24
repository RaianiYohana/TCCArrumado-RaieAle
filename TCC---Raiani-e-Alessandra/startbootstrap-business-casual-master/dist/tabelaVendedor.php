<?php
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
    <title>Tabela Vendedor</title>
</head>

<body>
    <div class="container">
        <h1>Ver vendedor!</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Número de Telefone</th>
                    <th>Data Nascimento</th>
                    <th>Cnpj</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM usuario";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['telefone'] . "</td>";
                        echo "<td>" . $row['dataNascimento'] . "</td>";
                        echo "<td>". $row['cnpj'] . "</td>";
                        echo "<a href='excluir.php?id=" .$row['id']."'class='botaoExcluir' onclick='return confirm(\"Deseja excluir o vendedor?\")'> Excluir </a>";
                        echo "<a href='editarVendedor.php?id=" .$row['id']."'class='botaoEditar' '> Editar </a>";
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
            <a href="cadastro1.html" class="btn btn-primary">Voltar para o cadastro!</a>
        </div>
<br>
        <div class="botaoEditar">
            <a href="" class="btn btn-primary">Editar Vendedor</a>
        </div>
        <br>
        <div class="botaoExcluir">
            <a href="" class="btn btn-primary">Excluir Vendedor</a>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>