<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar mesa</title>
    <link rel="stylesheet" href="css/menu.css">

    <style>
        .input2{
    width: 100%;

    height: 80px;

    font-family: jua;

    font-size: 2em;

    padding-left: 30px;

    border-radius: 20px;

    background-color: rgba(205, 162, 84, 1);

    outline: none;

    border: none;

    color: black;

    margin-top: auto; 
    } 
    .principal_atualiza2{

    position: relative;

    margin-top: 25%;

    left: 50%;
    
    transform: translate(-50%, -50%);

    width: 55%;
    
    height: 840px;
    

    background-color: #72321C;

    border-radius: 20px;


    justify-content: space-between; 

}
option{
    font-family: jua;
}

body{
    max-height: 1000px;
}

.titulo_atualiza2{
            font-size: 25px;

            font-family: jua;

            text-align: center;

            position: relative;

        }
 </style>
</head>
<body>
    <div class="nav"> 
        <ul>
            <a href="menu.php"><li>Menu</li></a>
            <a href="cardapio.html"> <li style="margin-left: 35px;">Cardapio</li></a>
            <a href="historico.php"> <li style="margin-left: 35px;">Historico</li></a>
    </div>
        <div class="principal_atualiza2">
            <!--DADOS DO PEDIDO-->
            
            <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mesa = $_POST['id_mesa'];
            echo "<div class='head_mesa'>";
            echo "<h1 class='titulo_atualiza'> Mesa " . $mesa."</h1>";
            echo "</div>";
        }
        ?>

        <iframe src="iframe_fechamento.php?cod_mesa=<?php echo $mesa; ?>" frameborder="0" width="95%" height="400" style="margin-left: 40px; margin-top: 40px;"></iframe>
        </iframe>

        <?php
        include("php/conexao.php");
        $consulta = "SELECT  Nome_cliente as Nome FROM Cliente  WHERE mesa_cliente = $mesa";
        $result = mysqli_query($conexao, $consulta);
        if (mysqli_num_rows($result) > 0) {
            $resultado = mysqli_fetch_assoc($result);
            echo "<h1 class='titulo_atualiza2'> Cliente: " . htmlspecialchars($resultado['Nome']) . "</h1>";
        } else {
            echo "<h1 class='titulo_atualiza2'> Cliente: ERRO</h1>";
        }
        ?>
                <div class="pedido" style="margin: 0 auto;">
                    <form action="fechar_pedido.php" method="post"> 
                    <input type="hidden" name="id_mesa" value="<?php echo $mesa; ?>"> 
                    <div class="input-container">
                        <select class="input2" name="pagamento" required>
                            <option value="" disabled selected>Forma de pagamento</option>
                            <option value="1"><p>Credito</p></option>
                            <option value="2"><p>Debito</p></option>
                            <option value="3"><p>Pix</p></option>
                        </select>
                    </div>
           
            </div>
                    <button type="submit" class="button_atualiza">Fechar mesa</button>
            </div>
            </form>
            <!--BOTÃO SUBMIT-->
    
         </div>
</body>
</html>