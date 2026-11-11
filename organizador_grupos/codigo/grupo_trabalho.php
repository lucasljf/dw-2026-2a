<?php

$idtrabalho = $_POST['trabalho'];

session_start();
$_SESSION['idtrabalho'] = $idtrabalho;

header("Location: form_grupo_alunos.php");
