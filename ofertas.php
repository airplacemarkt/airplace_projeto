<?php
session_start();
// Verifica se o usuário está logado
if (!isset($_SESSION['nome'])) { // Altere 'nome' para a chave que você usa para armazenar os dados de login
    header("Location: login.html"); // Redireciona para a página de login
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ofertas</title>
    <link rel="stylesheet" href="estilos_/style_ofertas.css">
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
                       <li><a href="cupons.php">Cupons</a></li>
                       <li><a href="drones.php">Conheça nossos Drones</a></li>
                       <li><a href="airplay.php">Air Play</a></li>
               </ul>
           </nav>
       </header>
       <div class="linha-laranja"></div>
    <main class="main_cupom">
        <div class="titulo_main_cupom">
            <h1>OFERTAS</h1>
            <img class="img_cupom_white" src="imagens_/img_cupom_white.png" alt="">
            <p class="p_cupom">MELHORES PREÇOS DECOLANDO!!</p>
            <img class="logo_main" src="imagens_/logo_drone_white.png" alt="">
        </div>
    </main>

    
    <div class="conteudo">
        <!-- Botão para abrir o menu de filtros no mobile -->
        <button class="btn-filtros" onclick="toggleFiltros()">Filtros</button>
    
        <!-- Barra lateral de filtros -->
        <aside class="filtros">
            <h2>Filtrar por:</h2>
    
            <!-- Filtro de categoria -->
            <div class="filtro-categoria">
                <h3>Categoria</h3>
                <ul>
                    <li>
                        <input type="checkbox" id="drones" name="categoria">
                        <label for="drones">Drones</label>
                    </li>
                    <li>
                        <input type="checkbox" id="acessorios" name="categoria">
                        <label for="acessorios">Acessórios</label>
                    </li>
                    <li>
                        <input type="checkbox" id="servicos" name="categoria">
                        <label for="servicos">Celulares</label>
                    </li>
                </ul>
            </div>
    
            <!-- Filtro de preço -->
            <div class="filtro-preco">
                <h3>Faixa de Preço</h3>
                <input type="range" min="0" max="1000" value="500" class="slider" id="preco">
                <p>Até <span id="valor-preco">R$500,00</span></p>
            </div>
    
            <!-- Filtro de avaliação -->
            <div class="filtro-avaliacao">
                <h3>Avaliação</h3>
                <ul>
                    <li>
                        <input type="radio" id="5estrelas" name="avaliacao">
                        <label for="5estrelas">5 Estrelas</label>
                    </li>
                    <li>
                        <input type="radio" id="4estrelas" name="avaliacao">
                        <label for="4estrelas">4 Estrelas ou mais</label>
                    </li>
                    <li>
                        <input type="radio" id="3estrelas" name="avaliacao">
                        <label for="3estrelas">3 Estrelas ou mais</label>
                    </li>
                </ul>
            </div>
        </aside>
    
        <!-- Área de ofertas -->
        <div class="ofertas-container">
        <div class="card-oferta">
                <img src="imagens/celular_ofertas.webp" alt="Oferta 1">
                <h2><strong>Galaxy S23</strong></h2>
                <p>Smartphone Samsung Galaxy S23 256GB Preto 5G 8GB RAM 6,1” Câm Tripla + Selfie 12MP.</p>
                <p class="preco"><span>R$2.000,00</span> R$1.800,00</p>
                <button class="btn-comprar">Comprar Agora</button>
            </div>
    
            <div class="card-oferta">
                <img src="imagens/drone_ofertas.webp" alt="Oferta 2">
                <h2>DRONE E99 Pro</h2>
                <p>Drone E99 Pro com câmera filma e tira foto + bolsa transporte drone iniciantes - importando no brasil</p>
                <p class="preco"><span>R$289,00</span> R$150,00</p>
                <button class="btn-comprar">Comprar Agora</button>
            </div>
    
            <div class="card-oferta">
                <img src="imagens/drone_infantil.webp" alt="Oferta 3">
                <h2>Drone Infantil</h2>
                <p>Drone Infantil Polibrinq - Ufo da Polibrinq realiza manobras 360o graus.</p>
                <p class="preco"><span>R$ 399,99</span> R$ 220,00</p>
                <button class="btn-comprar">Comprar Agora</button>
            </div>


            <div class="card-oferta">
                <img src="imagens/cabo_drone.jpg" alt="Oferta 4">
                <h2>Cabo Flat</h2>
                <p>Cabo Flat para Gimbal do Drone Dji Phantom 4 (1ª versão )</p>
                <p class="preco"><span>R$ 299,00</span> R$278,00 á vista</p>
                <button class="btn-comprar">Comprar Agora</button>
            </div>

            <div class="card-oferta">
                <img src="imagens/contorladora_drones.webp" alt="Oferta 5">
                <h2>Controladora de Vôo</h2>
                <p>Controladora de Vôo para Drones Pixhawk 2.1 Cube + Módulo Here 2 GPS/GNSS/ RTK (Precisão Centimétrica)</p>
                <p class="preco"><span>R$ 12.900,00 </span> R$ 11.500,00</p>
                <button class="btn-comprar">Comprar Agora</button>
            </div>

            <div class="card-oferta">
                <img src="imagens/drone_point.jpg" alt="Oferta 6">
                <h2>Drone Point </h2>
                <p>Drone Point Landing Pad 75cm</p>
                <p class="preco"><span>R$299,00</span> R$220,00</p>
                <button class="btn-comprar">Comprar Agora</button>
            </div>

            <div class="card-oferta">
                <img src="imagens/carregador_drone.jpg" alt="Oferta 7">
                <h2>Carregador de Drone</h2>
                <p>Hub Carregador Múltiplo de Baterias para Drone DJI Phantom 4 Advanced/Pro/Pro+</p>
                <p class="preco"><span>R$790,00</span> R$700,00</p>
                <button class="btn-comprar">Comprar Agora</button>
            </div>

            <div class="card-oferta">
                <img src="imagens/drone_xaiomi.webp" alt="Oferta 8">
                <h2>Drone Xiaomi Fimi X8</h2>
                <p>Drone Xiaomi Fimi X8 Mini - Câmera 12MP 4K - Alcance de 8 Km - Até 30 minutos de Vôo </p>
                <p class="preco"><span>R$ 3.499,00</span> R$2.999,00</p>
                <button class="btn-comprar">Comprar Agora</button>
            </div>
        </div>
    </div>
    


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