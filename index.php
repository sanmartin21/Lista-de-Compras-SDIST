<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/routes.php';

$sContent = render(
    $_GET['pg'] ??= 'listaDeCompras'
);

echo $sContent;
