<?php
session_start();
require_once 'conecta.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $produto_id = $_POST['id'];
    $user_id = $_SESSION['user_id'];
    $nome_produto = $_POST['nome_produto'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $estoque = $_POST['estoque'];

    try {
        // Atualiza os dados do produto no banco
        $query = "UPDATE vendas SET nome_produto = :nome_produto, valor = :valor, descricao = :descricao, estoque = :estoque WHERE id = :id AND user_id = :user_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':nome_produto', $nome_produto);
        $stmt->bindValue(':valor', $valor);
        $stmt->bindValue(':descricao', $descricao);
        $stmt->bindValue(':estoque', $estoque);
        $stmt->bindValue(':id', $produto_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        // Redireciona de volta para a página "Meus Produtos"
        header("Location: meus_produtos.php");
        exit;
    } catch (PDOException $e) {
        echo "Erro ao atualizar produto: " . $e->getMessage();
    }
} else {
    echo "Requisição inválida.";
}
?>
