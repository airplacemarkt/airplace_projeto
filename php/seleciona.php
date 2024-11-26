<?php

require_once 'conecta.php';

$query = "SELECT * FROM user";
$stmt = $pdo->prepare($query);
$stmt->execute();
while($result = $stmt->fetch()){
    echo 'id_user: ' . $result['id_user'] . '<br>';
    echo 'login: ' . $result['login'] . '<br>';
    echo 'senha: ' . $result['senha'] . '<br>';
    echo 'data: ' . $result['data'] . '<hr>';
}
$result = null;
$stmt = null;
$pdo = null;
?>