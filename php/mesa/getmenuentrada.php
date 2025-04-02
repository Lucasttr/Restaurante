<?php
include("../conexao.php"); // Verifique se o caminho está correto

header('Content-Type: application/json');

$consulta = mysqli_query($conexao, "SELECT Cod_comida as codcomida, Nome_comida as Comidan, Preco_Comida as preco FROM Comida WHERE Tipo_comida = 1");

if (!$consulta) {
    echo json_encode(['error' => 'Erro na consulta SQL: ' . mysqli_error($conexao)]);
    exit;
}

$comidas2 = array();

while ($linha = mysqli_fetch_array($consulta)) {
    $comidas2[] = array(
        'codcomida' => $linha['codcomida'],
        'Comidan' => $linha['Comidan'],
        'preco' => $linha['preco']
    );
}

echo json_encode($comidas2);
?>