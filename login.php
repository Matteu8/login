<?php
include "conexao.php";

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM login WHERE email = '$email' limit 1";

    $sql_exec = $mysqli->query($sql) or die($mysqli->error);
    $usuario = $sql_exec->fetch_assoc();

    if (password_verify($senha, $usuario["senha"])) {
        $_SESSION["nome"] = $usuario["nome"];
        header("Location:inicial.php");
    } else {
        echo "<script>
            alert('Erro de senha')
        </script>";
    }
    
    
}

?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container d-flex justify-content-center mt-5">
        <form class="form" method="post">
            <p class="title">Entrar </p>
            <p class="message">Entre com sua conta para usar a ferramenta </p>
            <label>
                <input class="input" type="email" placeholder="" required="" name="email">
                <span>Email</span>
            </label>

            <label>
                <input class="input" type="password" placeholder="" required="" name="senha">
                <span>Senha</span>
            </label>
            <button class="submit mt-2" type="submit">Entrar</button>
            <p class="signin">Não está cadastrado ? <a href="index.php">Cadastrar</a> </p>
        </form>
    </div>
</body>

</html>