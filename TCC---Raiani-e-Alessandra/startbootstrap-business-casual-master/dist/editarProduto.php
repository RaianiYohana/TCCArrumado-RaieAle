<?php
include 'db_connection.php';

$id = $_GET['id'];

$produto = $conn->query("SELECT p.*, m.marca, t.tipo FROM produto p join marca m on p.id_marca = m.id join tipo t on p.id_tipo = t.id where p.id = $id")->fetch_assoc();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $tipo = $_POST['tipo'];
    $descricao = $_POST [ 'descricao'];
    $aro = $_POST ['aro'];
    $preco = $_POST ['preco'];
    $marca = $_POST ['marca'];

    $sql = "UPDATE produto SET  id_tipo='$tipo', descricao='$descricao', aro='$aro', preco='$preco', id_marca='$marca' WHERE id=$id";

if($conn->query(query: $sql) === TRUE){
header(header: "Location: ./tabelaProdutos.php");

} else {
    echo "Erro ao editar o produto" .$sconn->error;
}
$conn->close();
}

$sql = "SELECT * FROM marca";
$marcas = $conn->query($sql);
$sql = "SELECT * FROM tipo";
$tipo = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cadastroProduto.css">
</head>
<body>
    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Edição de Produtos</h4>
            <p class="text-center">Insira os detalhes do produto abaixo</p>
            <form method="post">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-tag"></i> </span>
                    </div>
                    <select name="tipo" class="form-control"  >
                        <option value="" selected disabled>Selecione o Tipo do Produto</option>
                        <?php  if ($tipo->num_rows > 0) {
                    while ($row = $tipo->fetch_assoc()) {  ?>
                    <option value="<?php echo $row['id'] ?>" <?php if($row['id']==$produto['id_tipo']){echo "selected";} ?>><?php echo $row['tipo'] ?></option>
                    <?php } } ?>
                    </select>
                    </select>
                </div> 
                
                <!-- Descrição Input -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-info-circle"></i> </span>
                    </div>
                    <input name="descricao" class="form-control" placeholder="Descrição do Produto" value="<?php echo $produto['descricao']?>" type="text">
                </div> <!-- form-group// -->
                
                <!-- Aro Input -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-circle"></i> </span>
                    </div>
                    <input name="aro" class="form-control" placeholder="Aro do Produto" value="<?php echo $produto['aro']?>" type="text">
                </div> <!-- form-group// -->
                
                <!-- Preço Input -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-dollar-sign"></i> </span>
                    </div>
                    <input name="preco" class="form-control" placeholder="Preço do Produto" value="<?php echo $produto['preco']?>" type="text">
                </div> 
                
                
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-briefcase"></i> </span>
                    </div>
                    <select name="marca" class="form-control">
                    <option value="" selected disabled>Selecione a Marca do Produto</option>
                        <?php  if ($marcas->num_rows > 0) {
                    while ($row = $marcas->fetch_assoc()) {  ?>
                    <option value="<?php echo $row['id'] ?>"  <?php if($row['id']==$produto['id_marca']){echo "selected";} ?>><?php echo $row['marca'] ?></option>
                    <?php } } ?>
                    </select>
                </div> 
                
             
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Editar Produto </button>
                </div>     
            </form>
        </article>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
