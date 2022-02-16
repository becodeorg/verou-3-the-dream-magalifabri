<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// echo '<pre>';
// echo var_dump($_POST);
// echo '</pre>';

function handleFormSubmission()
{
    if (
        $_SERVER["REQUEST_METHOD"] === "POST"
        && !empty($_POST["price"])
        && !empty($_POST["exchange_rate"])
    ) {
        $price = $_POST["price"];
        $exchange_rate = $_POST["exchange_rate"];

        echo "€" . $price . " * " . $exchange_rate . " = " . "€" . $price * $exchange_rate;
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

    <form action="" method="POST">
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
    </form>

    <?php
    if (isset($_POST["submit"])) {
        handleFormSubmission();
    }
    ?>

</body>

</html>