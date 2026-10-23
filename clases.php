<?php
class Aprendiz {
  public $nombre;
  public $ficha;
  public function presentarse() {
    return "Soy $this->nombre, ficha $this->ficha";
  }
}
$a = new Aprendiz();
$a->nombre = "Luis";
$a->ficha = 1234567;
echo $a->presentarse() . PHP_EOL;
$b = new Aprendiz();
$b->nombre = "Ana";
$b->ficha = 7654321;
echo $b->presentarse() . PHP_EOL;