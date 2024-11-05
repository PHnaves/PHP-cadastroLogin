<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteúdo</title>
</head>
<body>
    <h1>
        <?php
        //include 'logout.php';
        session_start();
        
        
        if (!isset($_SESSION['user_name'])) {
            include 'logout.php';
            //header("Location: login.php");
        }

        echo"Seja bem-vindo, " . $_SESSION['user_name'];
        ?>
    </h1>

    <a href="login.html">Sair</a>
</body>
</html>
