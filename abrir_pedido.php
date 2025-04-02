<?php
include("php/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qte = $_POST['qte'];
    $codcomida = $_POST['codcomida'];
    $cod_mesa = $_POST['cod_mesa'];
    $estado = $_POST['estado'];
    $nome_cliente = $_POST['nome_cliente'];


    if (count($qte) == count($codcomida)) {
        $total_pedido = 0;
        for ($i = 0; $i < count($qte); $i++) {
            $quantidade = $qte[$i];
            $codigo_comida = $codcomida[$i];

            $result = mysqli_query($conexao, "SELECT Nome_Comida, Preco_Comida FROM Comida WHERE Cod_comida = '$codigo_comida'");

            if (!$result) {
                echo "Erro na consulta SQL: " . mysqli_error($conexao);
                continue;
            }

            $row = mysqli_fetch_assoc($result);
            if (!$row) {
                echo "Nenhum resultado encontrado para Cod_comida = '$codigo_comida'";
                continue;
            }

            $nome_comida = $row['Nome_Comida'];
            $preco_unid = $row['Preco_Comida'];
            $preco_total = $preco_unid * $quantidade;

            $total_pedido += $preco_total;

            $sql = "INSERT INTO Pedido (Quantidade, Cod_comida, Preco_total_comida, Nome_comida, Cod_mesa) VALUES ('$quantidade', '$codigo_comida', '$preco_total','$nome_comida' ,'$cod_mesa')";

            if (mysqli_query($conexao, $sql)) {
                echo "Pedido de comida inserido com sucesso!";
            } else {
                echo "Erro: " . $sql . "<br>" . mysqli_error($conexao);
            }
        }
    
        $sql_update_total = "INSERT INTO Cliente (Nome_cliente, Total, mesa_cliente) VALUES ('$nome_cliente', '$total_pedido', '$cod_mesa')
                             ON DUPLICATE KEY UPDATE Total = Total + '$total_pedido'";
        if (!mysqli_query($conexao, $sql_update_total)) {
            echo "Erro ao atualizar o total de pedidos: " . mysqli_error($conexao);
        }
    } else {
        echo "Erro: O número de quantidades e códigos de comida não correspondem.";
    }




    $sql_update = "UPDATE estatus SET Estado = 1, mesaid = '$cod_mesa' WHERE Cod_Estatus = '$cod_mesa'";
    if (mysqli_query($conexao, $sql_update)) {
        echo "Estado da mesa atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o estado da mesa: " . mysqli_error($conexao);
    }
}

// adicionar pedido





header("Location: menu.php");
exit();
?>