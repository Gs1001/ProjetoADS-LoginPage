<?php
    if(!empty($_GET['id'])){
        
        include_once('others/config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0) {
            
            while($user_data = mysqli_fetch_assoc($result)) {

                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $senha = $user_data['senha'];
            }

        } else {
            header('Location: home.php');
        }
        
        
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/editCSS.css">
    <title>Editando Cadastro</title>
</head>


<body>
    <div class="container">
        <h1>Editando</h1>
        <br>
        <form action="system.php" method="POST" class="cadastro">
            <input type="text" name="nome" id="nome" value="<?php echo $nome ?>" placeholder="Digite seu nome completo..." required></input>
            <br>
            <input type="text" name="email" id="email" value="<?php echo $email ?>" placeholder="Digite seu email..." required></input>
            <br>
            <input type="password" name="senha" id="senha" value="<?php echo $senha ?>" placeholder="Crie uma senha..." required></input>
            <br><br>
            <input type="hidden" name="id" value="<?php echo $id ?>"></input>
            <button class="btn" type="submit" name="update" id="update">SALVAR</button>
            <br>
            <a href="home.php">Home</a>
        </form>
    </div>
</body>
</html>