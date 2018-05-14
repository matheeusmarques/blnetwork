<?php
require_once "../DAO/DAOCidade.php";
require_once "../modelo/Cidade.php";
require_once "../DAO/mySQL.class.php";

$daoCidade = new DAOCidade();
$cidade = new Cidade();

try {
    $cidade->setID($_POST['id']);
    $cidade->setNome($_POST['nome']);
    $cidade->setIdEstado($_POST['estadoid']);
    $daoCidade->queryUpdate($cidade);
    header("Location: http://localhost/admin/cidade_lista.php?status=updated");
} catch (Exception $e) {

}

?>
