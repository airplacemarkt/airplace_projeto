CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, password) VALUES ('João Silva', 'joao.silva@example.com', 'senha123');
INSERT INTO users (name, email, password) VALUES ('Maria Oliveira', 'maria.oliveira@example.com', 'senha456');
INSERT INTO users (name, email, password) VALUES ('Carlos Pereira', 'carlos.pereira@example.com', 'senha789');


CREATE TABLE vendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(255) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    descricao TEXT NOT NULL,
    estoque INT NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO vendas (nome_produto, valor, descricao, estoque) VALUES ('Drone infantil', 500.00, 'Drone para +8', 100);
INSERT INTO vendas (nome_produto, valor, descricao, estoque) VALUES ('Carrinho de Controle Remoto', 300.00, 'Carrinho para +6', 50);
INSERT INTO vendas (nome_produto, valor, descricao, estoque) VALUES ('Bicicleta Infantil', 800.00, 'Bicicleta aro 20', 30);


CREATE TABLE IF NOT EXISTS comentarios (
    id_comentario INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_produto INT,
    texto_comentario TEXT NOT NULL,
    data_comentario DATE NOT NULL,
    FOREIGN KEY (id_usuario) REFERENCES users(id),
    FOREIGN KEY (id_produto) REFERENCES vendas(id)
);

INSERT INTO comentarios (id_usuario, id_produto, texto_comentario, data_comentario) VALUES (1, 1, 'Produto excelente, recomendo!', '2024-11-22');
INSERT INTO comentarios (id_usuario, id_produto, texto_comentario, data_comentario) VALUES (2, 2, 'Ótimo carrinho, meu filho adorou!', '2024-11-22');
INSERT INTO comentarios (id_usuario, id_produto, texto_comentario, data_comentario) VALUES (3, 3, 'Bicicleta robusta e segura!', '2024-11-22');


CREATE TABLE curtidas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_comentario INT NOT NULL,
    data_curtida TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (id_comentario) REFERENCES comentarios(id) ON DELETE CASCADE
);

INSERT INTO curtidas (id_usuario, id_comentario) VALUES (1, 1);
INSERT INTO curtidas (id_usuario, id_comentario) VALUES (2, 2);
INSERT INTO curtidas (id_usuario, id_comentario) VALUES (3, 3);


CREATE TABLE comprar (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_produto INT NOT NULL,
    quantidade INT NOT NULL,
    valor_total DECIMAL(10, 2) NOT NULL,
    data_compra TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (id_produto) REFERENCES vendas(id) ON DELETE CASCADE
);

INSERT INTO comprar (id_usuario, id_produto, quantidade, valor_total) VALUES (1, 1, 1, 500.00);
INSERT INTO comprar (id_usuario, id_produto, quantidade, valor_total) VALUES (2, 2, 2, 600.00);
INSERT INTO comprar (id_usuario, id_produto, quantidade, valor_total) VALUES (3, 3, 1, 800.00);
