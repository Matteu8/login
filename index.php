<?php
include "conexao.php";

if (isset($_SESSION["nome"])) {
    header("Location:inicial.php");
} else {
    if (isset($_POST["nome"])) {

        $senha = $_POST["senha"];
        $repsenha = $_POST["repsenha"];



        if ($senha === $repsenha) {
            $nome = $_POST["nome"];
            $sobrenome = $_POST["sobrenome"];
            $email = $_POST["email"];
            $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);


            $sql = "SELECT * FROM login WHERE email =  '$email'";
            $sql_exec = $mysqli->query($sql) or die($mysqli->error);



            if ($sql_exec->num_rows > 0) {
                //Tem conta, então não faça o cadastro (Exiba uma mensagem)

            } else {
                //Se não ter a conta, então faça o cadastro
                $mysqlierrno = "falha";

                $mysqli->query("INSERT INTO login (nome, sobrenome, email, senha) values('$nome', '$sobrenome', '$email', '$senha')") or
                    die($mysqlierrno);
                header("Location:login.php");

                exit();


            }

        }
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
            <?php
            if (isset($_POST["nome"])) {
                if ($sql_exec->num_rows > 0) {
                    echo "<div class='alert alert-danger mb-0' role='alert'>
                Email já Cadastrado!!
              </div>";
                }
            }
            ?>
            <label>
                <input class="input" type="password" placeholder="" required="" name="senha">
                <span>Senha</span>
            </label>
            <label>
                <input class="input" type="password" placeholder="" required="" name="repsenha">
                <span>Confirme a senha</span>
            </label>

            <button class="submit" type="submit">Cadastrar</button>
            <p class="signin">Já se cadastrou ? <a href="login.php">Login</a> </p>
        </form>


    </div>
</body>

</html>