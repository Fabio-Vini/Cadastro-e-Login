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
    session_start();
    include_once('config.php');

    //<!-- ACESSO EXCLUSIVO PARA ADMINISTRADORES -->
    $email = $con ->real_escape_string ($_POST['email']);
    $senha = $con ->real_escape_string ($_POST['senha']);
    
    if($email == 'administrador@gmail.com' && $senha == 'admin')
    {
        header('Location: admin.php');
    }
    //<!-- -------------------------------------- -->
    
    else
    {
        if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
        {
            include_once('config.php');
            $email = $con ->real_escape_string ($_POST['email']);
            $senha = $con ->real_escape_string (md5("sdv-".$_POST['senha']));
    
            $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
    
            $result = $con->query($sql);
    
    
            if(mysqli_num_rows($result) < 1)
            {
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                
            }
            else
            {
                $_SESSION['email'] = $email;
                $_SESSION ['senha'] = $senha;
                header('Location: sistema.php');
            }
            }
            
            else
            {
                ?>
            <script>
              Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Dados inválidos!',
                    confirmButtonColor: 'red',
                    footer: '<a href="tela-cadastro.php">Não possui cadastro? Clique aqui!</a>'
        			}).then((value) => {
            		window.location = "tela-login.php"
      				});
            </script>
        <?php
            }
    }


?>





<!-- A VARIÁVEL MATRICULA É SO PARA CASOS DE FACULDADES QUE USAM 
O NÚMERO DE MATRICULA COMO REGISTRO, OU SE CASO NÃO QUISEREM USAR
A MATRÍCULA, TEM A OPÇÃO DE EMAIL -->


 <?php
    // session_start();
    // include_once('config.php');

    //<!-- ACESSO EXCLUSIVO PARA ADMINISTRADORES -->
    // $matricula = $con ->real_escape_string ($_POST['matricula']);
    // $senha = $con ->real_escape_string ($_POST['senha']);
    
    // if($matricula == '0' && $senha == 'admin')
    // {
    //     header('Location: admin.php');
    // }
    //<!-- -------------------------------------- -->
    
//     else
//     {
//         if(isset($_POST['submit']) && !empty($_POST['matricula']) && !empty($_POST['senha']))
//         {
//             include_once('config.php');
//             $matricula = $con ->real_escape_string ($_POST['matricula']);
//             $senha = $con ->real_escape_string (md5("sdv-".$_POST['senha']));
    
//             $sql = "SELECT * FROM usuarios WHERE matricula = '$matricula' and senha = '$senha'";
    
//             $result = $con->query($sql);
    
    
//             if(mysqli_num_rows($result) < 1)
//             {
//                 unset($_SESSION['matricula']);
//                 unset($_SESSION['senha']);
                
//             }
//             else
//             {
//                 $_SESSION['matricula'] = $matricula;
//                 $_SESSION ['senha'] = $senha;
//                 header('Location: sistema.php');
//             }
//             }
            
//             else
//             {
//                 ?>
//             <script>
//               Swal.fire({
//                     icon: 'error',
//                     title: 'Oops...',
//                     text: 'Dados inválidos!',
//                     confirmButtonColor: 'red',
//                     footer: '<a href="tela-cadastro.php">Não possui cadastro? Clique aqui!</a>'
//         			}).then((value) => {
//             		window.location = "tela-login.php"
//       				});
//             </script>
//         <?php
//             }
//     }

// ?> 