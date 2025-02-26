<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Gasolina</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh; background: linear-gradient(135deg, #6a11cb, #2575fc); color: #fff; }
        .container { background: rgba(255, 255, 255, 0.1); padding: 20px; border-radius: 10px; backdrop-filter: blur(10px); box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); width: 90%; max-width: 400px; text-align: center; }
        h1 { font-size: 24px; margin-bottom: 15px; }
        form { display: flex; flex-direction: column; gap: 10px; }
        select, input[type="number"] { width: 100%; padding: 10px; border: none; border-radius: 5px; background: rgba(255, 255, 255, 0.2); color: #fff; outline: none; }
        select option { background: #6a11cb; color: #fff; }
        input[type="submit"] { background: #ff6f61; color: #fff; padding: 10px; border: none; border-radius: 5px; cursor: pointer; transition: background 0.3s ease; }
        input[type="submit"]:hover { background: #ff3b2f; }
        .result, table { margin-top: 15px; background: rgba(255, 255, 255, 0.1); padding: 10px; border-radius: 5px; }
        th, td { padding: 10px; text-align: center; border-bottom: 1px solid rgba(255, 255, 255, 0.1); }
        th { background: rgba(255, 255, 255, 0.2); }
        .error { color: #ff6f61; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Consumo de Gasolina</h1>
        <form method="post">
            <select name="vehiculo" required>
                <option value="camion5Ton">Camión 5 Ton</option>
                <option value="camion3Ton">Camión 3 Ton</option>
                <option value="pickup">Pickup</option>
                <option value="panel">Panel</option>
                <option value="moto">Moto</option>
            </select>
            <input type="number" name="distancia" placeholder="Distancia (Km)" min="0" required>
            <input type="submit" name="submit" value="Calcular">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $vehiculo = $_POST['vehiculo'];
            $distancia = $_POST['distancia'];

            if ($distancia < 0) {
                echo "<p class='error'>La distancia no puede ser un número negativo.</p>";
            } else {
                $consumo = [
                    "camion5Ton" => 12,
                    "camion3Ton" => 16,
                    "pickup" => 22,
                    "panel" => 28,
                    "moto" => 42
                ];

                if (array_key_exists($vehiculo, $consumo)) {
                    $galones = $distancia / $consumo[$vehiculo];
                    $vehiculoNombre = [
                        "camion5Ton" => "Camión 5 Ton",
                        "camion3Ton" => "Camión 3 Ton",
                        "pickup" => "Pickup",
                        "panel" => "Panel",
                        "moto" => "Moto"
                    ][$vehiculo];

                    echo "<div class='result'><p>El $vehiculoNombre recorrerá $distancia Km consumiendo " . number_format($galones, 2) . " Galones.</p></div>";
                }

                echo "<table><tr><th>Vehículo</th><th>Consumo (Km/Gal)</th></tr>";
                foreach ($consumo as $veh => $kmGal) {
                    $nombre = [
                        "camion5Ton" => "Camión 5 Ton",
                        "camion3Ton" => "Camión 3 Ton",
                        "pickup" => "Pickup",
                        "panel" => "Panel",
                        "moto" => "Moto"
                    ][$veh];
                    echo "<tr><td>$nombre</td><td>$kmGal</td></tr>";
                }
                echo "</table>";
            }
        }
        ?>
    </div>
</body>
</html>