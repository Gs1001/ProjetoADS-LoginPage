<?php
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "projetofaculdade";

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
?>

<?php

    // Sistema de check de login.

    session_start();
    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['senha'])) {
        
        include_once('others/config.php');
        $nome =  $_POST['nome'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE nome = '$nome' and senha = '$senha'";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1) {
            
            unset($_SESSION['nome']);
            unset($_SESSION['senha']);
            header('Location: login.php');

        } else {
            
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            header('Location: home.php');
        }

    } else {
        header('Location: login.php');
    }

?>

<?php

    // Sistema de ediçao dos dados registrados na data base.

    include_once('others/config.php');

    if(isset($_POST['update'])) {

        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sqlUpdate = "UPDATE usuarios SET nome='$nome', email='$email', senha='$senha' WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: home.php');
?>

<?php

    // Sistema de exclusao de dados registrados na data base.

    if(!empty($_GET['id'])) {
        
        include_once('others/config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0) {
            
            $sqlDelete = "DELETE FROM usuarios WHERE id=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: home.php');
?>