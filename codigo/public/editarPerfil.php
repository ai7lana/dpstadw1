<?php
    if(isset($_GET['id'])){
        require_once "../conexao.php";
        require_once "../funcoes.php";

        $id = $_GET['id'];
        $perfil = pesquisarPerfilId($conexao, $id);

        $nome = $perfil['nome'];
        $nome_perfil = $perfil['nome_perfil'];
        $senha = $perfil['senha'];
        $email = $perfil['email'];
        $botao = "atualizar";
    }
    else {
        $id = 0;
        $nome = "";
        $nome_perfil = "";
        $senha = "";
        $email = "";
        $botao = "";

        $botao = "cadastrar";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu cadastro!</title>
    <script src="../jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body class="bodycl">
    <form action="../salvarPerfil.php" method="post">
        <div class="caixafundocadastro">
            <div class="titulocl"> <br><br>
                <p>O que vai mudar?</p>
            </div>
            <div class="clpreencher">
                <div class="inputgroup">
                    <label>Nome:</label> <br>
                    <input class="inputcl" type="text" name="nome" id="nome"  placeholder="Digite seu nome" value="<?php echo $nome;?>"> <br><br>
                </div>
                <div class="inputgroup">
                    <label>Nome de usuario:</label> <br>
                    <input class="inputcl" type="text" name="nome_perfil" id="nomeusu" placeholder="Digite o nome de usuário" value="<?php echo $nome_perfil;?>"> <br><br>
                </div>
                <div class="inputgroup">
                    <label>E-mail:</label> <br>
                    <input class="inputcl" type="text" name="email" id="email" placeholder="Digite seu E-mail" value="<?php echo $email;?>"> <br><br>
                </div>
                <div class="inputgroup">
                    <label>Senha:</label> <br>
                    <input class="inputcl" type="password" name="senha" id="senha" placeholder="Digite sua senha" value="<?php echo $senha;?>"> <br><br>
                </div>
            </div>
    
            <input type="submit" value="<?php echo $botao;?>" class=  "botaosub" id="botaocadastro">
            <!-- <a href="ReceitasFeed.php" class="botaosubimit"><button type="button" class="botaosub" id="botaocadastro">cadastrar</button></a> <br> -->
            <a href="perfil.php" class="linklogin">Já possui uma conta? Clique aqui!</a>
        </div>
        <input type="button" value="Voltar" onclick="javascript:history.go(-1)">
    </form>
</body>
</html>