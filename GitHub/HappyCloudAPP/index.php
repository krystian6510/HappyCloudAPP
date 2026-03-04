<?php
session_start();
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/api.php';

$weather = null;
$error = null;
$city = null;

if (isset($_POST['clear_history'])) {
    unset($_SESSION['history']);
    $_SESSION['history'] = [];
}

if (isset($_POST['city'])) {
    $city = trim($_POST['city']);

    if (!empty($city)) {
        $result = getWeather($city);

        if (isset($result['error'])) {
            $error = $result['error'];
        } else {
            $weather = $result;

            $city = ucfirst(strtolower($city));

            if (!isset($_SESSION['history'])) {
                $_SESSION['history'] = [];
            }

            $_SESSION['history'] = array_diff($_SESSION['history'], [$city]);

            array_unshift($_SESSION['history'], $city);

            $_SESSION['history'] = array_slice($_SESSION['history'], 0, 5);
        }
    }
}

function formatTemperature($temp) {
    return round($temp) . "°C";
}

function formatDescription($desc) {
    return ucfirst($desc);
}

function getWeatherIconUrl($iconCode) {
    return "https://openweathermap.org/img/wn/" . $iconCode . "@2x.png";
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>HappyCloudAPP</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="con">
    <header>
        <h2>Welcome in HappyCloudAPP</h2>
        <button id="darkModeToggle">🌙 Dark Mode</button>
    </header>

    <aside>
        <h3>Wybierz miasto:</h3>

<form method="post">
    <input type="text" 
           name="city" 
           placeholder="e.g Warsaw" 
           required
           value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : ''; ?>">
    
    <button type="submit">Check the weather</button>
</form>

<?php if ($error): ?>
    <p style="color:red;">
        <?php echo htmlspecialchars($error); ?>
    </p>
<?php endif; ?>


<?php if (!empty($_SESSION['history'])): ?>
    <div class="history">
        <h4>Ostatnie wyszukiwania:</h4>
        <ul>
            <?php foreach ($_SESSION['history'] as $item): ?>
                <li>
                    <form method="post" style="display:inline;">
                        <input type="hidden" 
                               name="city" 
                               value="<?php echo htmlspecialchars($item); ?>">
                        
                        <button type="submit" class="history-btn">
                            <?php echo htmlspecialchars($item); ?>
                        </button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<form method="post">
    <button type="submit" name="clear_history" class="clear-btn">
        Wyczyść historię
    </button>
</form>
    </aside>

    <main>
        <?php if ($weather): ?>
            <div class="weather-card">
                <h3><?php echo htmlspecialchars($weather['city']); ?></h3>
                <img src="<?php echo getWeatherIconUrl($weather['icon']); ?>" alt="weather icon">
                <p>Temperatura: <?php echo formatTemperature($weather['temperature']); ?></p>
                <p>Opis: <?php echo formatDescription($weather['description']); ?></p>
                <p>Wilgotność: <?php echo $weather['humidity']; ?>%</p>
                <p>Wiatr: <?php echo $weather['wind_speed']; ?> m/s</p>
            </div>
        <?php else: ?>
            <h2>The weather will appear here after entering the city.</h2>
        <?php endif; ?>
    </main>

    <footer>
    <p>
        &copy; <?php echo date("Y"); ?> HappyCloudAPP. All rights reserved.
        </p>
    <p class="footer-sub">
        Project made for educational purposes.
    </p>
</footer>
</div>
<script src="assets/JS/loading.js"></script>
<script src="assets/JS/darkmode.js"></script>
</body>
</html>
