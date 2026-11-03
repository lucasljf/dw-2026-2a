<?php
require_once "conexao.php";

$nome = $_POST['nome'];
$apelido = $_POST['apelido'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$nome_arquivo = $_FILES['foto']['name'];
$caminho_temporario = $_FILES['foto']['tmp_name'];

$extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);

$novo_nome = uniqid() . "." . $extensao;

$caminho_destino = "imagem_usuario/" . $novo_nome;

move_uploaded_file($caminho_temporario, $caminho_destino);

$sql = "INSERT INTO usuario (nome, apelido, email, senha, foto) VALUES ('$nome', '$apelido', '$email', '$senha', '$novo_nome')";

mysqli_query($conexao, $sql);

header("Location: index.php");
?>