# portilloag.github.io

<?php
$seccion = isset($_GET['p']) ? $_GET['p'] : 'inicio';

$secciones_validas = ["inicio", "productos", "contacto", "alumnas", "detalle", "enviado"];
if (!in_array($seccion, $secciones_validas)) {
    $seccion = '404';
}

require_once "includes/head.php";
require_once "includes/header.php";
require_once "vistas/$seccion.php";
require_once "includes/footer.php";
