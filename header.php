<!doctype html>
<html lang="pt-br" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD-Produto</title>
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/navbar.css">
</head>

<body class="d-flex flex-column h-100">
  <header> <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">CRUD-Produto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item"> <a class="nav-link" href="index.php">Home</a> </li>
            <li class="nav-item"> <a class="nav-link" href="listarProdutos.php">Listar Produtos</a> </li>
            <li class="nav-item"> <a class="nav-link" href="cadastrarProdutos.php">Cadastrar Produto</a> </li>
            <li class="nav-item"> <a class="nav-link" href="listarFornecedores.php">Listar Fornecedores</a> </li>
            <li class="nav-item"> <a class="nav-link" href="cadastrarFornecedores.php">Cadastrar Fornecedores</a> </li>
            <li class="nav-item"> <a class="nav-link" href="consultarFornecedor.php">Consultar Fornecedores</a> </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>