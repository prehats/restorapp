<?php

require "../core/config.php";

$configPath = LOCAL_PATH . "/local.json";

$config = loadJson($configPath,[
    "restaurant_name" => "Mi Restaurante",
    "tables" => 10
]);

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $config["restaurant_name"] = trim($_POST["restaurant_name"]);

    $config["tables"] = intval($_POST["tables"]);

    if($config["tables"] < 1)
        $config["tables"] = 1;

    if($config["tables"] > 100)
        $config["tables"] = 100;

    saveJson($configPath,$config);

    header("Location: local_conf.php?saved=1");

    exit;

}

?>
<!DOCTYPE html>

<html lang="es">

<head>

<meta charset="UTF-8">

<title>Configuración Local</title>

<link rel="stylesheet" href="../assets/local_conf.css">
<link rel="stylesheet" href="<?= BASE_URL ?>/assets/modal.css">

</head>

<body>

<div class="container">

<h1>Configuración del Local</h1>

<?php

if(isset($_GET["saved"])){

    echo "<div class='ok'>Configuración guardada correctamente.</div>";

}

?>

<form id="formLocal" method="post">

<label>

Nombre del Restaurante

<input
type="text"
name="restaurant_name"
value="<?php echo htmlspecialchars($config["restaurant_name"]); ?>"
required>

</label>

<label>

Cantidad de Mesas

<input
type="number"
name="tables"
min="1"
max="100"
value="<?php echo $config["tables"]; ?>">

</label>

<div class="buttons">

<button

type="button"

onclick="showModal({

title:'Guardar configuración',

message:'¿Desea guardar los cambios realizados?',

okText:'Guardar',

okColor:'#2e7d32',

onOk:function(){

document.getElementById('formLocal').submit();

}

})">

Guardar

</button>

<a href="<?= BASE_URL ?>/index.php">

Volver al Dashboard

</a>

</div>

</form>

</div>

<div id="modalOverlay">

    <div id="modalWindow">

        <div class="modalHeader" id="modalTitle">

        </div>

        <div class="modalBody" id="modalMessage">

        </div>

        <div class="modalFooter">

            <button
                class="modalButton modalCancel"
                onclick="closeModal()">

                Cancelar

            </button>

            <button
                id="modalOk"
                class="modalButton modalOk"
                onclick="modalOk()">

                Aceptar

            </button>

        </div>

    </div>

</div>

<script src="<?= BASE_URL ?>/assets/modal.js"></script>
</body>

</html>