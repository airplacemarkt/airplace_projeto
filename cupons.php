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
    <title>CUPONS AIR PLACE</title>
    <link rel="stylesheet" href="estilos_/style_cupons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
                       <li><a href="drones.php">Conheça nossos Drones</a></li>
                       <li><a href="airplay.php">Air Play</a></li>
               </ul>
           </nav>
       </header>
       <div class="linha-laranja"></div>
       
    <main class="main_cupom">
        <div class="titulo_main_cupom">
            <h1>CUPONS</h1>
            <img class="img_cupom_white" src="imagens_/img_cupom_white.png" alt="">
            <p class="p_cupom">VEJA QUAIS CUPONS ESTÃO DISPONÍVEIS</p>
            <img class="logo_main" src="imagens_/logo_drone_white.png" alt="">
        </div>
    </main>

    <section class="cupons-container">
        
        <div class="cupom">
            <img src="imagens_/logo_drone_black.png" alt="Frete Grátis">
            <h3>Frete grátis</h3>
            <p>Frete grátis com drones para primeira compra</p>
            <p>Válido apenas para primeira compra</p>
            <button>Aplicar</button>
        </div>
    
        <div class="cupom">
            <img src="imagens_/img_logocupom.png" alt="R$600 OFF para LG">
            <h3>R$400 OFF PARA SAMSUNG</h3>
            <p>Em produtos selecionados</p>
            <p>Compra mínima R$1.199</p>
            <button>Aplicar</button>
        </div>
        
    </section>
    <section class="cupons-container">
        <div class="cupom">
            <img src="imagens_/img_logocupom.png" alt="R$600 OFF para LG">
            <h3>R$600 OFF PARA LG</h3>
            <p>Em produtos selecionados <br>Compra mínima R$1.199
            </p>
            <button>Aplicar</button>
        </div>
        
    
        <div class="cupom">
            <img src="imagens_/img_logocupom.png" alt="R$600 OFF para LG">
            <h3>CASHBACK 20% - 1° COMPRA</h3>
            <p>Em produtos selecionados</p>
            <p>Válido até 23/10</p>
            <button>Aplicar</button>
        </div>
    </section>
    
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
