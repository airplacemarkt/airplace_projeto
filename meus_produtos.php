<?php
session_start();
// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) { // Altere 'nome' para a chave que você usa para armazenar os dados de login
    header("Location: login.html"); // Redireciona para a página de login
    exit();
}
require_once 'conecta.php';

$user_id = $_SESSION['user_id']; // Pega o ID do usuário logado

try {
    $query = "SELECT * FROM vendas WHERE user_id = :user_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':user_id', $user_id);
    $stmt->execute();

    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao carregar produtos: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Meus produtos</title>
        <link rel="stylesheet" href="estilos_/meus_produtos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <style>
            .link_saudacao {
            color: white;
            text-decoration: none;
            font-weight: bolder;
        }

        .btn-editar, .btn-excluir {
    display: inline-block;
    padding: 10px 15px;
    margin: 5px;
    text-decoration: none;
    color: white;
    border-radius: 5px;
    font-size: 14px;
    text-align: center;
}

.btn-editar {
    background-color: #2A0088;
}

.btn-excluir {
    background-color: #FF0000;
}

.btn-adc {
    background-color: green;
}


        </style>
    </head>
<body>
<header>
         <div class="header-container">
                <div class="logo">
                    <img src="imagens_/drone_banner_white.png" alt="Logo AirPlace">
                </div>

                <div class="search-bar">
                    <input type="text" placeholder="BUSQUE NO AIRPLACE">
                    <button><i class="fas fa-search"></i></button>
                    <a href="venda.php"><button class="btn-vender">Vender</button></a>
                </div>
                <div class="right-info">
                    <div class="right-top">
                        <div class="icon">
                            <span class="location-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        </div>
                        <div class="text-enter">
                            <p>Drones disponíveis na</br> minha região</p>
                        </div>
                    </div>
                    <div class="div_icones" class="dropdown">
                        <p class="icone_carrinho"><i class="fas fa-shopping-cart"></i></p>
                       <div class="dropdown">
                        <a href=""><i class="fas fa-user-circle" id="icone_perfil"></i></a>
                        <a class="link_saudacao" href="#login">Olá, <?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Visitante'; ?></a>
                        <div class="dropdown-content">
                            <a href="logout.php" class="btn_sair">Sair</a>
                        </div>
                    </div>

                   </div>
                    </div>
                </div>
            </div>
            <nav>
                <ul>
                       <li><a href="tela_inicial.php">Home</a></li>
                       <li><a href="sobrenos.php">Sobre nós</a></li>
                       <li><a href="ofertas.php">Ofertas</a></li>
                       <li><a href="cupons.php">Cupons</a></li>
                       <li><a href="drones.php">Conheça nossos Drones</a></li>
                       <li><a href="airplay.php">Air Play</a></li>
                </ul>
            </nav>

        </header>
        <div class="linha-laranja"></div>
        <h2 class="titulo-conteudo">Meus Produtos Cadastrados</h2>

<?php if (!empty($produtos)): ?>
    <ul class="lista-produtos">
    <?php foreach ($produtos as $produto): ?>
    <li class="item-produto">
        <h3 class="titulo-produto"><?php echo htmlspecialchars($produto['nome_produto']); ?></h3>
        <p class="detalhes-produto">Valor: R$<?php echo number_format($produto['valor'], 2, ',', '.'); ?></p>
        <p class="detalhes-produto">Descrição: <?php echo htmlspecialchars($produto['descricao']); ?></p>
        <p class="detalhes-produto">Estoque: <?php echo (int) $produto['estoque']; ?></p>
        <a href="editar_produto.php?id=<?php echo $produto['id']; ?>" class="btn-editar">Editar</a>
        <a href="excluir_produto.php?id=<?php echo $produto['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza que deseja excluir este produto?');">Excluir</a>
        <a href="venda.php" class="btn-adc">Adicionar</a>
        
        
    </li>
<?php endforeach; ?>

    </ul>
<?php else: ?>
    <p class="mensagem-nenhum-produto">Você ainda não cadastrou nenhum produto.</p>
<?php endif; ?>

<br>

<footer>
    <div class="footer-links">
        <ul>
            <li><a href="#">Trabalhe conosco</a></li>
            <li><a href="#">Termos e condições</a></li>
            <li><a href="#">Como cuidamos da sua privacidade</a></li>
            <li><a href="#">Contato</a></li>
        </ul>
    </div>
    <div class="footer-info">
        <p>CNPJ nº 00.000.000/0000-00 / Av. das Nações Unidas, nº 3.203, Bonfim, Osasco/SP - CEP 00000-000 - empresa do grupo AIR PLACE</p>
    </div>
</footer>

</body>
</html>
