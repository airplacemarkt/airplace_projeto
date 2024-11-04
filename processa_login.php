<?php
// Verifica se o formulário foi enviado via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta ao banco de dados
    require_once 'conecta.php';

    // Obtém os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara a consulta para buscar o usuário com o e-mail informado
    $query = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':email', $email);
    $stmt->execute();

    // Verifica se o usuário foi encontrado
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario) {
        // Verifica se a senha informada corresponde à senha armazenada
        if (password_verify($senha, $usuario['password'])) {
            // Se as credenciais estão corretas, inicia a sessão e redireciona o usuário
            session_start();
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['name'];
            header("Location: tela_inicial.html"); // Redireciona para a página desejada
            exit;
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "E-mail não encontrado!";
    }

    // Fecha a conexão
    $stmt = null;
    $pdo = null;
}

// Exibe a mensagem de erro, se houver
if (isset($erro)) {
    echo "<p style='color:red;'>$erro</p>";
}
?>
