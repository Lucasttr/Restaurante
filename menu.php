<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <div class="nav"> 
        <ul>
            <a href="menu.php"><li class="topicos_nav">Menu</li></a>
            <a href="cardapio.html"> <li class="topicos_nav">Cardapio</li></a>
            <a href="historico.php"> <li class="topicos_nav">Historico</li></a>
        </ul>
    </div>
    <form id="mesaForm" method="post" target="_self">
    <div class="row">
        
    <div class="box">
            <?php
            include('./php/conexao.php');

            $consulta = mysqli_query($conexao, "SELECT mesa.Cod_Mesa as 'Cod_Mesa', mesa.Cod_Estatus as 'Cod_Status', estatus.Estado as 'Status'
                                    FROM mesa
                                    LEFT JOIN estatus
                                    ON mesa.Cod_Estatus = estatus.Cod_Estatus
                                    WHERE Cod_Mesa = 1;") or die (mysqli_error($conexao));

            if (mysqli_num_rows($consulta) > 0) {
                $resultado = mysqli_fetch_assoc($consulta);
                $status = $resultado['Status'] == 1 ? 'Aberta' : 'Fechada';
            } else {
                $status = 'ERRO';
            }
            ?>
            <button style="cursor:pointer;" type="button" class="box-interna" name="mesa" value="1" data-status="<?php echo $status; ?>">
               <div><img src="img/mesa 1.png" alt="mesa" ></div>
            </button>
            <div>
                <h1 class="titulo">MESA 1</h1>
                <?php
                if ($status == 'Aberta') {
                    echo '<p class="status">Aberta</p>';
                } elseif ($status == 'Fechada') {
                    echo '<p class="status_fechado">Fechada</p>';
                } else {
                    echo '<p class="status">ERRO</p>';
                }
                ?>
            </div>
        </div>

        <div class="box">
            <?php
            include('./php/conexao.php');

            $consulta = mysqli_query($conexao, "SELECT mesa.Cod_Mesa as 'Cod_Mesa', mesa.Cod_Estatus as 'Cod_Status', estatus.Estado as 'Status'
                                    FROM mesa
                                    LEFT JOIN estatus
                                    ON mesa.Cod_Estatus = estatus.Cod_Estatus
                                    WHERE Cod_Mesa = 2;") or die (mysqli_error($conexao));

            if (mysqli_num_rows($consulta) > 0) {
                $resultado = mysqli_fetch_assoc($consulta);
                $status = $resultado['Status'] == 1 ? 'Aberta' : 'Fechada';
            } else {
                $status = 'ERRO';
            }
            ?>
            <button style="cursor:pointer;" type="button" class="box-interna" name="mesa" value="2" data-status="<?php echo $status; ?>">
               <div><img src="img/mesa 1.png" alt="mesa" ></div>
            </button>
            <div>
                <h1 class="titulo">MESA 2</h1>
                <?php
                if ($status == 'Aberta') {
                    echo '<p class="status">Aberta</p>';
                } elseif ($status == 'Fechada') {
                    echo '<p class="status_fechado">Fechada</p>';
                } else {
                    echo '<p class="status">ERRO</p>';
                }
                ?>
            </div>
        </div>

        <div class="box">
            <?php
            include('./php/conexao.php');

            $consulta = mysqli_query($conexao, "SELECT mesa.Cod_Mesa as 'Cod_Mesa', mesa.Cod_Estatus as 'Cod_Status', estatus.Estado as 'Status'
                                    FROM mesa
                                    LEFT JOIN estatus
                                    ON mesa.Cod_Estatus = estatus.Cod_Estatus
                                    WHERE Cod_Mesa = 3;") or die (mysqli_error($conexao));

            if (mysqli_num_rows($consulta) > 0) {
                $resultado = mysqli_fetch_assoc($consulta);
                $status = $resultado['Status'] == 1 ? 'Aberta' : 'Fechada';
            } else {
                $status = 'ERRO';
            }
            ?>
            <button style="cursor:pointer;" type="button" class="box-interna" name="mesa" value="3" data-status="<?php echo $status; ?>">
               <div><img src="img/mesa 1.png" alt="mesa" ></div>
            </button>
            <div>
                <h1 class="titulo">MESA 3</h1>
                <?php
                if ($status == 'Aberta') {
                    echo '<p class="status">Aberta</p>';
                } elseif ($status == 'Fechada') {
                    echo '<p class="status_fechado">Fechada</p>';
                } else {
                    echo '<p class="status">ERRO</p>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="row2">
    <div class="box2">
            <?php
            include('./php/conexao.php');

            $consulta = mysqli_query($conexao, "SELECT mesa.Cod_Mesa as 'Cod_Mesa', mesa.Cod_Estatus as 'Cod_Status', estatus.Estado as 'Status'
                                    FROM mesa
                                    LEFT JOIN estatus
                                    ON mesa.Cod_Estatus = estatus.Cod_Estatus
                                    WHERE Cod_Mesa = 4;") or die (mysqli_error($conexao));

            if (mysqli_num_rows($consulta) > 0) {
                $resultado = mysqli_fetch_assoc($consulta);
                $status = $resultado['Status'] == 1 ? 'Aberta' : 'Fechada';
            } else {
                $status = 'ERRO';
            }
            ?>
            <button style="cursor:pointer;" type="button" class="box-interna" name="mesa" value="4" data-status="<?php echo $status; ?>">
               <div><img src="img/mesa 1.png" alt="mesa" ></div>
            </button>
            <div>
                <h1 class="titulo">MESA 4</h1>
                <?php
                if ($status == 'Aberta') {
                    echo '<p class="status">Aberta</p>';
                } elseif ($status == 'Fechada') {
                    echo '<p class="status_fechado">Fechada</p>';
                } else {
                    echo '<p class="status">ERRO</p>';
                }
                ?>
            </div>
        </div>
        <div class="box2">
            <?php
            include('./php/conexao.php');

            $consulta = mysqli_query($conexao, "SELECT mesa.Cod_Mesa as 'Cod_Mesa', mesa.Cod_Estatus as 'Cod_Status', estatus.Estado as 'Status'
                                    FROM mesa
                                    LEFT JOIN estatus
                                    ON mesa.Cod_Estatus = estatus.Cod_Estatus
                                    WHERE Cod_Mesa = 5;") or die (mysqli_error($conexao));

            if (mysqli_num_rows($consulta) > 0) {
                $resultado = mysqli_fetch_assoc($consulta);
                $status = $resultado['Status'] == 1 ? 'Aberta' : 'Fechada';
            } else {
                $status = 'ERRO';
            }
            ?>
            <button style="cursor:pointer;" type="button" class="box-interna" name="mesa" value="5" data-status="<?php echo $status; ?>">
               <div><img src="img/mesa 1.png" alt="mesa" ></div>
            </button>
            <div>
                <h1 class="titulo">MESA 5</h1>
                <?php
                if ($status == 'Aberta') {
                    echo '<p class="status">Aberta</p>';
                } elseif ($status == 'Fechada') {
                    echo '<p class="status_fechado">Fechada</p>';
                } else {
                    echo '<p class="status">ERRO</p>';
                }
                ?>
            </div>
        </div>
        <div class="box2">
            <?php
            include('./php/conexao.php');

            $consulta = mysqli_query($conexao, "SELECT mesa.Cod_Mesa as 'Cod_Mesa', mesa.Cod_Estatus as 'Cod_Status', estatus.Estado as 'Status'
                                    FROM mesa
                                    LEFT JOIN estatus
                                    ON mesa.Cod_Estatus = estatus.Cod_Estatus
                                    WHERE Cod_Mesa = 6;") or die (mysqli_error($conexao));

            if (mysqli_num_rows($consulta) > 0) {
                $resultado = mysqli_fetch_assoc($consulta);
                $status = $resultado['Status'] == 1 ? 'Aberta' : 'Fechada';
            } else {
                $status = 'ERRO';
            }
            ?>
            <button style="cursor:pointer;" type="button" class="box-interna" name="mesa" value="6" data-status="<?php echo $status; ?>">
               <div><img src="img/mesa 1.png" alt="mesa" ></div>
            </button>
            <div>
                <h1 class="titulo">MESA 6</h1>
                <?php
                if ($status == 'Aberta') {
                    echo '<p class="status">Aberta</p>';
                } elseif ($status == 'Fechada') {
                    echo '<p class="status_fechado">Fechada</p>';
                } else {
                    echo '<p class="status">ERRO</p>';
                }
                ?>
            </div>
        </div>
    </div>
    </form>

    <script>
        document.querySelectorAll('button[data-status]').forEach(button => {
            button.addEventListener('click', function() {
                const status = this.getAttribute('data-status');
                const form = document.getElementById('mesaForm');
                const mesa = this.getAttribute('value');
                
                if (status === 'Aberta') {
                    form.action = 'atualizar_mesa.php';
                } else if (status === 'Fechada') {
                    form.action = 'mesa.php';
                } else {
                    form.action = 'erro.php';
                }
                
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'mesa';
                input.value = mesa;
                form.appendChild(input);
                
                form.submit();
            });
        });
    </script>
</body>
</html>