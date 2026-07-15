<?php

    session_start();

    require("../config/database.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST['email'];
        $senha_digitada = $_POST['senha'];

        $sql = ("SELECT * FROM usuarios WHERE email = :email");
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email,]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario && password_verify($senha_digitada, $usuario["senha"])){
            $_SESSION['usuario_id'] = $usuario['id'];
            
            header("Location: ../dashboard/index.php");
            exit;
        } else {
            $erro = "Email ou senha inválidos";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title> Login </title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow p-4">
            <?php if(isset($erro)):?>
                <div class="alert alert-danger" role="alert">
                    <?= $erro ?>
                </div>
            <?php endif; ?>
            
            <form action="index.php" method="POST">
                <div clas="mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id ="email" class="form-control" placeholder="email">
                </div>                    
                <div clas="mb-3">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="senha" class="form-control">
                </div>    
                <button type="submit" class="btn btn-success"> Entrar</button>
            </form>
        </div>
    </div>
</body>
</html>