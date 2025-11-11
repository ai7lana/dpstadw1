<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery-3.7.1.min.js"></script>
    script src="jquery-3.7.1.min.js"></script>
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

<body>
    <h2>Adicionar favoritos</h2>
    <form action="../salvarFavoritos.php" method="post">


        Perfil: <br><input type="text" name="perfil_idperfil" required><br>
        Receita: <br> <input type="text" name="receita_idreceita" required><br>

        <button type="submit">Salvar</button>
        <input type="button" value="Voltar" onclick="javascript:history.go(-1)">



</body>

</html>