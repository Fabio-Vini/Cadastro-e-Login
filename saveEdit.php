<?php

    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $matricula = $_POST['matricula'];
        $data_nasc = $_POST['data_nasc'];
        $curso = $_POST['curso'];
        // $senha = $_POST['senha'];
        $senha = (md5("sdv-".$_POST['senha']));

        $sqlUpdate = "UPDATE usuarios SET nome='$nome', email='$email', matricula='$matricula', data_nasc='$data_nasc', curso='$curso', senha='$senha' WHERE id='$id'";

        $result = $con->query($sqlUpdate);

        header('Location: admin.php');

        ?>
        <script>
         Swal.fire({
               position: 'top-end',
               icon: 'success',
               title: 'Editado com sucesso!',
               showConfirmButton: false,
               timer: 2000
               }).then((value) => {
               window.location = "admin.php"
                 });
       </script>
      <?php
    }

?>