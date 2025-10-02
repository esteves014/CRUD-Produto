<?php

$id = $_GET['id'];

if (isset($id)) {
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

    $sql = "DELETE FROM fornecedores WHERE id = '$id'";
    $result = mysqli_query($conn, $sql); //A query seleciona as linhas da Tabela

    if (mysqli_affected_rows($conn) != 0) {
        header("Location:listarFornecedores.php");
    } else {
        header("Location:listarFornecedores.php");
    }

    $conn->close();
} else {
    header("Location:listarFornecedores.php");
}
