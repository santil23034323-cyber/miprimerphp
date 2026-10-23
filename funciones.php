<?php
echo strtoupper("joa") . PHP_EOL;
echo strlen("joa") . PHP_EOL;

function saludar($nombre, $saludo = "Hola") {
  return "$saludo, $nombre!";
}
echo saludar("Ana") . PHP_EOL;
echo saludar("Luis", "Buenas") . PHP_EOL;
