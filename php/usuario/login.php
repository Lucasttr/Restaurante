<?php

    include_once('../conexao.php');

    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $consulta = mysqli_query($conexao, "SELECT * 
                                        FROM Garcom 
                                        WHERE Usuario = '$login' AND Senha = '$senha'") or die (mysqli_error($conexao));
    $linhas = mysqli_num_rows($consulta);
    if($linhas == 0){
        header("Location: .././index.html");
        exit();
    } else {
        $_SESSION["login"] = $login;
        $_SESSION["senha"] = $senha;
        header("Location: ../../menu.php");
        exit();
    }
    ?>


