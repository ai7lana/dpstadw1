<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Perfis</title>
  <script src="../jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <h1>Lista de Perfis</h1>

    <?php
    require_once "../conexao.php";
    require_once "../funcoes.php";

    $lista_perfil = listarPerfil($conexao); 

    if (count($lista_perfil) == 0) {
        echo "Não existem perfis cadastrados";
    } else {
    ?>
        <table border="1">
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>Nome de Usuário</td>
                <td>Email</td>
                <td>Senha</td>
                <td colspan="2">Ação</td>
            </tr>
        <?php
        foreach ($lista_perfil as $perfil) {
            $idperfil= $perfil['idperfil'];
            $nome= $perfil['nome'];
            $nome_perfil= $perfil['nome_perfil'];
            $email= $perfil['email'];
            $senha= $perfil['senha'];

            echo "<tr>";
            echo "<td>$idperfil</td>";
            echo "<td>$nome</td>";
            echo "<td>$nome_perfil</td>";
            echo "<td>$email</td>";
            echo "<td>$senha</td>";
            echo "<td><a href='deletarPerfil.php?id=$idperfil'>Excluir</a></td>";
            echo "<td><a href='formCadastrarPerfil.php?id=$idperfil'>Editar</a></td>";
            echo "</tr>";
        }
    }
        ?>
        </table>
        <input type="button" value="Voltar" onclick="javascript:history.go(-1)">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
