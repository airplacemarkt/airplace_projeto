<?php
session_start();
// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) { // Altere 'nome' para a chave que você usa para armazenar os dados de login
    header("Location: login.html"); // Redireciona para a página de login
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Anuncie no AirPlace</title>
        <link rel="stylesheet" href="estilos_/style_venda.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="estilos/style_carrossel.css">
        <style>
            .link_saudacao {
            color: white;
            text-decoration: none;
            font-weight: bolder;
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
                            <a href="meus_produtos.php" target="_blank"> Meus Produtos</a>
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

         <!-- Conteúdo Principal -->
         <main>
            <section class="product-form-section">
                <h2>Cadastro de Produto</h2>
                <p>Preencha as informações abaixo para cadastrar um novo produto.</p>
                
                <form id="signupForm" method="post" action="processa_venda.php">
                    <label for="nome_produto">Nome do Produto</label>
                    <input type="text" name="nome_produto" id="nome_produto" placeholder="Nome do produto" required>
                    
                    <label for="valor">Valor</label>
                    <input type="number" name="valor" id="valor" placeholder="Digite o preço do produto" required>
                    
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" placeholder="Descrição do produto" required> 
                    
                    <label for="estoque">Estoque</label>
                    <input type="number" name="estoque" id="estoque" placeholder="Descreva a quantidade em estoque" required>
                    
                    <button type="submit" class="btn-cadastrar">Cadastrar Produto</button>
                </form>
                
                
            </section>
        </main>

        
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

<script>
    // Funções para abrir e fechar o modal
    function abrirModal() {
        document.getElementById('modal-cadastrar-produto').style.display = 'block';
    }
    function fecharModal() {
        document.getElementById('modal-cadastrar-produto').style.display = 'none';
    }
</script>
</body>
</html>