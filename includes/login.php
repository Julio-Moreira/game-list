<?php
session_start(); 

if (!isset($_SESSION['user'])) { 
    $_SESSION['user'] = '';
    $_SESSION['nome'] = '';
    $_SESSION['tipo'] = '';
}

// gera uma hash da senha criptografada
function gerarHash($senha) {
    $cripto = criptoSenha($senha);
    return password_hash($cripto, PASSWORD_DEFAULT);
}

// testa a senha da hash
function testarHash($senha, $hash) {
    $ok = password_verify(criptoSenha($senha), $hash);
    return $ok;
}

// criptografa a senha
function criptoSenha($senha) {
    $crip = '';
    for ($i=0; $i < strlen($senha); $i++) { 
        $let = ord($senha[$i]) + 1;
        $crip .= chr($let);
    }
    return $crip;
}

// desloga
function logout() {
    unset($_SESSION['user']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);
    return true;
}

// mostra se ta logado
function isLog() {
    if (empty($_SESSION['user'])) { return false; }
    else { return true; }
}

// mostra se o usuario é admin
function isAdmin() {
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

// mostra se o usuario é editor
function isEditor() {
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