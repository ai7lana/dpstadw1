USE cozinha;
INSERT INTO perfil (nome, nome_perfil, senha, email) VALUES
('Maria Oliveira', 'maria123', 'senha123', 'maria@gmail.com'),
('João Silva', 'chefjoao', 'senha456', 'joao@gmail.com'),
('Ana Costa', 'aninha', 'senha789', 'ana@gmail.com');

INSERT INTO receita (nome_comida, tipo, ingredientes, modo_de_preparo, tempo, rendimento, foto, regiao, usuario_idusuario, perfil_idperfil) VALUES
('Feijoada', 'Almoço', 'Feijão preto, carne seca, linguiça, alho, cebola', 'Cozinhe o feijão e adicione as carnes...', '2h', '8 porções', 'feijoada.jpg', 'Sudeste', 1, 1),
('Tapioca', 'Café da manhã', 'Goma de tapioca, queijo coalho', 'Coloque a goma na frigideira, recheie com queijo...', '10min', '1 porção', 'tapioca.jpg', 'Nordeste', 2, 2),
('Brigadeiro', 'Sobremesa', 'Leite condensado, chocolate, manteiga', 'Cozinhe os ingredientes até desgrudar da panela...', '15min', '15 unidades', 'brigadeiro.jpg', 'Sudeste', 3, 3);

INSERT INTO favoritos (perfil_idperfil, receita_idreceita) VALUES
(1, 2),  
(2, 3),  
(3, 1);  

INSERT INTO avaliacao (perfil_idperfil, receita_idreceita, comentario, nota) VALUES
(1, 2, 'Muito boa para o café da manhã!', '5'),
(2, 3, 'Delicioso e fácil de fazer!', '5'),
(3, 1, 'Sabor autêntico, me lembra a infância.', '4');

