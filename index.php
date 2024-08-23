<?php
include "conexao.php";



if (isset($_POST["nome"])) {

    $senha = $_POST["senha"];
    $repsenha = $_POST["repsenha"];

    if ($senha === $repsenha) {
        $nome = $_POST["nome"];
        $sobrenome = $_POST["sobrenome"];
        $email = $_POST["email"];

        $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

        $mysqli->query("INSERT INTO login (nome, sobrenome, email, senha) values('$nome', '$sobrenome', '$email', '$senha')") or
            die($mysqlierrno);
        header("Location:login.php");

    } else {

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container d-flex justify-content-center mt-5">
        <form class="form" method="post">
            <p class="title">Cadastrar </p>
            <p class="message">Cadastre-se para obter acesso à ferramenta. </p>
            <div class="flex">
                <label>
                    <input class="input" type="text" placeholder="" required="" name="nome">
                    <span>Nome</span>
                </label>

                <label>
                    <input class="input" type="text" placeholder="" required="" name="sobrenome">
                    <span>Sobrenome</span>
                </label>
            </div>

            <label>
                <input class="input" type="email" placeholder="" required="" name="email">
                <span>Email</span>
            </label>

            <label>
                <input class="input" type="password" placeholder="" required="" name="senha">
                <span>Senha</span>
            </label>
            <label>
                <input class="input" type="password" placeholder="" required="" name="repsenha">
                <span>Confirme a senha</span>
            </label>
            <?php
            if (isset($_POST["senha"])) {
                if ($senha === $repsenha) {
                } else {
                    echo "
                    <div class='alert alert-danger text-center mt-3' role='alert'>
                    Senha Incorreta!
                    </div>
                    ";
                }
            }
            ?>
            <button class="submit" type="submit">Cadastrar</button>
            <p class="signin">Já se cadastrou ? <a href="login.php">Login</a> </p>
        </form>


    </div>
</body>

</html>