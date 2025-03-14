<?php
require_once "conecta.php";
//logica/funcoes para o CRUD de fabricantes

//listarFabricant: usada pela pagina fabricantesp

function listarFabricantes(PDO $conexao):array {

    $sql =" SELECT * FROM fabricantes";

    $consulta = $conexao->prepare($sql);

    $consulta->execute();

    return $consulta->fetchAll(PDO::FETCH_ASSOC);
};

?>