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
        <form action="../verificarLogin.php" method="post" id="formulario">
            <div class="fundobrigadeirodiv">
                <img src="style/images/brigadeirocl .png" alt="" class="brigadeiroimagemlogin">
            </div>
            
            <div class="loginpreencher">
                <div class="titulologin"> <br><br>
                    <p>Olá de novo!</p>
                    <p id="facaseulogin">Faça seu Login:</p>  <br>
                </div>

                
                <div class="containerlogin">
                    <div class="inputgroup" id="nomeusulogin">
                        <input class="inputcl" type="text" name="nomeusuario" id="nomeusu" placeholder="Nome de Usuário"><br>
                        <br><br>
                    </div>
    
                    <div class="inputgroup" id="senhalogin">
                        <input class="inputcl" type="password" name="senha" id="senha" placeholder="Senha"> 
                    </div>
                </div>
                <button type="button" id="mostrarSenha">
                    <img src='style/images/mostrarsenha.png' alt='' class='mostrarsenhabotao'>
                </button>


                <input type="submit" value="acessar" class="botaologin" id="acessar">
                <a href="formCadastrarPerfil.html" class="novaconta">Crie uma nova conta</a>

            </div>

            <button onclick="history.go(-1)" class="voltar" id="voltarlogin"> ↩ Voltar </button>
            <!-- <input type="button" value="<img src='style/images/voltar.png' alt='' class='voltarbotao'>" onclick="javascript:history.go(-1)"> -->
            <a href=""></a>
            <!-- <a href="perfil.php" class="botaosubimit"><button type="button" class="botaosub" id="botaosubid">entrar</button></a> <br> -->

            <br><br><br><br><br><br><br>
        </div>
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