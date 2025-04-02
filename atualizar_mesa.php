<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar mesa</title>
    <link rel="stylesheet" href="css/menu.css">
    <style>
        .titulo_atualiza2{
            font-size: 25px;
            font-family: jua;
            text-align: center;
            margin-left: 55px;
            position: relative;
            margin-top: 7%;
            color:rgb(212, 199, 195);
        }
        .principal_atualiza2 {
            position:relative;
            margin-top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60%;
            height: 1100px;
            background-color: #72321c;
            border-radius: 20px;
        }
    </style>
</head>
<body style="max-height: 1300px;">
    <div class="nav"> 
        <ul>
            <a href="menu.php"><li class="topicos_nav">Menu</li></a>
            <a href="cardapio.html"> <li class="topicos_nav">Cardapio</li></a>
            <a href="historico.php"> <li class="topicos_nav">Historico</li></a>
        </ul>
    </div>

    <div class="principal_atualiza2">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mesa = $_POST['mesa'];
            echo "<div class='head_mesa'>";
            echo "<h1 class='titulo_atualiza'> Mesa " . htmlspecialchars($mesa) . "</h1>";
            echo "</div>";
        }
        ?>
        <iframe src="iframe_fechamento.php?cod_mesa=<?php echo htmlspecialchars($mesa); ?>" frameborder="0" width="95%" height="600" style="margin-left: 40px; margin-top: 40px;"></iframe>

        <?php
        include("php/conexao.php");
        $cod_cliente = null;
        if (isset($mesa)) {
            $consulta = "SELECT Cod_cliente as cod_cliente, Nome_cliente as Nome FROM Cliente WHERE mesa_cliente = $mesa";
            $result = mysqli_query($conexao, $consulta);
            if (mysqli_num_rows($result) > 0) {
                $resultado = mysqli_fetch_assoc($result);
                $cod_cliente = $resultado['cod_cliente'];
                
                echo "<h1 class='titulo_atualiza2'> Cliente: " . htmlspecialchars($resultado['Nome']) . "</h1>";
            } else {
                echo "<h1 class='titulo_atualiza2'> Cliente: ERRO</h1>";
            }
        }
        ?>

        <hr class="linha_atualiza">
        <form id="fechar_atualizar" method="post">
            <input type="hidden" name="cod_cliente" value="<?php echo htmlspecialchars($cod_cliente); ?>">
            <input type="hidden" name="id_mesa" value="<?php echo htmlspecialchars($mesa); ?>">

            <div class="box_button">
                <button type="button" class="button_atualiza" id="atualiza">
                    Adicionar pedido
                </button>
                <button type="button" class="button_atualiza" id="fechar">
                    Fechar pedido
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('atualiza').addEventListener('click', function() {
            const form = document.getElementById('fechar_atualizar');
            form.action = 'adicionar_pedido.php';
            form.submit();
        });

        document.getElementById('fechar').addEventListener('click', function() {
            const form = document.getElementById('fechar_atualizar');
            form.action = 'fechamento.php';
            form.submit();
        });
    </script>
</body>
</html>