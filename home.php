<?php
    session_start();
    include_once('others/config.php');
    if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true)) {

        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }

    $logado = $_SESSION['nome'];

    if(!empty($_GET['search'])) {

        $data = $_GET['search'];
        $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";

    } else {
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    }

    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/homeCSS.css">
    <title>Gerenciamento de Dados</title>
</head>


<body>
    <div class="barra">
        <p class="BTNhome" href="home.php">Gerenciamento de Dados</p>
        <nav class="menunav">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="exitBTN.php">Exit</a></li>
                <li><a href="https://github.com/hebertphp/">References</a></li>
                <li><a href="https://bio.site/github">Authors</a></li>
            </ul>
        </nav>
    </div>

    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="m-5">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nome:</th>
                    <th scope="col">Email:</th>
                    <th scope="col">Senha:</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                        
                        echo "<td>".$user_data['id']."</td>"; 
                        echo "<td>".$user_data['nome']."</td>"; 
                        echo "<td>".$user_data['email']."</td>"; 
                        echo "<td>".$user_data['senha']."</td>";
                        echo "<td>
                            <a class='btn btn-sm btn-primary' href='editing.php?id=$user_data[id]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                </svg>
                            </a>
                            <a class='btn btn-sm btn-danger' href='system.php?id=$user_data[id]'> 
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                </svg>
                            </a>
                        </td>"; 
                        echo "<tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <footer>
        <p>ADS Uninove - All Copyright reserved for © ADS Uninove</p>
    </footer>
</body>


<script>
    var search = document.getElementById('pesquisar')
    
    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {

            searchData();
        }
    });

    function searchData() {

        window.location = 'home.php?search='+search.value;
        
    }
</script>
</html>