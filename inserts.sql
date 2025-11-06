USE cozinha;

INSERT INTO perfil (nome, nome_perfil, senha, email) VALUES
('Carlos Mendes', 'carlitos', 'senha321', 'carlos@gmail.com'),
('Juliana Rocha', 'ju_rocha', 'senhaabc', 'juliana@gmail.com'),
('Ricardo Lima', 'rickychef', 'senha2024', 'ricardo@gmail.com'),
('Patrícia Alves', 'patycozinha', 'pat123', 'patricia@gmail.com'),
('Marcos Paulo', 'marquinhos', 'senha3214', 'marcos@gmail.com'),
('Fernanda Dias', 'nanda.d', 'segredo789', 'fernanda@gmail.com'),
('Lucas Martins', 'lucasm', '123lucas', 'lucas@gmail.com'),
('Aline Souza', 'alinechef', 'alinesegura', 'aline@gmail.com'),
('Eduardo Pinto', 'edu_p', 'edu123', 'eduardo@gmail.com'),
('Camila Farias', 'camif', 'camila2024', 'camila@gmail.com');
('Alana Eduarda', 'ai7lana', '$2y$10$VrD1j0LDGp8ODJa5/QvDgOK8eIPHh5M0CqqW3xYZ9wWyx2YrGwqWi', 'alana@gmail.com');
('Apollo', 'ap00l', '$2y$10$KZF/5mYeueSdFspYKgHciePydUMOnZsi04wmp3gLcEebBN9NIFOFS', 'apollo@gmail.com');


INSERT INTO receita (nome_comida, tipo, ingredientes, modo_de_preparo, tempo, rendimento, foto, regiao, perfil_idperfil) VALUES
('Moqueca Baiana', 'Almoço', 'Peixe, pimentão, cebola, coentro, leite de coco', 'Cozinhe todos os ingredientes em panela de barro...', '1h', '4 porções', 'moqueca.jpg', 'Nordeste', 4),
('Pão de Queijo', 'Lanche', 'Polvilho, queijo, leite, óleo, ovos', 'Misture tudo e asse em forno médio...', '45min', '20 unidades', 'paodequeijo.jpg', 'Sudeste', 5),
('Cuscuz Nordestino', 'Café da manhã', 'Flocão de milho, água, sal', 'Hidrate o flocão e cozinhe em cuscuzeira...', '20min', '3 porções', 'cuscuz.jpg', 'Nordeste', 6),
('Vatapá', 'Jantar', 'Pão, leite de coco, azeite de dendê, camarão', 'Misture tudo e cozinhe até engrossar...', '1h30min', '5 porções', 'vatapa.jpg', 'Nordeste', 7),
('Canjica', 'Sobremesa', 'Milho branco, leite, leite condensado, coco', 'Cozinhe o milho e adicione os outros ingredientes...', '2h', '10 porções', 'canjica.jpg', 'Centro-Oeste', 8),
('Escondidinho de Carne', 'Jantar', 'Carne moída, purê de batata, queijo', 'Monte camadas e leve ao forno...', '1h', '6 porções', 'escondidinho.jpg', 'Sul', 9),
('Bolo de Cenoura', 'Sobremesa', 'Cenoura, farinha, açúcar, óleo, ovos', 'Bata tudo e asse por 40min...', '50min', '10 fatias', 'bolo_cenoura.jpg', 'Sudeste', 10),
('Açaí na Tigela', 'Lanche', 'Açaí, banana, granola, mel', 'Monte camadas e sirva gelado...', '10min', '1 porção', 'acai.jpg', 'Norte', 1),
('Empadão Goiano', 'Almoço', 'Frango, milho, palmito, massa podre', 'Recheie a massa e asse até dourar...', '1h30min', '8 pedaços', 'empadao.jpg', 'Centro-Oeste', 2),
('Tutu de Feijão', 'Almoço', 'Feijão, farinha de mandioca, alho, cebola', 'Misture o feijão com farinha e refogue...', '30min', '5 porções', 'tutu.jpg', 'Sudeste', 3);


INSERT INTO favoritos (perfil_idperfil, receita_idreceita) VALUES
(4, 1);
(5, 2);
(6, 3);
(7, 4);
(8, 5);
(9, 6);
(10, 7);
(1, 8);
(2, 9);
(3, 10);

INSERT INTO avaliacao (perfil_idperfil, receita_idreceita, comentario, nota) VALUES
(4, 1, 'Delicioso, bem temperado!', 5),
(5, 2, 'Muito fácil de fazer!', 4),
(6, 3, 'Receita prática do dia a dia.', 5),
(7, 4, 'Adorei o sabor e a textura.', 5),
(8, 5, 'Lembrou muito as festas juninas!', 4),
(9, 6, 'Recheio cremoso, ficou ótimo!', 5),
(10, 7, 'Cobertura perfeita!', 5),
(1, 8, 'Muito refrescante.', 4),
(2, 9, 'Bem recheado e saboroso.', 5),
(3, 10, 'Clássico mineiro bem feito!', 5);

