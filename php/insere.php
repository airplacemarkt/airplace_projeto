<?php
echo count($_POST);
if(count($_POST)==0){
  include "form_insere.php";
  exit;
}
$login=$_POST["login"];
$senha=md5($_POST["senha"]);
$data=$_POST["data"];

require_once 'conecta.php';

$query = "insert into user (login, senha, data) values (:login, :senha,:data)";

$stmt = $pdo->prepare($query);

$stmt->bindValue(':login', $login);
$stmt->bindValue(':senha', $senha);
$stmt->bindValue(':data', $data);

$stmt->execute();
echo 'Quantidades de registros: ' . $stmt->rowCount() . '<br>';
echo 'ID do último registro inserido: ' . $pdo->lastInsertId();

$stmt = null;
$pdo = null;
?>