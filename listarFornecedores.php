<?php
require_once 'header.php';
?>

<main role="main" class="flex-shrink-0">
  <div class="container">
    <br>
    <h3 class="mt-5">Listagem de Fornecedores</h3>
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

    $total_reg = "1"; // número de registros por página
    if (!isset($_GET['pagina'])) {
      $pc = 1;
    } else {
      $pc = $_GET['pagina'];
    }

    $inicio = $pc - 1;
    $inicio = $inicio * $total_reg;

    $sql = "SELECT * FROM fornecedores LIMIT $inicio, $total_reg";
    $result = mysqli_query($conn, $sql); //A query seleciona as linhas da Tabela
    $tr = mysqli_num_rows($result); // verifica o número total de registros
    $tp = $tr / $total_reg + 1; // verifica o número total de páginas

    if (mysqli_num_rows($result) > 0) {
      echo '<div class="table-responsive">';
      echo '  <table class="table table-bordered table-hover table-sm">';
      echo '    <thead >';
      echo '      <tr style="background-color: #bee5eb;">';
      echo '        <th style="background-color: #bee5eb;">Id</th>';
      echo '        <th style="background-color: #bee5eb;">Nome</th>';
      echo '        <th style="background-color: #bee5eb;">Site</th>';
      echo '        <th style="background-color: #bee5eb;">UF</th>';
      echo '        <th style="background-color: #bee5eb;">Email</th>';
      echo '        <th style="background-color: #bee5eb;"></th>';
      echo '      </tr>';
      echo '    </thead>';
      echo '    <tbody>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '  <td>' . $row['id'] . '</td>';
        echo '  <td>' . $row['nome'] . '</td>';
        echo '  <td>' . $row['site'] . '</td>';
        echo '  <td>' . $row['uf'] . '</td>';
        echo '  <td>' . $row['email'] . '</td>';
        echo '  <td><a href="http://localhost/CRUD-Produto/editarFornecedor.php?id=' . $row['id'] . '" class="btn btn-primary">Editar</a>
          <a href="http://localhost/CRUD-Produto/excluirFornecedor.php?id=' . $row['id'] . '" class="btn btn-danger">Excluir</a>
        </td>';
        echo '</tr>';
      }
      echo '    </tbody>';
      echo '  </table>';
      echo '</div>';
      $anterior = $pc - 1;
      $proximo = $pc + 1;
    ?>
      <nav aria-label="...">
        <ul class="pagination">
          <li class="page-item" <?php if ($pc == 1) echo "disabled"; ?>><a href='?pagina=<?php echo $anterior ?>' class="page-link">Previous</a></li>
          <li class="page-item" <?php if ($pc < $tp) echo "disabled"; ?>><a class="page-link" href='?pagina=<?php echo $proximo ?>'>Next</a></li>
        </ul>
      </nav>
    <?php
    } else {
      echo "Nenhum Fornecedor Encontrado.";
    }


    //Fecha  a conexão
    mysqli_close($conn);
    ?>

  </div>
</main>

<?php
require_once 'footer.php';
