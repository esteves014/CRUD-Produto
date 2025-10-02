<?php
require_once 'header.php';
?>

<main class="flex-shrink-0">
    <div class="container">
        <h1 class="mt-5">Consultar Fornecedor</h1>

        <div class="container">
            <form class="d-flex" method="get" role="search">
                <input class="form-control me-2" type="search" name="nome" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <?php
        if (isset($_GET['nome'])) {

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

            $nome = $_GET['nome'];
            $sql = "SELECT * FROM fornecedores WHERE nome LIKE '%$nome%'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo '<div class="table-responsive mt-5">';
                echo ' <table class="table table-bordered table-hover table-sm">';
                echo ' <thead>';
                echo ' <tr style="background-color: #bee5eb;">';
                echo ' <th style="background-color: #bee5eb;">Id</th>';
                echo ' <th style="background-color: #bee5eb;">Nome</th>';
                echo ' <th style="background-color: #bee5eb;">Site</th>';
                echo ' <th style="background-color: #bee5eb;">UF</th>';
                echo ' <th style="background-color: #bee5eb;">Email</th>';
                echo ' <th style="background-color: #bee5eb;"></th>';
                echo ' </tr>';
                echo ' </thead>';
                echo ' <tbody>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo ' <td>' . $row['id'] . '</td>';
                    echo ' <td>' . $row['nome'] . '</td>';
                    echo ' <td>' . $row['site'] . '</td>';
                    echo ' <td>' . $row['uf'] . '</td>';
                    echo ' <td>' . $row['email'] . '</td>';
                    echo ' <td><a href="http://localhost/CRUD-Produto/editarFornecedor.php?id=' . $row['id'] . '" class="btn btn-primary">Editar</a>
                            <a href="http://localhost/CRUD-Produto/excluirFornecedor.php?id=' . $row['id'] . '" class="btn btn-danger">Excluir</a>
                        </td>';
                    echo '</tr>';
                }
                echo ' </tbody>';
                echo ' </table>';
                echo '</div>';
            }
        } else {
            echo "Nenhum Fornecedor Encontrado.";
        }
        ?>
    </div>
</main>

<?php
require_once 'footer.php';
