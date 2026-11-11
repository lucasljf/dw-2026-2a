<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Grupo - Passo 1</title>
</head>

<body>
    <form action="grupo_trabalho.php" method="post">
        <h1>Cadastro de Grupos - Passo 1</h1>

        Escolha um trabalho: <br>
        <select name="trabalho">
            <?php
            require_once "conexao.php";

            $sql = "SELECT * FROM tb_trabalho";

            $comando = mysqli_prepare($conexao, $sql);
            mysqli_stmt_execute($comando);
            $trabalhos = mysqli_stmt_get_result($comando);

            while ($trabalho = mysqli_fetch_array($trabalhos)) {
                $trabalho_id = $trabalho['idturma'];
                $trabalho_nome = $trabalho['nome'];

                echo "<option value='$trabalho_id'>$trabalho_nome</option>";
            }
            ?>
        </select> <br><br>

        <input type="submit" value="Avançar">
    </form>
</body>

</html>
