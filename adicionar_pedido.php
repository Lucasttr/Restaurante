<!DOCTYPE html>
<html lang="pt">
<?php
    include("php/conexao.php");
    ?>    


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <link rel="stylesheet" href="./css/menu.css">
    
    
</head>
<body>
    <script src="JS/custom.js"></script>
    <script src="JS/custom2.js"></script>
    <script src="JS/custom3.js"></script>
    <div class="nav"> 
        <ul>
            <a href="menu.php"><li>Menu</li></a>
            <a href="cardapio.html"> <li class="topicos_nav">Cardapio</li></a>
            <a href="historico.php"> <li class="topicos_nav">Historico</li></a>
        </ul>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['id_mesa']) && isset($_POST['cod_cliente'])) {
            $mesa = $_POST['id_mesa'];
            $cod_cliente = $_POST['cod_cliente'];
            echo "<h1 class='titulo_mesa'> Mesa " . htmlspecialchars($mesa) . "</h1>";
        } else {
            echo "<h1 class='titulo_mesa'> Erro: Mesa ou Cliente não definidos</h1>";
        }
    }
    ?>
  
        
        
    <div class="container">
    
        <!--FAZER PEDIDO-->
        <div class="pedido">
        <form action="atualizar_pedido.php" method="post">
                <h1>Fazer Pedido</h1> 
                <input type="hidden" name="cod_mesa" value="<?php echo $mesa; ?>"> 
                <input type="hidden" name="estado" value="1">
                

                

                <div id="formulario">
                    <div class="form-group">
                    <button style="background-color:#72321C; border: none" class ="maisinho" type="button" onclick="adicionarCampo()" > <img class="adicionar" src="./img/plus.png"> </button> <P style= "font-weight: 200; color: #ffff; font-size: 30px">COMIDA</P> 
                    </div>

                </div>

                
            
                <div id="formulario2">
                    <div class="form-group">
                    <button style="background-color:#72321C; border: none" class ="maisinho" type="button" onclick="adicionarCampo2()" > <img class="adicionar" src="./img/plus.png"> </button> <P style= "font-weight: 200; color: #ffff; font-size: 30px">ENTRADA</P> 
                    </div>

                </div>

                
                <div id="formulario3">
                    <div id="teste" class="form-group">
                    <button style="background-color:#72321C; border: none" class ="maisinho" type="button" onclick="adicionarCampo3()" > <img class="adicionar" src="./img/plus.png"> </button> <P style= "font-weight: 200; color: #ffff; font-size: 30px">BEBIDA</P> 
                    </div>

                </div>

            >

            
                
            <input type="hidden" name="cod_cliente" value="<?php echo $cod_cliente; ?>">

       
        </div>
        <div class="container2" >
            <!--DADOS DO PEDIDO-->
            <div class="dados">
                <h1>Dados do Pedido</h1>
                <iframe src="iframe_fechamento.php?cod_mesa=<?php echo $mesa; ?>" frameborder="0" width="95%" height="400" style="margin-left: 40px;"></iframe>
                </iframe>




            </div>
            <!--BOTÃO SUBMIT-->
            <button class="botão" type="submit" >Adicionar</button>
         </div>
        </div>
        </form>

    </div>
</body>
</html>