<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.min.css">
    
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.18/dist/sweetalert2.all.min.js"></script>
</body>
</html>

<?php

    if(!empty($_GET['id'])){

        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

        $result = $con ->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $email = $user_data['email'];
                $matricula = $user_data['matricula'];
                $data_nasc = $user_data['data_nasc'];
                $curso = $user_data['curso'];
                // $senha = $user_data['senha'];
                $senha = (md5("sdv-".$user_data['senha']));
            }
            
        }
        else
        {
            header('Location: admin.php');    
        }
    }
        else
        {
            header('Location: admin.php');    
        }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tela-cadastro.css">
    <title>Cadastre-se</title>
</head>
<body>
<a href="admin.php">VOLTAR</a>
    <div class="box">
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <legend><b>Formulário de Cadastro<b></legend>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label class="inputLabel" for="nome">Nome Completo</label>
                </div>
                <div class="inputBox">
                    <input type="text"  title="Modelo de email incorreto!" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                    <label class="inputLabel" for="email">Email</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="matricula" id="matricula" class="inputUser" value="<?php echo $matricula ?>" required>
                    <label class="inputLabel" for="matricula">Matrícula</label>
                </div>
                <div class="inputBox">
                    <label for="data_nasc"><b>Data de Nascimento:</b></label>
                    <input type="date" name="data_nasc" id="data_nasc" value="<?php echo $data_nasc ?>" require>
                </div>
                <div class="inputBox">
                    <input type="text" name="curso" id="curso" class="inputUser" value="<?php echo $curso ?>" required>
                    <label class="inputLabel" for="curso">Curso (Somente a sigla)</label>
                </div>
                <div class="inputBox">
                    <input type="password" title="Deve conter pelo menos um número e uma letra maiúscula e minúscula e pelo menos 8 ou mais caracteres" name="senha" id="senha" class="inputUser" value="<?php echo $senha ?>" required>
                    <label class="inputLabel" for="senha">Crie uma senha</label>
                </div>
                <div class="inputBox">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="update" id="update">
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>