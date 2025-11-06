<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu Login!</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){
            jQuery.validator.addMethod("lettersOnly", function(value, element) {
            return this.optional(element) || /^(?=.*[A-Z])(?=.*\d)./.test(value);
        }, "Digite a senha correta.");
            $('#formulario').validate({
                rules:{
                    nomeusuario:{
                        required:true,
                    },
                    senha:{
                        required: true,
                    }
                },
                messages:{
                    nomeusuario:{
                        required: "Esse campo precisa ser preenchido"
                    },
                    senha:{
                        required: "Esse campo precisa ser preenchido"
                    }
                }
            })
        })
    </script>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body class="bodycl">
    <div class="caixafundologin">
        <div class="titulocl"> <br><br>
            <p>Olá de novo!</p>
            <p>Faça seu Login!</p>  <br>
        </div>
        <form action="../verificarLogin.php" method="post" id="formulario">
            <div class="clpreencher">
                <div class="fundobrigadeirodiv">
                    <img src="style/images/brigadeirocl .png" alt="" class="brigadeiroimagemcl">
                </div>
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
            <a href=""></a>
            <input type="submit" value="acessar">
            <!-- <a href="perfil.php" class="botaosubimit"><button type="button" class="botaosub" id="botaosubid">entrar</button></a> <br> -->

            <a href="formCadastrarPerfil.php" class="novaconta">Crie uma nova conta</a>
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