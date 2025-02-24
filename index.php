<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php");
spl_autoload_register(function($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) require_once $file;
});

// 必要なクラスのオートロード
require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;

// ダミーデータを作成
$restaurantChains = RandomGenerator::restaurantChains(1,1); // 2～3個のレストランチェーンを生成
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Chains</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container py-4">

    <h1 class="text-center mb-4">Restaurant Chains</h1>

    <?php foreach ($restaurantChains as $index => $chain): ?>
        <div class="mb-4">
            <h2 class="text-center"><?= htmlspecialchars($chain->getName()) ?></h2>

            <div class="accordion" id="accordion<?= $index ?>">
                <?php foreach ($chain->getRestaurantLocations() as $locationIndex => $location): ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse<?= $index . '-' . $locationIndex ?>" 
                                    aria-expanded="false" 
                                    aria-controls="collapse<?= $index . '-' . $locationIndex ?>">
                                <?= htmlspecialchars($location->getName()) ?>
                            </button>
                        </h2>
                        <div id="collapse<?= $index . '-' . $locationIndex ?>" class="accordion-collapse collapse"
                             data-bs-parent="#accordion<?= $index ?>">
                            <div class="accordion-body">
                                <p><strong>Company Name:</strong> <?= htmlspecialchars($chain->getName()) ?></p>
                                <p><strong>Address:</strong> <?= htmlspecialchars($location->getAddress()) ?>, 
                                    <?= htmlspecialchars($location->getCity()) ?>, 
                                    <?= htmlspecialchars($location->getState()) ?>, 
                                    <?= htmlspecialchars($location->getZipCode()) ?></p>

                                <h5>Employees:</h5>
                                <ul>
                                    <?php foreach ($location->getEmployees() as $employee): ?>
                                        <li>
                                            ID: <?= $employee->getId() ?>, 
                                            Job Title: <?= htmlspecialchars($employee->getJobTitle()) ?>,
                                            <?= htmlspecialchars($employee->getName()) ?>,
                                            Start Date: <?= $employee->getStartDate()->format('Y-m-d') ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

</body>
</html>
