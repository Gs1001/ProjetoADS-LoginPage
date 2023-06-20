<?php
    if(isset($_POST['submit'])){
        
        include_once('others/config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,senha) VALUES ('$nome','$email','$senha')");

        header('Location: login.php');
    }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastroCSS.css">
    <title>Pagina de Cadastro</title>
</head>


<body>
    <div class="container">
        <h1>Cadastre-se</h1>
        <br>
        <form action="register.php" method="POST" class="cadastro">
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo..." required></input>
            <br>
            <input type="text" name="email" id="email" placeholder="Digite seu email..." required></input>
            <br>
            <input type="password" name="senha" id="senha" placeholder="Crie uma senha..." required></input>
            <br><br>
            <button class="btn" type="submit" name="submit" id="submit">Cadastrar</button>
            <br>
            <a href="index.php">Inicio</a>
            <br>
            <a href="login.php">Fazer login</a>
        </form>
    </div>
</body>
</html>