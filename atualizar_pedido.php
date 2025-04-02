<?php
include("php/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $qte = $_POST['qte'];
    $codcomida = $_POST['codcomida'];
    $cod_mesa = $_POST['cod_mesa'];
    $cod_cliente = $_POST['cod_cliente'];

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
        }

        $sql = "INSERT INTO Pedido (Quantidade, Cod_comida, Preco_total_comida, Nome_comida, Cod_mesa) VALUES ('$quantidade', '$codigo_comida', '$preco_total','$nome_comida' ,'$cod_mesa')";
        if (!mysqli_query($conexao, $sql)) {
            echo "Erro ao inserir o pedido: " . mysqli_error($conexao);
        }

        $result_cliente = mysqli_query($conexao, "SELECT Cod_Cliente FROM Cliente WHERE mesa_cliente = '$cod_mesa'");
        if (mysqli_num_rows($result_cliente) > 0) {
            $row_cliente = mysqli_fetch_assoc($result_cliente);
            $cod_cliente = $row_cliente['Cod_Cliente'];

            // Atualiza o total do cliente existente
            $sql_update_total = "UPDATE Cliente SET Total = Total + '$total_pedido' WHERE Cod_Cliente = '$cod_cliente'";
            if (mysqli_query($conexao, $sql_update_total)) {
                echo "Total atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar o total: " . mysqli_error($conexao);
            }
        } else {
            echo "Erro: Cliente não encontrado para a mesa $cod_mesa.";
        }
    } else {
        echo "Erro: O número de quantidades e códigos de comida não correspondem.";
    }
}

header("Location: menu.php");
exit();
?>