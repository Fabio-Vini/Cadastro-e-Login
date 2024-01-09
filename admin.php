<?php

session_start();
include_once('config.php');

$sql = "SELECT * FROM usuarios ORDER BY id DESC";

if(!empty($_GET['search']))
{
    $data = $_GET['search'];
    //Pesquisar registros
    $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or matricula LIKE '%$data%' ORDER BY id DESC";
}
else
{
    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
}
$result = $con->query($sql);

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/Logo2.png" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/admin.css">
    <title>Administração</title>
</head>
<body>
<nav class=" navbar navbar-expand-lg" data-bs-theme="dark">
  <div class="container">
  <a class="navbar-brand" href="#">
      <img src="img/Logo.png" alt="Bootstrap" width="120" height="90">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dados
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">#</a></li>
            <li><a class="dropdown-item" href="#">#</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <div class="d-grid gap-2 d-md-block">
        <a class="btn btn-danger" href="Sair.php" role="button">Sair</a>
        </div>
      </ul>
      <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
  </div>
</nav>

<!-- TABELA DE REGISTROS -->

<div class="m-5">
  <table class="table table-dark table-striped table-bg" style ="text-align: center">
      <thead>
          <tr>
              <th scope="col">Id</th>
              <th scope="col">NOME</th>
              <th scope="col">EMAIL</th>
              <th scope="col">MATRÍCULA</th>
              <th scope="col">DATA DE NASCIMENTO</th>
              <th scope="col">CURSO</th>
              <th scope="col"></th>
          </tr>
      </thead>
      <tbody>
          <?php
              while($user_data = mysqli_fetch_assoc($result)){
                  echo"<tr>";
                  echo"<td>".$user_data['id']."</td>";
                  echo"<td>".$user_data['nome']."</td>";
                  echo"<td>".$user_data['email']."</td>";
                  echo"<td>".$user_data['matricula']."</td>";
                  echo"<td>".$user_data['data_nasc']."</td>";
                  echo"<td>".$user_data['curso']."</td>";
                  echo"<td>
                  <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]' title='Editar'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                      <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                  </svg>
                  </a> 
                  <a class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]' title='Deletar'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                          <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                      </svg>
                  </a>
                  </td>";
                  echo"</tr>";
              }
          ?>
      </tbody>
  </table>
</div>

<!-- <script src="js/pesquisar.js"></script> -->
</body>
<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'admin.php?search='+search.value;
    }
</script>
</html>