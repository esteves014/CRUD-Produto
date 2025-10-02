<?php
require_once 'header.php';
?>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h1 class="mt-2">Cadastro de Produto</h1>
                <form action="http://localhost/CRUD-Produto/salvarFornecedor.php" method="post" id="formCadastro">
                    <div class="form-group">
                        <label for="nome">Nome do Fornecedor</label>
                        <input type="text" class="form-control" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="site">Site</label>
                        <input type="text" class="form-control" name="site" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="uf">UF</label>
                        <select class="form-select" id="uf" name="uf" required>
                            <option selected disabled>Selecione um Estado</option>
                            <option value="SP">São Paulo</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="AM">Amazonas</option>
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
