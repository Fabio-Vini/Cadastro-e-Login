<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Logo2.png" type="image/png">
    <link rel="stylesheet" href="css/tela-login.css">
    <script src="js/pass_security.js"></script>
    <title>Faça Login</title>
</head>
<body>\
    <!-- FUNÇÃO DE ESCONDER SENHA -->
    <script>
        function showHide(){
            const password = document.getElementById('password');
            const icon = document.getElementById('icon');
        
            if(password.type == "password"){
                password.setAttribute('type', 'text');
                icon.classList.add('hide')
            }
            else{
                password.setAttribute('type', 'password');
                icon.classList.remove('hide')
            }
        }
    </script>

    <a href="index.php"><img src="img/setas.png" width="50px" height="50px"></a>
    <div class="box">
    <img src="img/Logo.png" width="180" height="150" alt="">
    <form action="testeLogin.php" method="POST">
        <!-- <input type="text" name="matricula" placeholder="Matricula"> -->
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="senha" id="password" placeholder="Senha">
        <div id="icon" onclick="showHide()"></div>
        <input type="submit" value="Entrar" name="submit" class="inputSubmit">
    </form>
    </div>
</html>