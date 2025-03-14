<?php
//parametros de conexao
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vendas";

/* configuraçoes para conexao de banco de dados*/

//criando conexão com o bando ucando a classe pdo
//pdo (php data object): classe para manipulação de banco de dador


$conexao = new PDO(
    "mysql:host=$servidor;dbname=$banco;charset=utf8",
    $usuario, $senha
)
?>