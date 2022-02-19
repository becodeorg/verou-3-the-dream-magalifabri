<?php

// SETUP

declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "./currencyData.php";


// DEV LOGIC

function pre_r(array $str)
{
    echo "<pre>";
    var_dump($str);
    echo "</pre>";
}


// MAIN LOGIC

function calcConvertedPrice($currencyData): float
{
    $price = $_POST["price"];
    $currency1 = $_POST["currencies1"];
    $currency2 = $_POST["currencies2"];

    $conversionRate1 = $currencyData[$currency1]["USDRate"];
    $conversionRate2 = $currencyData[$currency2]["USDRate"];

    $convertedPrice = round(($conversionRate1 / $conversionRate2) * $price, 2);

    return $convertedPrice;
}


function validateForm(): array
{
    $validationErrors = [];

    if (empty($_POST["price"])) {
        $validationErrors["price"] = "enter price";
    } else if ($_POST["price"] < 0) {
        $validationErrors["price"] = "enter positive number";
    } else if (!filter_var($_POST["price"], FILTER_VALIDATE_FLOAT, ["options" => ["min_range" => 0, "max_range" => 999999]])) {
        $validationErrors["price"] = "invalid input";
    }

    if (empty($_POST["currencies1"])) {
        $validationErrors["currencies1"] = "select a currency";
    }

    if (empty($_POST["currencies2"])) {
        $validationErrors["currencies2"] = "select a currency";
    }

    return $validationErrors;
}


function swapCurrencies()
{
    $tmp = $_POST["currencies1"];
    $_POST["currencies1"] = $_POST["currencies2"];
    $_POST["currencies2"] = $tmp;
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($_POST["submit"] === "swap") {
        swapCurrencies();
    }

    $validationErrors = validateForm();

    if (empty($validationErrors)) {
        $convertedPrice = calcConvertedPrice($currencyData);
    }
}


// VIEW FUNCTIONS

function selected($currency, $selectName)
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if ($currency === $_POST[$selectName]) {
            return "selected";
        }
    }
}


require_once "./view.php";
