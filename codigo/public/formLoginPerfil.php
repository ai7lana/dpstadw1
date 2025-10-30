<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu Login!</title>
    <script src="jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body class="bodycl">
    <div class="caixafundologin">
        <div class="titulocl"> <br><br>
            <p>Olá de novo!</p>
            <p>Faça seu Login!</p>  <br>
        </div>
        <form action="../verificarLogin.php" method="post">
            <div class="clpreencher">
                <div class="inputgroup">
                    <label>Nome de Úsuario:</label> <br>
                    <input class="inputcl" type="text" name="nomeusuario" id="nomeusu" placeholder="Digite o nome de usuário"> <br><br>
                </div>
                <div class="inputgroup">
                    <label>Senha:</label> <br>
                    <input class="inputcl" type="password" name="senha" id="senha" placeholder="Digite sua senha"> <br><br>
                </div>
            </div>
            <input type="button" value="Voltar" onclick="javascript:history.go(-1)">
            <input type="submit" value="acessar">
            <!-- <a href="perfil.php" class="botaosubimit"><button type="button" class="botaosub" id="botaosubid">entrar</button></a> <br> -->
            <a href="login.html" class="linksenha">Esqueceu a senha?</a>
            <a href="cadastro.html" class="novaconta">Crie uma nova conta</a>
            <br><br><br><br><br><br><br>
        </div>
        </form>
        <button type="button" id="mostrarSenha"> mostrar senha</button>
        <script>
        $(document).ready(function() {
            $('#mostrarSenha').click(function() {
                let tipo = $('#senha').attr('type');
                if (tipo == 'password') {
                    $('#senha').attr('type', 'text');
                } else {
                    $('#senha').attr('type', 'password');
                }
            });
        });
    </script>
</body>
</html>