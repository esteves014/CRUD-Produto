<?php

session_start();
include_once 'sanitizar.php';

//Sanitização dos dados do Formulário
$dadosform = sanitizar($_POST);

//Se passou pela validação sem erros, continua aqui

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

//$sql = "INSERT INTO Produto(nome,descricao,preco,quantidade) VALUES('".$dadosform["nome"]."','".$dadosform["descricao"]."','".$dadosform["preco"]."','".$dadosform["quantidade"]."')";

$nome = $dadosform["nome"];
$site = $dadosform["site"];
$uf = $dadosform["uf"];
$email = $dadosform["email"];
$id = $_GET['id'];

$sql = "UPDATE fornecedores SET nome = '$nome', site = '$site', uf = '$uf', email = '$email' WHERE id = '$id'";
$result = mysqli_query($conn, $sql); //A query seleciona as linhas da Tabela

if (mysqli_affected_rows($conn) != 0) {
    header('Location:listarFornecedores.php');
} else {
    header('Location:editarFornecedor.php?id=' . $id);
}

$conn->close(); //Fecha a conexão com o Banco