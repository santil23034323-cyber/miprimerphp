<?php
class Conexion {
  private $nombre;
  public function __construct($nombre) {
    $this->nombre = $nombre;
    echo "Abierta: $nombre" . PHP_EOL;
  }
  public function __destruct() {
    echo "Cerrada: $this->nombre" . PHP_EOL;
  }
}
$c = new Conexion("MiBD");
echo "Trabajando..." . PHP_EOL;
unset($c);
echo "Fin" . PHP_EOL;