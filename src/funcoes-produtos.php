<?php
require_once "conecta.php";

function listarProdutos(PDO $conexao):array {
   // $sql = "SELECT * FROM produtos";
   $sql= "SELECT
       produtos.id,produtos.nome AS produto,
       produtos.preco,produtos.quantidade,
       fabricantes.nome AS fabricante
       FROM produtos INNER JOIN fabricantes 
       ON produtos.fabricante_id = fabricantes.id
       ORDER BY produto";
       
    

    try {
        $consulta =$conexao-> prepare($sql);
        $consulta -> execute();
        return $consulta -> fetchAll(PDO::FETCH_ASSOC);

    }catch (Exception $erro){
        die ("Erro ao carregar produtos".$erro->getMessage());
    }
}

function inserirProduto(
    PDO $conexao, string $nome, float $preco, int $quantidade, int $ideFabricante, string $descricao
):void {
    $sql = "INSERT INTO produtos(nome,preco,quantidade,fabricante_id,descricao) VALUES(:nome,:preco,:quantidade,:fabricante_id,:descricao)";
    try {
          $consulta = $conexao->prepare($sql);                 
          $consulta->bindValue(":nome,:preco,:quantidade,:fabricante_id,:descricao",PDO::PARAM_STR);
          $consulta->execute();
       } catch (Exception $erro) {
          die("erro ao inserir".$erro->getMessage());
       }
}