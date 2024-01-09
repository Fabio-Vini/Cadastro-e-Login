<?php

    if(!empty($_GET['id']))
    {
        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM usuarios WHERE id=$id";

        $result = $con->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM usuarios WHERE id=$id";
            $resultDelete = $con->query($sqlDelete);
        }
    }
    header('Location: admin.php');
   
?>