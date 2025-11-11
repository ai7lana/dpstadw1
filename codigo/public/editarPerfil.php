<?php
if (isset($_GET['id'])) {
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $id = $_GET['id'];
    $perfil = pesquisarPerfilId($conexao, $id);

    $nome = $perfil['nome'];
    $nome_perfil = $perfil['nome_perfil'];
    $senha = $perfil['senha'];
    $email = $perfil['email'];
    $botao = "atualizar";
} else {
    $id = 0;
    $nome = "";
    $nome_perfil = "";
    $senha = "";
    $email = "";
    $botao = "cadastrar";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($botao == "atualizar") ? "Editar perfil" : "Cadastro de perfil"; ?></title>
    <script src="../jquery-3.7.1.min.js"></script>
    <script src="../jquery.validate.min.js"></script>
    <script>
        jQuery.validator.addMethod("lettersOnly", function(value, element) {
            return this.optional(element) || /^(?=.*[A-Z])(?=.*\d)./.test(value);
        }, "Precisa de pelo menos um número e uma letra maiúscula");

        $(document).ready(function() {
            $("#formulario").validate({
                rules: {
                    nome: {
                        required: true,
                        minlength: 5,
                    },
                    nome_perfil: {
                        required: true,
                        minlength: 5,
                    },
                    email: {
                        required: true,
                    },
                    senha: {
                        required: true,
                        minlength: 6,
                        lettersOnly: true,
                    }
                },
                messages: {
                    nome: {
                        required: "Esse campo precisa ser preenchido",
                        minlength: "Precisa de no mínimo 5 caracteres"
                    },
                    nome_perfil: {
                        required: "Esse campo precisa ser preenchido",
                        minlength: "Precisa de no mínimo 5 caracteres"
                    },
                    email: {
                        required: "Esse campo precisa ser preenchido"
                    },
                    senha: {
                        required: "Esse campo precisa ser preenchido",
                        minlength: "Precisa de no mínimo 6 caracteres"
                    }
                }
            });
        });
    </script>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body class="bodycl">

    <form action="../salvarPerfil.php" method="post" id="formulario">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="fundobrigadeirodivcadastrar">
            <img src="style/images/brigadeirocl.png" alt="brigadeiro" class="brigadeiroimagemlogin">
        </div>

        <div class="caixafundocadastro">
            <div class="titulocl">
                <br><br>
                <p>O que vai mudar?</p>
                <p>Edite seu perfil abaixo</p>
                <br>
            </div>


            <div class="containercadastro">
                <div class="inputgroup">
                    <input class="inputcl" type="text" name="nome" id="nome" placeholder="Digite seu nome" value="<?php echo htmlspecialchars($nome); ?>">
                    <br><br>
                </div>
                <div class="inputgroup">
                    <input class="inputcl" type="text" name="nome_perfil" id="nomeusu" placeholder="Digite o nome de usuário" value="<?php echo htmlspecialchars($nome_perfil); ?>">
                    <br><br>
                </div>
                <div class="inputgroup">
                    <input class="inputcl" type="email" name="email" id="email" placeholder="Digite seu E-mail" value="<?php echo htmlspecialchars($email); ?>">
                    <br><br>
                </div>
                <div class="inputgroup">
                    <input class="inputcl" type="password" name="senha" id="senha" placeholder="Digite sua senha" value="<?php echo htmlspecialchars($senha); ?>">
                    <br><br>
                </div>
            </div>

            <button type="button" id="mostrarSenha">
                <img src="style/images/mostrarsenha.png" alt="mostrar senha" class="mostrarsenhabotaocadastro">
            </button>

            <input type="submit" value="atualizar" class="botaosub" id="botaocadastro">

            <a href="todoPerfil.php" class="linklogin">Voltar para o perfil</a>

            <button onclick="history.go(-1)" class="voltar" id="voltareditar">↩ Voltar</button>
    </form>

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