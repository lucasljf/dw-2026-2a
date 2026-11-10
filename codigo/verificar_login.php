<?php
require_once "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE email = ?";
$comando = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($comando, "s", $email);
mysqli_stmt_execute($comando);

$resultado = mysqli_stmt_get_result($comando);

$quantidade = mysqli_num_rows($resultado);

if ($quantidade == 1) {
    $usuario = mysqli_fetch_array($resultado);
    $senha_banco = $usuario['senha'];

    if (password_verify($senha, $senha_banco)) {
        session_start();
        $_SESSION['idusuario'] = $usuario['idusuario'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['apelido'] = $usuario['apelido'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['foto'] = $usuario['foto'];

        header("Location: home.php");
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}
