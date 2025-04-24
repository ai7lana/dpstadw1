<?php
    require_once "../funcoes.php";
    require_once "../conexao.php";


    $perfil_idperfil = "2";
    $reveita_idreceita = "1";

    deletarFavoritos($conexao, $perfil_idperfil, $receita_idreceita);

?>