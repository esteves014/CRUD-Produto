<?php
session_start();
require_once 'header.php';
?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="mt-2">Cadastro de Produto</h1>
                <?php //Mensagens de Erro ou Sucesso na execução das funções              
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION["msg"];
                    unset($_SESSION["msg"]);
                }
                ?>

                <form action="http://localhost/CRUD-Produto/salvarFornecedor.php" method="post" id="formCadastro">
                    <div class="form-group">
                        <label for="nome">Nome do Fornecedor</label>
                        <input type="text" class="form-control" name="nome" value="<?php if (isset($_SESSION["form"]["nome"])) echo $_SESSION["form"]["nome"]; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="site">Site</label>
                        <textarea class="form-control" name="site"><?php if (isset($_SESSION["form"]["site"])) echo $_SESSION["form"]["site"]; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php if (isset($_SESSION["form"]["email"])) echo $_SESSION["form"]["email"]; ?>" required>
                    </div>

                    <div class="form-group mb-3">
                        <div class="form-group">
                            <label for="uf">UF</label>
                            <select class="form-select <?php if (isset($_SESSION["errouf"])) echo 'is-invalid'; ?>" id="uf" name="uf" required>
                                <option value="0" selected disabled>Selecione um Estado</option>
                                <option <?php if (isset($_SESSION["form"]["uf"])) if($_SESSION["form"]["uf"] == "SP") echo "selected"; ?> value="SP">São Paulo</option>
                                <option <?php if (isset($_SESSION["form"]["uf"])) if($_SESSION["form"]["uf"] == "RJ") echo "selected"; ?> value="RJ">Rio de Janeiro</option>
                                <option <?php if (isset($_SESSION["form"]["uf"])) if($_SESSION["form"]["uf"] == "AM") echo "selected"; ?> value="AM">Amazonas</option>
                            </select>
                        </div>
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
