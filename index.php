<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

echo '<pre>';
echo var_dump($_POST);
echo '</pre>';

$currencyValueInUSD = [
    "usd" => [
        // "name" => "USD",
        "value" => 1,
    ],
    "eur" => [
        // "name" => "EUR",
        "value" => 1.14,
    ],
    "jpy" => [
        // "name" => "JPY",
        "value" => 0.0087,
    ],
    "gbp" => [
        // "name" => "GBP",
        "value" => 1.35,
    ],
    "chf" => [
        // "name" => "JPY",
        "value" => 1.08,
    ],
];

// echo var_dump($currencyValueInUSD);
echo var_dump($currencyValueInUSD["usd"]["value"]);

function handleFormSubmission($currencyValueInUSD)
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // if ($_POST["submit"] === "switch") {
        //     echo "<br>HERE<br>";
        // }
        // echo var_dump($_POST);
        $amount = $_POST["amount"];
        $currency1 = $_POST["currencies1"];
        $conversionRate1 = $currencyValueInUSD[$currency1]["value"];
        $currency2 = $_POST["currencies2"];
        $conversionRate2 = $currencyValueInUSD[$currency2]["value"];
        $fromTo = $_POST["submit"];
        // echo $currency1;
        // echo $currency2;
        // echo $conversionRate1;
        // echo $conversionRate2;
        // echo $fromTo;

        if ($fromTo === "from #1 to #2") {
            // echo ($conversionRate1 / $conversionRate2) * $amount;
            echo "$amount $currency1 is " . ($conversionRate1 / $conversionRate2) * $amount . " $currency2";
        } else {
            // echo ($conversionRate2 / $conversionRate1) * $amount;
            echo "$amount $currency2 is " . ($conversionRate2 / $conversionRate1) * $amount . " $currency1";
        }
    }

    // if (
    //     $_SERVER["REQUEST_METHOD"] === "POST"
    //     && !empty($_POST["price"])
    //     && !empty($_POST["exchange_rate"])
    // ) {
    //     $price = $_POST["price"];
    //     $exchange_rate = $_POST["exchange_rate"];

    //     echo "€" . $price . " * " . $exchange_rate . " = " . "€" . $price * $exchange_rate;
    // }
}

function selected($currency, $selectName)
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if ($currency === $_POST[$selectName]) {
            return "selected=\"selected\"";
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
    <title>The Dream</title>
</head>

<body>
    <h1>The Dream</h1>

    <!-- <form action="" method="POST">
        <label for="price">price in local currency</label>
        <input type="number" id="price" name="price" required>
        <br>
        <br>
        <label for="exchange_rate">exchange rate to €</label>
        <input type="number" id="exchange_rate" name="exchange_rate" required>
        <br>
        <br>
        <input type="submit" name="submit">
        <br>
        <br>
    </form> -->

    <?php
    if (isset($_POST["submit"])) {
        handleFormSubmission($currencyValueInUSD);
    }
    ?>

    <form action="" method="POST">
        <input type="number" id="amount" name="amount" value="<?= $_POST["amount"] ?>" required>
        <label for="amount">amount</label>
        <br>
        <br>
        <select name="currencies1" id="currencies">
            <option value="usd" <?= selected("usd", "currencies1") ?>>U.S. Dollar (USD)</option>
            <option value="eur" <?= selected("eur", "currencies1") ?>>European Euro (EUR)</option>
            <option value="jpy" <?= selected("jpy", "currencies1") ?>>Japanese Yen (JPY)</option>
            <option value="gbp" <?= selected("gbp", "currencies1") ?>>British Pound (GBP)</option>
            <option value="chf" <?= selected("chf", "currencies1") ?>>Swiss Franc (CHF)</option>
        </select>
        <label for="currencies">Currency #1</label>
        <br>
        <br>
        <select name="currencies2" id="currencies">
            <option value="usd" <?= selected("usd", "currencies2") ?>>U.S. Dollar (USD)</option>
            <option value="eur" <?= selected("eur", "currencies2") ?>>European Euro (EUR)</option>
            <option value="jpy" <?= selected("jpy", "currencies2") ?>>Japanese Yen (JPY)</option>
            <option value="gbp" <?= selected("gbp", "currencies2") ?>>British Pound (GBP)</option>
            <option value="chf" <?= selected("chf", "currencies2") ?>>Swiss Franc (CHF)</option>
        </select>
        <label for="currencies">Currency #2</label>
        <br>
        <br>

        <input type="submit" name="submit" value="from #1 to #2">
        <input type="submit" name="submit" value="from #2 to #1">

    </form>

</body>

</html>