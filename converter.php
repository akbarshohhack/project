<?php

function convertCurrency($amount, $from_currency, $to_currency) {
    $url = "https://api.exchangerate-api.com/v4/latest/$from_currency";
    $json = file_get_contents($url);
    $exchangeRates = json_decode($json, true);

 
    if (!isset($exchangeRates['rates'][$to_currency])) {
        return "Xato: Valyuta topilmadi!";
    }


    $rate = $exchangeRates['rates'][$to_currency];
    $convertedAmount = $amount * $rate;

    return round($convertedAmount, 2);
}

$result = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $amount = $_POST['amount'];
    $from_currency = $_POST['from_currency'];
    $to_currency = $_POST['to_currency'];
    $result = convertCurrency($amount, $from_currency, $to_currency);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valyuta Konvertatsiyasi</title>
</head>
<body>
    <h2>Valyuta Konvertatsiyasi</h2>
    <form action="" method="POST">
        <label for="amount">Miqdor:</label>
        <input type="number" id="amount" name="amount" required>

        <label for="from_currency">Qaysi valyutadan:</label>
        <select id="from_currency" name="from_currency" required>
            <option value="USD">USD</option>
            <option value="UZS">UZS</option>
        </select>

        <label for="to_currency">Qaysi valyutaga:</label>
        <select id="to_currency" name="to_currency" required>
            <option value="USD">USD</option>
            <option value="UZS">UZS</option>
        </select>

        <button type="submit">Ayirboshlash</button>
    </form>

    <?php if ($result): ?>
        <h3>Natija:</h3>
        <p><?php echo htmlspecialchars($amount) . " " . htmlspecialchars($from_currency) . " => " . htmlspecialchars($result) . " " . htmlspecialchars($to_currency); ?></p>
    <?php endif; ?>
</body>
</html>
