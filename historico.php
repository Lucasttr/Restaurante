<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="css/menu.css">

    <style>
        body{
            background-color: #72321C;
        }

        table{
            font-family: jua;

            color:rgb(212, 199, 195);

            margin: 0 auto;

            width: 100%;

            margin-top: 30px;

            font-size: 25px;

            border-collapse: separate;

            border-spacing: 20px;

            text-align: left;

        }

        th{
            padding-left: 20px;

            text-align: center;

            padding-right: 30px;

            width: 100px;

        }

        th{
            border-bottom: 1px solid white;


        }
        
        td{
            padding-left: 20px;

            text-align: center;

            padding-right: 30px;
            
            
            


        }

        .box_valor{
            display: flex;
            justify-content: center;
            margin-top: 5%;
            margin-left: 45%;
        }

        .valor{
            font-size: 30px;
            margin-left: 20px;
            margin-top: 20px;
            font-family: jua;
            color:rgb(212, 199, 195);
        }
       
         
        body::-webkit-scrollbar {
            width: 12px; /* Largura da barra de rolagem */
        }

        body::-webkit-scrollbar-track {
            background: #72321C; /* Cor do trilho da barra de rolagem */
        }

        body::-webkit-scrollbar-thumb {
            background:rgba(82, 39, 4, 0.97); 
            border-radius: 10px; 
        }

        body::-webkit-scrollbar-thumb:hover {
            background: #555; 
        }

    </style>
</head>
<body >
<table>
    <tr>
        <th>Nome</th>
        <th>Mesa</th>
        <th>Abertura</th>
        <th>Fechamento</th>
        <th>Valor</th>

    </tr>

    <?php
    include("php/conexao.php");


    


 
        $sql = "SELECT * FROM Historico";
        $result = mysqli_query($conexao, $sql);
      

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                
                echo "<tr><td class='espacamento'>" . $row['Nome_Cliente']. "</td> <td>" . $row['mesa_cliente']. "</td>
                <td>" . $row['Data_Abertura']. "</td> <td>" . $row['Data_Fechamento']. "</td> <td>". "R$" . $row['Total'] + ($row['Total'] * 0.1)  . "</td> </tr>"; ;
            }
                echo "</table>";
        } else {

            echo "<tr><td colspan='5'>0 resultados</td></tr>";
        }

        


    
    ?>
    <a style="font-family:'JUA'; font-size :30px; text-align:right; margin-top:35.7%; display:flex;" href="menu.php">Voltar</a>
</body>
</html>