<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiConversor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1{
                text-align:center;
                text-decoration: underline;
                font-style: italic;

        }
        .swap-btn {
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .btn-secondary{
            background-color:rgb(67, 138, 209);
        }
        .currency-option {
            display: flex;
            align-items: center;
        }
        .currency-option img {
            width: 25px;
            height: 15px;
            margin-right: 10px;
        }

        .conversion-result {
        color: rgb(67, 138, 209);
        font-weight: bold;
    }

        
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-primary">MiConversor📱</h1>
        <form method="POST">
            <div class="mb-3">
                <input type="number" name="amount" id="amount" class="form-control" placeholder="Ingrese monto" required>
            </div>
            <div class="mb-3">
                <select name="from_currency" id="from_currency" class="form-select" required>
                    <option value="USD" data-flag="img/USD.png">Dólares Americanos (USD)</option>
                    <option value="EUR" data-flag="img/eur.png">Euros (EUR)</option>
                    <option value="GBP" data-flag="img/UK.png">Libras Esterlinas (GBP)</option>
                    <option value="JPY" data-flag="img/japon.png">Yenes Japoneses (JPY)</option>
                </select>
            </div>
            <div class="swap-btn mb-3">
                <button type="button" class="btn btn-secondary" onclick="swapCurrencies()">⇅</button>
            </div>
            <div class="mb-3">
                <select name="to_currency" id="to_currency" class="form-select" required>
                    
                <option value="USD" data-flag="img/USD.png">Dólares Americanos (USD)</option>
                    <option value="EUR" data-flag="img/eur.png">Euros (EUR)</option>
                    <option value="GBP" data-flag="img/UK.png">Libras Esterlinas (GBP)</option>
                    <option value="JPY" data-flag="img/japon.png">Yenes Japoneses (JPY)</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary w-100">Convertir</button>
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
  
            <?php
            $amount = (float)$_POST['amount'];
            $from_currency = $_POST['from_currency'];
            $to_currency = $_POST['to_currency'];

            // Tasas de conversión (actualizar regularmente)
            $conversion_rates = [
                'USD' => ['EUR' => 0.88, 'GBP' => 0.75, 'JPY' => 115.50],
                'EUR' => ['USD' => 1.14, 'GBP' => 0.85, 'JPY' => 130.20],
                'GBP' => ['USD' => 1.33, 'EUR' => 1.18, 'JPY' => 152.60],
                'JPY' => ['USD' => 0.0087, 'EUR' => 0.0077, 'GBP' => 0.0066],
            ];

            // Validar si la conversión es válida
            if ($from_currency === $to_currency) {
                echo "<p class='conversion-result'>Misma moneda seleccionada, no hay conversión.</p>";
            } else {
                $rate = $conversion_rates[$from_currency][$to_currency];
                $converted = $amount * $rate;
                echo "<h4>Resultado:</h4>";
                echo "<p class='conversion-result'>". number_format($amount, 2) . " $from_currency</strong> = <strong>" . number_format($converted, 2) . " $to_currency</strong></p>";
            }
            ?>
        
        <?php endif; ?>
    </div>

    <script>
        function swapCurrencies() {
            let from = document.getElementById('from_currency');
            let to = document.getElementById('to_currency');
            let temp = from.value;
            from.value = to.value;
            to.value = temp;
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

