<?php
require_once "conecta.php";
//logica/funcoes para o CRUD de fabricantes

//listarFabricant: usada pela pagina fabricantesp

function listarFabricantes(PDO $conexao):array {

    $sql =" SELECT * FROM fabricantes ORDER BY nome";

    try {
        
       $consulta = $conexao->prepare($sql);
       //executando banco de dados
       $consulta->execute();
       //buirca retorna todos os dados provenientes da execulção da consulta e os transforma em array associativo
       return $consulta->fetchAll(PDO::FETCH_ASSOC);
}
     catch(Exception $erro) {
        die ("erro:" . $erro -> getMessage());
    }
}
           //void indica que nao tem retorno
    function inserirFabricante(PDO $conexao, string $nomeDoFabricante):void{
        //named oarameter = parametro nomeado
        // usamos ese recurso do pdo para reservar um espaço seguro em memoria para colocação do dado. Nunca passe de forma direta valores para comandos sql
       $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";
       try {
          $consulta = $conexao->prepare($sql);
          //bindValue permite vincular o valor do parametro à consulta que sera executada. É necessario indicar qual o parametro (:nome), de onde vem o valor ($nomeDoFabricante) e de que tipo ele é (PDO:PARAM_STR)          
          $consulta->bindValue(":nome",$nomeDoFabricante,PDO::PARAM_STR);
          $consulta->execute();
       } catch (Exception $erro) {
          die("erro ao inserir".$erro->getMessage());
       }
    }

    

?>