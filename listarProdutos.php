<?php
require_once 'header.php';
?>

<main role="main" class="flex-shrink-0">
  <div class="container">
    <br>
    <h3 class="mt-5">Listagem de Produtos</h3>
    <?php
    //Credenciais para conexão com o Banco
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'crudproduto';

    //Abre conexão com o MySQL   
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$conn) {
      die('Falha ao conectar com o MySQL: ' . mysqli_connect_error());
    }
    //echo '<br>Conexão ao Banco realizada com Sucesso.';

    $sql = 'SELECT * FROM Produto';
    $result = mysqli_query($conn, $sql); //A query seleciona as linhas da Tabela

    if (mysqli_num_rows($result) > 0) {
      echo '<div class="table-responsive">';
      echo '  <table class="table table-bordered table-hover table-sm">';
      echo '    <thead >';
      echo '      <tr style="background-color: #bee5eb;">';
      echo '        <th style="background-color: #bee5eb;">Id</th>';
      echo '        <th style="background-color: #bee5eb;">Nome</th>';
      echo '        <th style="background-color: #bee5eb;">Descrição</th>';
      echo '        <th style="background-color: #bee5eb;">Preço</th>';
      echo '        <th style="background-color: #bee5eb;">Qtde.</th>';
      echo '        <th style="background-color: #bee5eb;">Cadastro</th>';
      echo '        <th style="background-color: #bee5eb;"></th>';
      echo '      </tr>';
      echo '    </thead>';
      echo '    <tbody>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '  <td>' . $row['id'] . '</td>';
        echo '  <td>' . $row['nome'] . '</td>';
        echo '  <td>' . $row['descricao'] . '</td>';
        echo '  <td>' . $row['preco'] . '</td>';
        echo '  <td>' . $row['quantidade'] . '</td>';
        echo '  <td>' . $row['dataCadastro'] . '</td>';
        echo '  <td><a href="http://localhost/CRUD-Produto/editarFornecedor.php?id=' . $row['id'] . '" class="btn btn-primary">Editar</a>
          <a href="http://localhost/CRUD-Produto/excluirFornecedor.php?id=' . $row['id'] . '" class="btn btn-danger">Excluir</a>
        </td>';
        echo '</tr>';
      }
      echo '    </tbody>';
      echo '  </table>';
      echo '</div>';
    } else {
      echo "Nenhum Produto Encontrado.";
    }


    //Fecha  a conexão
    mysqli_close($conn);
    ?>

  </div>
</main>

<?php
require_once 'footer.php';
