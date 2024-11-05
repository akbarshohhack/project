<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Project Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<div class="container">
    <h1 class="text-center">Salom, Bootstrap bilan PHP loyihasi!</h1>
    <p class="lead">Bu misolda Bootstrap orqali sahifamizni chiroyli qilib ko'rsatamiz.</p>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Karta 1</h5>
                    <p class="card-text">Bu birinchi kartaning matni.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Karta 2</h5>
                    <p class="card-text">Bu ikkinchi kartaning matni.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Karta 3</h5>
                    <p class="card-text">Bu uchinchi kartaning matni.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$items = ["Birinchi element", "Ikkinchi element", "Uchinchi element"];
?>
<div class="container">
    <ul class="list-group">
        <?php foreach ($items as $item): ?>
            <li class="list-group-item"><?= htmlspecialchars($item) ?></li>
        <?php endforeach; ?>
    </ul>
</div>
