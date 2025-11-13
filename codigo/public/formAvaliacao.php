<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.1.min.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            jQuery.validator.addMethod("lettersOnly", function(value, element) {
                return this.optional(element) || /^(?=.*[A-Z])(?=.*\d)./.test(value);
            }, "Digite a senha correta.");
            $('#formulario').validate({
                rules: {
                    nomeusuario: {
                        required: true,
                    },
                    senha: {
                        required: true,
                    }
                },
                messages: {
                    nomeusuario: {
                        required: "Esse campo precisa ser preenchido"
                    },
                    senha: {
                        required: "Esse campo precisa ser preenchido"
                    }
                }
            })
        })
    </script>
    <link rel="stylesheet" href="style/reset.css">
    <link rel="stylesheet" href="style/style.css">
</head>

<body class="bodyforms">
    <p class="tituloforms" id="avaliartit">Avaliar</p>
    <form action="../salvarAvaliacao.php" method="post">

        <input type="text" name="perfil_idperfil" required placeholder="Perfil" class="inputforms" id="inputperfilava"><br>
        <input type="text" name="receita_idreceita" required placeholder="Receita" class="inputforms" id="inputreceita"><br>
        <input type="text" name="comentario" required placeholder="comentário" class="inputforms" id="inputcomentario"><br>
        <input type="text" name="nota" required placeholder="avaliação" class="inputforms" id="inputavaliação"><br>

        <button type="submit" class="botaosubmitforms" id="botaoava" >Salvar</button>
        <button type="button" onclick="history.go(-1)" class="voltar" id="voltarlogin"> ↩ Voltar </button>

</body>

</html>