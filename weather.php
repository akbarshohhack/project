<?php
$apiKey = "YOUR_API_KEY";
$weatherData = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $city = $_POST['city'];
    $url = "http://api.weatherstack.com/current?access_key=$apiKey&query=" . urlencode($city);
    
    $json = file_get_contents($url);
    $data = json_decode($json, true);

    if (isset($data['current'])) {
        $temp = $data['current']['temperature'];
        $windspeed = $data['current']['wind_speed'];
        $weatherData = "Shahar: $city | Harorat: $temp°C, Shamol tezligi: $windspeed km/soat";
    } else {
        $weatherData = "Xato: Ob-havo ma'lumotlari topilmadi!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uzbekistan Ob-havo Ma'lumoti</title>
</head>
<body>
    <h2>Uzbekistan shaharlarini tanlang va ob-havo ma'lumotini oling</h2>
    <form action="" method="POST">
        <label for="city">Shahar:</label>
        <select id="city" name="city">
            <option value="Tashkent">Tashkent</option>
            <option value="Samarkand">Samarkand</option>
            <option value="Bukhara">Bukhara</option>
            <option value="Andijan">Andijan</option>
            <option value="Namangan">Namangan</option>
            <option value="Fergana">Fergana</option>
        </select>
        <button type="submit">Ob-havo ma'lumotini olish</button>
    </form>

    <?php if ($weatherData): ?>
        <h3>Natija:</h3>
        <p><?php echo htmlspecialchars($weatherData); ?></p>
    <?php endif; ?>
</body>
</html>
