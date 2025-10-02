<?php
require_once 'header.php';
//Credenciais para conexão com o Banco
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpass = '';
$dbname = 'crudproduto';

//Abre conexão com o MySQL   
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die('Falha ao conectar com o MySQL: ' . $conn->connect_error);
}

//Altera a codificação de caracteres para utf8
$conn->set_charset("utf8");

$id = $_GET['id'];
$sql = "SELECT * FROM fornecedores WHERE id = '$id'";

$result = mysqli_query($conn, $sql); //A query seleciona as linhas da Tabela
$fornecedor = mysqli_fetch_assoc($result);
?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="mt-2">Editar Fornecedor</h1>
                <form action="http://localhost/CRUD-Produto/editarFornecedores.php?id=<?php echo $_GET['id']; ?>" method="post" id="formCadastro">
                    <div class="form-group">
                        <label for="nome">Nome do Fornecedor</label>
                        <input type="text" class="form-control" name="nome" value="<?php echo $fornecedor['nome']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="site">Site</label>
                        <input type="text" class="form-control" name="site" value="<?php echo $fornecedor['site']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $fornecedor['email']; ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="uf">UF</label>
                        <select class="form-select" id="uf" name="uf" required>
                            <option selected disabled>Selecione um Estado</option>
                            <option <?php if($fornecedor['uf'] == "SP") echo "selected"; ?> value="SP">São Paulo</option>
                            <option <?php if($fornecedor['uf'] == "RJ") echo "selected"; ?> value="RJ">Rio de Janeiro</option>
                            <option <?php if($fornecedor['uf'] == "AM") echo "selected"; ?> value="AM">Amazonas</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                </form>
            </div>
            <div class=" col-md-3"></div>
        </div>
    </div>
</main>

<?php
require_once 'footer.php';
