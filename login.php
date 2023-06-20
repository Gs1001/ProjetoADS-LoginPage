<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/loginCSS.css">
    <title>Pagina de login</title>
</head>


<body>
    <div class="container">
        <h1>Login</h1>
        <br>
        <form class="cadastro" action="system.php" method="POST">
            <input type="text" name="nome" id="nome" placeholder="Digite seu username..."></input>
            <br>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha..."></input>
            <br><br>
            <button class="btn" type="submit" name="submit" id="submit" value="Enviar">ENTRAR</button>
            <br>
            <a href="index.php">Inicio</a>
            <br>
            <a href="register.php">Fazer Cadastro</a>
        </form>
    </div>
</body>
</html>