<?php
ob_start(); // evita erro de header já enviado

require_once "conexao.php";
require_once "funcoes.php";

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

$nome_comida = $_POST['nome_comida'];
$tipo = $_POST['tipo'];
$ingredientes = $_POST['ingredientes'];
$modo_de_preparo = $_POST['modo_de_preparo'];
$tempo = $_POST['tempo'];
$rendimento = $_POST['rendimento'];
$regiao = $_POST['regiao'];
$perfil_idperfil = $_POST['perfil_idperfil'];

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

//pega a extensão do arquivo
$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

//gerar um novo nome para o arquivo
$novo_nome = uniqid() . "." . $extensao;

//criar um novo caminho para o arquivo
$caminho_destino = "./public/foto/" . $novo_nome;

// move a foto para o servidor
move_uploaded_file($caminho_temporario, $caminho_destino);


if ($id == 0) {
    salvarReceita($conexao, $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $novo_nome, $regiao, $perfil_idperfil);
} else {
    editarReceita($conexao, $nome_comida, $tipo, $ingredientes, $modo_de_preparo, $tempo, $rendimento, $novo_nome, $regiao, $perfil_idperfil, $id);
}

header("Location: /public/listarReceita.php");
exit;
?>
