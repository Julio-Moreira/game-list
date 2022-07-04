<?php
// Inicia a seção
session_start(); 

if (!isset($_SESSION['user'])) {  
    $_SESSION['user'] = '';
    $_SESSION['nome'] = '';
    $_SESSION['tipo'] = '';
}

function gerarHash(string $senha) {
    // criptografa a senha e gera um hash

    $cripto = criptoSenha($senha);
    return password_hash($cripto, PASSWORD_DEFAULT);
}

function testarHash(string $senha, $hash) {
    // testa se o hash é da senha passada

    $ok = password_verify(criptoSenha($senha), $hash);
    return $ok;
}

function criptoSenha(string $senha) {
    // criptografa a senha passada

    $crip = '';
    for ($i=0; $i < strlen($senha); $i++) { 
        $let = ord($senha[$i]) + 1;
        $crip .= chr($let);
    }
    return $crip;
}

function logout() {
    // desloga

    unset($_SESSION['user']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);
    return true;
}

function isLog() {
    // mostra se ta logado

    return ((empty($_SESSION['user'])) ? false : true);
}

function isAdmin() {
    // mostra se o usuario é admin

    $ty = $_SESSION['tipo'] ?? null;
    if (is_null($ty)) {
        return false;
    } else {
        if ($ty == 'admin') {
            return true;
        } else {
            return false;
        }
    }
}

function isEditor() {
    // mostra se o usuario é editor
    
    $ty = $_SESSION['tipo'] ?? null;
    if (is_null($ty)) {
        return false;
    } else {
        if ($ty == 'editor') {
            return true;
        } else {
            return false;
        }
    }
}