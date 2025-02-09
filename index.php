<?php
require_once 'src/Calculadora.php';
use App\Calculadora;
$resultado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $a = isset($_POST['a']) ? floatval($_POST['a']) : 0;
    $b = isset($_POST['b']) ? floatval($_POST['b']) : 0;
    $calculadora = new Calculadora();
    if (isset($_POST['suma'])) {
        $resultado = $calculadora->suma($a, $b);
    } elseif (isset($_POST['resta'])) {
        $resultado = $calculadora->resta($a, $b);
    } elseif (isset($_POST['multiplicacion'])) {
        $resultado = $calculadora->multiplicacion($a, $b);
    } elseif (isset($_POST['division'])) {
        $resultado = $calculadora->division($a, $b);
    } elseif (isset($_POST['raiz'])) {
        $resultado = $calculadora->raiz($a); // Solo toma el valor de $a
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div>
        <h1>Calculadora</h1>
        <form method="post">
            <input type="number" step="any" name="a" placeholder="Numero 1" required>
            <input type="number" step="any" name="b" placeholder="Numero 2">
            <div>
                <button type="submit" name="suma">Sumar</button>
                <button type="submit" name="resta">Restar</button>
                <button type="submit" name="multiplicacion">Multiplicar</button>
                <button type="submit" name="division">Dividir</button>
                <button type="submit" name="raiz">Hacer raíz cuadrada</button>
            </div>
        </form>
        <?php if ($resultado !== ''): ?>
            <div>
                <h2>Resultado: <?php echo $resultado; ?></h2>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>