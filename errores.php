<?php
function dividir($a, $b) {
  if ($b == 0) {
    throw new Exception("No se puede dividir por 0");
  }
  return $a / $b;
}
try {
  echo dividir(10, 2) . PHP_EOL;
  echo dividir(10, 0) . PHP_EOL;
} catch (Exception $e) {
  echo "Error: " . $e->getMessage() . PHP_EOL;
} finally {
  echo "Fin del programa" . PHP_EOL;
}