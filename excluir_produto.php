<?php
session_start();
require_once 'conecta.php';

// Verifica se o ID do produto foi passado
if (isset($_GET['id'])) {
    $produto_id = $_GET['id'];
    $user_id = $_SESSION['user_id']; // Confirma que o produto pertence ao usuário logado

    try {
        // Deleta o produto do banco de dados
        $query = "DELETE FROM vendas WHERE id = :id AND user_id = :user_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':id', $produto_id, PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        // Redireciona de volta para a página "Meus Produtos"
        header("Location: meus_produtos.php");
        exit;
    } catch (PDOException $e) {
        echo "Erro ao excluir produto: " . $e->getMessage();
    }
} else {
    echo "Produto não encontrado.";
}
?>
