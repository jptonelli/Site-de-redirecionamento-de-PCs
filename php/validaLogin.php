<?php

if (empty($_POST['user'])) {
    echo "E-mail é obrigatório e deve ser informado.";
} elseif (empty($_POST['senha'])) {
    echo "Senha é obrigatória e deve ser informada.";
} else {
    $email = $_POST['user'];
    $senha = $_POST['senha'];
    
    if ($email !== 'teste') {
        echo "E-mail inválido.";
    } elseif ($senha !== 'teste') {
        echo "Senha inválida.";
    } else {
        echo "Usuário logado com sucesso. Seja bem vindo.";
    }
}
?>