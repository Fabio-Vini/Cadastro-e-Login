<?php

    session_start();
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: tela-login.php');
    }
    $logado = $_SESSION['email'];

    // session_start();
    // if((!isset($_SESSION['matricula']) == true) and (!isset($_SESSION['senha']) == true))
    // {
    //     unset($_SESSION['matricula']);
    //     unset($_SESSION['senha']);
    //     header('Location: tela-login.php');
    // }
    // $logado = $_SESSION['matricula'];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Logo2.png" type="image/png">
    <link rel="stylesheet" href="css/sistema.css">
    <title>Sistema de Votos</title>
</head>
<body>
    <h1>Acessou o sistema</h1>
</body>
</html>