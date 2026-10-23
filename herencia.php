<?php
class Animal {
  protected $nombre = "";
  public function setNombre($n) { $this->nombre = $n; }
  public function sonido() { return "..."; }
  public function hablar() {
    return $this->nombre . " dice " . $this->sonido();
  }
}
class Perro extends Animal {
  public function sonido() { return "Guau"; }
}
class Gato extends Animal {
  public function sonido() { return "Miau"; }
}
$p = new Perro(); $p->setNombre("Rex");
$g = new Gato(); $g->setNombre("Misi");
foreach ([$p, $g] as $a) { echo $a->hablar() . PHP_EOL; }