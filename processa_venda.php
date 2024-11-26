<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redireciona para o login se não estiver logado
    exit;
}

// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'conecta.php';

    // Captura e sanitiza os dados do formulário
    $user_id = $_SESSION['user_id']; // Obtém o user_id da sessão
    $nome_produto = $_POST['nome_produto'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $estoque = $_POST['estoque'];

    // Validação básica dos dados (por exemplo, se o preço e o estoque são números válidos)
    if (!is_numeric($valor) || !is_numeric($estoque)) {
        echo "Valor e Estoque devem ser numéricos.";
        exit;
    }

    try {
        // Insere os dados na tabela de vendas, incluindo o user_id
        $query = "INSERT INTO vendas (user_id, nome_produto, valor, descricao, estoque) VALUES (:user_id, :nome_produto, :valor, :descricao, :estoque)";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':user_id', $user_id);
        $stmt->bindValue(':nome_produto', $nome_produto);
        $stmt->bindValue(':valor', $valor);
        $stmt->bindValue(':descricao', $descricao);
        $stmt->bindValue(':estoque', $estoque);
        $stmt->execute();

        // Redireciona para uma página de sucesso
        header("Location: venda_sucesso.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao cadastrar produto: " . $e->getMessage();
    }

    // Fecha a conexão
    $stmt = null;
    $pdo = null;
}
?>
