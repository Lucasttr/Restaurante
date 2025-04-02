<?php
include("php/conexao.php");

$consulta = mysqli_query($conexao, "SELECT Cod_comida as codcomida, Nome_comida as Comidan, Preco_Comida as preco FROM Comida WHERE Tipo_comida = 2");
$comidas = array();

while ($linha = mysqli_fetch_array($consulta)) {
    $comidas[] = array(
        'codcomida' => $linha['codcomida'],
        'Comidan' => $linha['Comidan'],
        'preco' => $linha['preco']
    );
}

echo json_encode($comidas);

?>




