<?php

$api_url = 'https://www.el-tiempo.net/api/json/v2/provincias/28/municipios/28058';

$response = file_get_contents($api_url);

if ($response === false) {
    die('Error: No se pudo obtener los datos de la API.');
}

$data = json_decode($response, true);

if (!isset($data['prediccion'])) {
    die('Error: No se encontró información de predicción.');
}

$forecast = array_slice($data['prediccion'], 0, 5);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiempo en Fuenlabrada</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }
        .weather-card { border: 1px solid #ccc; padding: 10px; margin: 10px 0; border-radius: 5px; }
        .weather-card h2 { margin: 0; }
        .weather-card p { margin: 5px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tiempo en Fuenlabrada</h1>
        <?php foreach ($forecast as $day): ?>
        <div class="weather-card">
            <h2><?php echo $day['dia']; ?></h2>
            <p><strong>Temperatura mínima:</strong> <?php echo $day['tMin']; ?>°C</p>
            <p><strong>Temperatura máxima:</strong> <?php echo $day['tMax']; ?>°C</p>
            <p><strong>Estado del cielo:</strong> <?php echo $day['estadoCielo']; ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>

