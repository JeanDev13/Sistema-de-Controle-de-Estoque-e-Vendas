<?php

    session_start();
    if(!isset($_SESSION['usuario_id'])){
        header("location: ../login/index.php");
        exit;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <a href="../login/logout.php" class="btn btn-danger">Sair</a>
</body>
</html>