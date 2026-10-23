<?php

header("Content-Type: text/plain; charset=utf-8");

function validarMonto(mixed $monto)
{
    if (!is_numeric($monto)) {
        throw new InvalidArgumentException("El valor ingresado no es numérico");
    }

    if ($monto <= 0) {
        throw new InvalidArgumentException("El monto debe ser mayor que cero");
    }

    return true;
}

class CuentaBancaria
{
    private float $saldo;
    private string $titular;

    public function __construct(string $titular, float $saldo)
    {
        validarMonto($saldo);
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function depositar(float $monto)
    {
        validarMonto($monto);
        $this->saldo += $monto;
    }

    public function retirar(float $monto)
    {
        validarMonto($monto);

        if ($monto > $this->saldo) {
            throw new Exception("Fondos insuficientes");
        }

        $this->saldo -= $monto;
    }

    public function getSaldo()
    {
        return $this->saldo;
    }

    public function getTitular()
    {
        return $this->titular;
    }

    public function consultarSaldo()
    {
        return "Saldo actual de {$this->titular}: $" . number_format($this->saldo, 2);
    }

    public function mostrarDatos()
    {
        echo "===== DATOS DE LA CUENTA =====\n";
        echo "Titular: " . $this->titular . "\n";
        echo "Saldo:   $" . number_format($this->saldo, 2) . "\n";
        echo "==============================\n";
    }
}

// ============================================================
// BANCO INTELIGENTE - PRUEBAS
// ============================================================

// 1. Crear cuenta para María con saldo inicial de 2000
echo "1. Creando cuenta para María con saldo inicial de 2000\n";
$cuenta = new CuentaBancaria("María", 2000);
$cuenta->mostrarDatos();

// 2. Depósito de 800
echo "\n2. Depositando 800\n";
$cuenta->depositar(800);
echo $cuenta->consultarSaldo() . "\n";

// 3. Retiro de 500
echo "\n3. Retirando 500\n";
$cuenta->retirar(500);
echo $cuenta->consultarSaldo() . "\n";

// 4. Consultar saldo actualizado
echo "\n4. Consulta de saldo actualizado\n";
echo $cuenta->consultarSaldo() . "\n";

// 5. Intentar retirar 10000 y capturar el error
echo "\n5. Intentando retirar 10000\n";
try {
    $cuenta->retirar(10000);
} catch (Exception $e) {
    echo "ERROR capturado: " . $e->getMessage() . "\n";
}
echo $cuenta->consultarSaldo() . " (no quedó negativo)\n";

// 6. Depositar 0 y un valor negativo
echo "\n6. Probando depósitos inválidos\n";
foreach ([0, -300] as $valor) {
    try {
        $cuenta->depositar($valor);
        echo "Depósito de $valor aceptado\n";
    } catch (InvalidArgumentException $e) {
        echo "Depósito de $valor -> ERROR capturado: " . $e->getMessage() . "\n";
    }
}
echo $cuenta->consultarSaldo() . "\n";