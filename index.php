<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// echo '<pre>';
// echo var_dump($_POST);
// echo '</pre>';

$currencyData = [
    "usd" => [
        "name" => "U.S. Dollar",
        "USDRate" => 1,
        "symbol" => "$",
    ],
    "eur" => [
        "name" => "European Euro",
        "USDRate" => 1.14,
        "symbol" => "€",
    ],
    "jpy" => [
        "name" => "Japanese Yen",
        "USDRate" => 0.0087,
        "symbol" => "¥",
    ],
    "gbp" => [
        "name" => "British Pound",
        "USDRate" => 1.35,
        "symbol" => "£",
    ],
    "chf" => [
        "name" => "Swiss Franc",
        "USDRate" => 1.08,
        "symbol" => "₣",
    ],
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["submit"] === "swap") {
        $tmp = $_POST["currencies1"];
        $_POST["currencies1"] = $_POST["currencies2"];
        $_POST["currencies2"] = $tmp;
    }

    $price = $_POST["price"];
    $currency1 = $_POST["currencies1"];
    $conversionRate1 = $currencyData[$currency1]["USDRate"];
    $currencySymbol1 = $currencyData[$currency1]["symbol"];
    $currency2 = $_POST["currencies2"];
    $conversionRate2 = $currencyData[$currency2]["USDRate"];
    $currencySymbol2 = $currencyData[$currency2]["symbol"];
}

function selected($currency, $selectName)
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if ($currency === $_POST[$selectName]) {
            return "selected";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style.css">

    <title>Fancy Drink Price Converter</title>
</head>

<body>

    <header>
        <h1>Fancy Drink<br><span class="subtitle">Price Converter</span></h1>
    </header>

    <form action="" method="POST">
        <select name="currencies1" id="currencies1">
            <option value="usd" <?= selected("usd", "currencies1") ?>>$</option>
            <option value="eur" <?= selected("eur", "currencies1") ?>>€</option>
            <option value="jpy" <?= selected("jpy", "currencies1") ?>>¥</option>
            <option value="gbp" <?= selected("gbp", "currencies1") ?>>£</option>
            <option value="chf" <?= selected("chf", "currencies1") ?>>₣</option>
        </select>

        <input type="number" step="0.01" id="price" name="price" value="<?= $_POST["price"] ?? "" ?>" placeholder="enter price" required>
        <br>
        <button class="button" type="submit" name="submit" value="swap">↑ swap ↓</button>
        <br>
        <span>is</span>
        <select name="currencies2" id="currencies2">
            <option value="usd" <?= selected("usd", "currencies2") ?>>$</option>
            <option value="eur" <?= selected("eur", "currencies2") ?>>€</option>
            <option value="jpy" <?= selected("jpy", "currencies2") ?>>¥</option>
            <option value="gbp" <?= selected("gbp", "currencies2") ?>>£</option>
            <option value="chf" <?= selected("chf", "currencies2") ?>>₣</option>
        </select>

        <?php
        if (!empty($_POST["submit"])) {
            echo "<span class=\"converted-price\">" . round(($conversionRate1 / $conversionRate2) * $price, 2) . "</span>";
        }
        ?>

        <br>
        <button class="button" type="submit" name="submit" value="convert">convert</button>

    </form>

</body>

</html>