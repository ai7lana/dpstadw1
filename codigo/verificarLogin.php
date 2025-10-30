<?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $nome_perfil = $_POST['nomeusuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM perfil WHERE nome_perfil = '$nome_perfil'";

    $resultado = mysqli_query($conexao, $sql);

    if (mysqli_num_rows($resultado) == 0) {
        header("Location: ./public/index.php");
    }
    else {
        $linha = mysqli_fetch_array($resultado);
        $senha_banco = $linha['senha'];

        if (password_verify($senha, $senha_banco)) {
            session_start();
            $_SESSION['logado'] = 'sim';
            header("Location: ./public/todoPerfil.php");
        }
        else {
            header("Location: ./public/index.php");
        }
    }
?>
