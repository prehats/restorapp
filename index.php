<?php

require "core/config.php";

$hora = date("H:i:s");

?>
<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Restorapp</title>

<link rel="stylesheet" href="assets/style.css">

</head>

<body>

<header>

<div class="titulo">

<h1>Restorapp</h1>

<h2><?php echo htmlspecialchars($restaurantName); ?></h2>

</div>

<div class="hora">

<?php echo date("H:i:s"); ?>

</div>

</header>

<section class="panel">

<div class="estado">

<p>

<strong>Servidor:</strong>

<?php echo ($dashboard["server"]) ? "Activo" : "Desconectado"; ?>

</p>

<p>

<strong>Mesas:</strong>

<?php echo $totalTables; ?>

</p>

<p>

<strong>Servidas:</strong>

<?php echo $dashboard["served"]; ?>

</p>

<p>

<strong>Pedidos:</strong>

<?php echo $dashboard["orders"]; ?>

</p>

<p>

<strong>Mozos:</strong>

<?php echo implode(" · ", $dashboard["waiters"]); ?>

</p>

</div>

<div class="config">

<a href="conf_local/local_conf.php">

Configuración Local

</a>

<a href="#">

Configuración Menú

</a>

<a href="#">

Configuración Mozos

</a>

</div>

</section>

<hr>

<section class="tickets">

<?php

for($i=1;$i<=$totalTables;$i++)
{

?>

<div class="ticket estado-pedido">

<div class="ticket-top"></div>

<h3>MESA <?php echo $i; ?></h3>

<hr>

<p>

<strong>Estado</strong>

</p>

<p>

Pedido tomado

</p>

<hr>

<p>

<strong>Plato</strong>

</p>

<p>

Pizza Muzzarella

</p>

<hr>

<p>

<strong>Mozo</strong>

</p>

<p>

Felipe

</p>

<hr>

<p>

<strong>Total</strong>

</p>

<p>

$580

</p>

</div>

<?php

}

?>

</section>

</body>

</html>