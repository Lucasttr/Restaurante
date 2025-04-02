<?php
include("php/conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mesa = $_POST['id_mesa'];

    if (!empty($mesa) && is_numeric($mesa)) {
        $mesa = intval($mesa); // Garantir que $mesa seja um inteiro

        // Desativar verificações de chave estrangeira
        mysqli_query($conexao, "SET FOREIGN_KEY_CHECKS=0");
        $historico = mysqli_query($conexao, "SELECT * FROM Cliente WHERE mesa_cliente = $mesa");

        if ($historico && mysqli_num_rows($historico) > 0) {
            while ($row = mysqli_fetch_assoc($historico)) {
                $cod = $row['Cod_Cliente'];
                $nome = $row['Nome_Cliente'];
                $mesa = $row['mesa_cliente'];
                $abertura = $row['Data_Abertura'];
                $total = $row['Total'];

                $inserir = "INSERT INTO Historico (Cod_Cliente, Nome_Cliente, mesa_cliente, Data_Abertura, Data_Fechamento, Total) VALUES ($cod, '$nome', $mesa, '$abertura', NOW(), $total)";
                mysqli_query($conexao, $inserir);
            }
        } else {
            echo "Nenhum cliente encontrado para a mesa $mesa.";
        }

        // Excluir registros da tabela cliente
        $stmt1 = $conexao->prepare("DELETE FROM cliente WHERE mesa_cliente = ?");
        $stmt1->bind_param("i", $mesa);
        $stmt1->execute();

        // Excluir registros da tabela pedido
        $stmt2 = $conexao->prepare("DELETE FROM pedido WHERE Cod_mesa = ?");
        $stmt2->bind_param("i", $mesa);
        $stmt2->execute();

        // Atualizar o status na tabela estatus
        $stmt3 = $conexao->prepare("UPDATE estatus SET Estado = 2 WHERE mesaid = ?");
        $stmt3->bind_param("i", $mesa);
        $stmt3->execute();

        // Reativar verificações de chave estrangeira
        mysqli_query($conexao, "SET FOREIGN_KEY_CHECKS=1");

        if ($stmt3->affected_rows > 0) {
            header("Location: menu.php");
            exit();
        } else {
            die('Erro ao atualizar o status: ' . $stmt3->error);
        }

        $stmt1->close();
        $stmt2->close();
        $stmt3->close();
    } else {
        die('ID da mesa não fornecido ou inválido.');
    }
}
?>