<?php
class ApiClient {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function fetchData() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200) {
            return json_decode($response, true);
        } else {
            return null;
        }
    }
}

$apiUrl = "https://jsonplaceholder.typicode.com/posts";
$client = new ApiClient($apiUrl);
$data = $client->fetchData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Ma'lumotlari</title>
</head>
<body>
    <h1>API Ma'lumotlari</h1>
    <?php if ($data): ?>
        <ul>
            <?php foreach ($data as $item): ?>
                <li><strong><?= htmlspecialchars($item['title']) ?></strong>: <?= htmlspecialchars($item['body']) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Ma'lumotlarni yuklashda xatolik yuz berdi.</p>
    <?php endif; ?>
</body>
</html>
