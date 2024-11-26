<?php
require_once "conecta.php";

/*---- Cria tabela  ----*/
$query = "CREATE TABLE IF NOT EXISTS USER(
id_user INT not null primary key auto_increment, 
login varchar(100) not null, 
senha varchar(100) not null, 
data date)";
$pdo->exec($query);
echo "Tabela criada com sucesso!";
$pdo = null;//encerra a conexão com banco de dados
?>