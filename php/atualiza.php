<?php

require_once 'conecta.php';

$query="update user set login=:login, senha=:senha, data=:data where id_user=:id_user";
$stmt = $pdo->prepare($query);

$stmt->bindValue(':login', 'root');
$stmt->bindValue(':senha', md5('root'));
$stmt->bindValue(':data', '2024-04-03');
$stmt->bindValue(':id_user', 1);

$stmt->execute();
echo 'Quantidades de registros: ' . $stmt->rowCount() . '<br />';

$stmt = null;
$pdo = null;

?>