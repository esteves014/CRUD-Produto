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

    $total_reg = 1; // <--- AJUSTAR: QUANTOS ITENS POR PÁGINA

    // 1. Lógica da Página Atual
    $pc = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $inicio = ($pc - 1) * $total_reg;

    $sql_total = "SELECT COUNT(*) AS total FROM fornecedores";
    $result_total = mysqli_query($conn, $sql_total);
    $row_total = mysqli_fetch_assoc($result_total);
    $tr = $row_total['total']; // número total de registros

    $tp = ceil($tr / $total_reg); // número total de páginas

    $sql = "SELECT * FROM fornecedores LIMIT $inicio, $total_reg";
    $result = mysqli_query($conn, $sql);

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
      <nav aria-label="Navegação de Página">
        <ul class="pagination">
          <li class="page-item <?php echo ($pc <= 1) ? 'disabled' : ''; ?>">
            <a href="?pagina=<?php echo ($pc <= 1) ? 1 : $anterior; ?>" class="page-link">Previous</a>
          </li>
          <?php for ($i = 1; $i <= $tp; $i++) { ?>
            <li class="page-item <?php echo ($pc == $i) ? 'active' : ''; ?>">
              <a href="?pagina=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
            </li>
          <?php } ?>
          <li class="page-item <?php echo ($pc >= $tp) ? 'disabled' : ''; ?>">
            <a href="?pagina=<?php echo ($pc >= $tp) ? $tp : $proximo; ?>" class="page-link">Next</a>
          </li>
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
