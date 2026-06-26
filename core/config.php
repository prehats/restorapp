<?php

require_once __DIR__."/constants.php";
require_once __DIR__."/functions.php";

date_default_timezone_set("America/Montevideo");

/*
|--------------------------------------------------------------------------
| Configuración Local
|--------------------------------------------------------------------------
*/

$config=[];

$config["local"]=loadJson(

    LOCAL_PATH."/local.json",

    [

        "restaurant_name"=>"Mi Restaurante",

        "tables"=>10

    ]

);

/*
|--------------------------------------------------------------------------
| Variables rápidas
|--------------------------------------------------------------------------
*/

$restaurantName=$config["local"]["restaurant_name"];

$totalTables=$config["local"]["tables"];

/*
|--------------------------------------------------------------------------
| Dashboard (Temporal)
|--------------------------------------------------------------------------
*/

$dashboard=[

    "server"=>true,

    "served"=>4,

    "orders"=>6,

    "waiters"=>[

        "Felipe",

        "Juan",

        "Camila"

    ]

];