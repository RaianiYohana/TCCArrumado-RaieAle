<?php
include 'db_connection.php';
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
            <h4 class="card-title mt-3 text-center">Cadastro de Produtos</h4>
            <p class="text-center">Insira os detalhes do produto abaixo</p>
            <form action="cadastroProdutos.php" method="post">
                <!-- Tipo Select -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-tag"></i> </span>
                    </div>
                    <select name="tipo" class="form-control">
                        <option value="" selected disabled>Selecione o Tipo do Produto</option>
                        <?php  if ($tipo->num_rows > 0) {
                    while ($row = $tipo->fetch_assoc()) {  ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['tipo'] ?></option>
                    <?php } } ?>
                    </select>
                    </select>
                </div> <!-- form-group// -->
                
                <!-- Descrição Input -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-info-circle"></i> </span>
                    </div>
                    <input name="descricao" class="form-control" placeholder="Descrição do Produto" type="text">
                </div> <!-- form-group// -->
                
                <!-- Aro Input -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-circle"></i> </span>
                    </div>
                    <input name="aro" class="form-control" placeholder="Aro do Produto" type="text">
                </div> <!-- form-group// -->
                
                <!-- Preço Input -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-dollar-sign"></i> </span>
                    </div>
                    <input name="preco" class="form-control" placeholder="Preço do Produto" type="number" min="1" step="any" >
                </div> <!-- form-group// -->
                
                <!-- Marca Select -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-briefcase"></i> </span>
                    </div>
                    <select name="marca" class="form-control">
                        <option value="" selected disabled>Selecione a Marca do Produto</option>
                        <?php  if ($marcas->num_rows > 0) {
                    while ($row = $marcas->fetch_assoc()) {  ?>
                    <option value="<?php echo $row['id'] ?>"><?php echo $row['marca'] ?></option>
                    <?php } } ?>
                    </select>
                </div> <!-- form-group// -->
                
                <!-- Submit Button -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Cadastrar Produto </button>
                </div> <!-- form-group// -->            
                 <p class="text-center">Visualizar Produtos! <a href="tabelaProdutos.php">Tabela Produtos</a>  </p> 
                 <p class="text-center">Cadastrar marca! <a href="cadastroMarca.html">Cadastrar marca</a>  </p>  
                 <p class="text-center">Visualizar Tipo! <a href="cadastroTipo.html">Cadastrar tipo</a>  </p>  

                 <p class="text-center">Deseja sair? <a href="logout.php">Logout</a>  </p>                                                        
                                                      
            </form>
        </article>
    </div> <!-- card.// -->
	

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
