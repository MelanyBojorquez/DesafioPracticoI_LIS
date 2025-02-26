<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Longitud</title>
    <style>
        body { font-family: 'Arial', sans-serif; margin: 0; padding: 20px; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; background: #f9f9f9; }
        h2 { font-size: 24px; margin-bottom: 20px; color: #333; }
        .converter { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); width: 100%; max-width: 800px; text-align: center; }
        input[type="number"], select { width: calc(100% - 20px); padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 4px; font-size: 16px; }
        input[type="submit"] { background-color: #007bff; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; }
        input[type="submit"]:hover { background-color: #0056b3; }
        .result { margin-top: 20px; width: 100%; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px; text-align: center; border-bottom: 1px solid #ddd; }
        th { background-color: #007bff; color: white; }
    </style>
</head>
<body>

    <h2>Conversor de Longitud</h2>

    <div class="converter">
        <form method="post">
            <input type="number" id="cantidad" name="cantidad" step="any" placeholder="Cantidad" required>
            <select name="unidad" id="unidad" required>
                <option value="metros">Metros</option>
                <option value="pulgadas">Pulgadas</option>
                <option value="yardas">Yardas</option>
                <option value="pies">Pies</option>
            </select>
            <input type="submit" value="Convertir">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cantidad = $_POST["cantidad"];
            $unidad = $_POST["unidad"];
            $conversiones = [
                "metros" => ["Pulgadas" => 39.3701, "Yardas" => 1.09361, "Pies" => 3.28084],
                "pulgadas" => ["Metros" => 0.0254, "Yardas" => 0.0277778, "Pies" => 0.0833333],
                "yardas" => ["Metros" => 0.9144, "Pulgadas" => 36, "Pies" => 3],
                "pies" => ["Metros" => 0.3048, "Pulgadas" => 12, "Yardas" => 0.333333]
            ];

            echo "<div class='result'>";
            echo "<table>";
            echo "<tr><th>De</th><th>A</th><th>Valor</th></tr>";
            foreach ($conversiones[$unidad] as $key => $valor) {
                echo "<tr><td>$cantidad $unidad</td><td>$key</td><td>" . number_format($cantidad * $valor, 4) . "</td></tr>";
            }
            echo "</table>";
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>