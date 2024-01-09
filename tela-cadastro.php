<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Logo2.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css">
    
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>
</body>
</html>

<?php

    if(isset($_POST['submit'])){
        // print_r($_POST['nome']);
        // print_r($_POST['email']);
        // print_r($_POST['matricula']);
        // print_r($_POST['data_nasc']);
        // print_r($_POST['curso']);
        // print_r($_POST['senha']);

        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $matricula = $_POST['matricula'];
        $data_nasc = $_POST['data_nasc'];
        $curso = $_POST['curso'];
        // $senha = $_POST['senha'];
        $senha = (md5("sdv-".$_POST['senha']));

    
        $result = mysqli_query($con, "INSERT INTO usuarios (nome, email, matricula, data_nasc, curso, senha) VALUES ('$nome', '$email', '$matricula','$data_nasc', '$curso', '$senha')");

        ?>
            <script>
              Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Cadastrado com sucesso!',
                    showConfirmButton: false,
                    timer: 2000
        			}).then((value) => {
            		window.location = "tela-login.php"
      				});
            </script>
        <?php
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Logo2.png" type="image/png">
    <link rel="stylesheet" href="css/tela-cadastro.css">
    <title>Cadastre-se</title>
</head>
<body>
    <!-- FUNÇÃO DE ESCONDER SENHA -->
    <script>
        function showHide(){
            const password = document.getElementById('senha');
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
        <form action="tela-cadastro.php" method="POST">
            <fieldset>
                <legend><b>Formulário de Cadastro<b></legend>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label class="inputLabel" for="nome">Nome Completo</label>
                </div>
                <div class="inputBox">
                    <input type="text"  title="Modelo de email incorreto!" name="email" id="email" class="inputUser" required>
                    <label class="inputLabel" for="email">Email</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="matricula" id="matricula" title="Preencha conforme o modelo: CB3045671 ou CB203970X" class="inputUser" pattern="^(?=.*[A-Z]){2}^[a-zA-Z0-9]+$" required>
                    <label class="inputLabel" for="matricula">Matrícula</label>
                </div>
                <div class="inputBox">
                    <label for="data_nasc"><b>Data de Nascimento:</b></label>
                    <input type="date" name="data_nasc" id="data_nasc"  require>
                </div>
                <div class="inputBox">
                    <input type="text" name="curso" id="curso" class="inputUser" pattern="[A-Z]{1,4}" required>
                    <label class="inputLabel" for="curso">Curso (Somente a sigla)</label>
                </div>
                <div class="inputBox Senha">
                    <input type="password" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres" name="senha" id="senha" class="inputUser" id="Pass" pattern="^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[@#$])[a-zA-Z0-9@#$]{8,50}$" required><img src="icon/eye.svg" alt="">
                    <label class="inputLabelSenha" for="senha">Crie uma senha</label>
                    <div id="icon" onclick="showHide()"></div>
                </div>
                <div class="inputBox">
                    <input type="submit" name="submit" id="enviar">
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>