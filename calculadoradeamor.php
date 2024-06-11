<?php
function calcularCompatibilidad($nombre1, $nombre2) {
    // Convierte los nombres a minúsculas y quita los espacios para una comparación más justa
    $nombre1 = strtolower(str_replace(' ', '', $nombre1));
    $nombre2 = strtolower(str_replace(' ', '', $nombre2));

    // Verifica si los nombres son "Brisa" y "Matias" para una compatibilidad del 100%
    if (($nombre1 == 'brisa' && $nombre2 == 'matias') || ($nombre1 == 'matias' && $nombre2 == 'brisa')) {
        return 100;
    }

    // Genera una semilla basada en la combinación de los nombres
    $seed = crc32($nombre1 . $nombre2);
    srand($seed);
    
    // Genera un porcentaje aleatorio basado en la semilla
    $compatibilidad = rand(0, 100);
    
    return $compatibilidad;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $compatibilidad = calcularCompatibilidad($nombre1, $nombre2);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Amor</title>
    <style>
        body {
            background-color: #ffe6e6;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        .container {
            background-color: #fff0f5;
            border: 2px solid #ffb6c1;
            border-radius: 10px;
            display: inline-block;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ff69b4;
        }

        label {
            color: #ff1493;
        }

        input[type="text"] {
            padding: 10px;
            border: 2px solid #ffb6c1;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #ff69b4;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #ff1493;
        }

        h2 {
            color: #ff69b4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Amor</h1>
        <form method="POST">
            <label for="nombre1">Nombre 1:</label><br>
            <input type="text" id="nombre1" name="nombre1" required><br><br>
            
            <label for="nombre2">Nombre 2:</label><br>
            <input type="text" id="nombre2" name="nombre2" required><br><br>
            
            <input type="submit" value="Calcular Compatibilidad">
        </form>

        <?php
        if (isset($compatibilidad)) {
            echo "<h2>Compatibilidad entre $nombre1 y $nombre2: $compatibilidad%</h2>";
        }
        ?>
    </div>
</body>
</html>
