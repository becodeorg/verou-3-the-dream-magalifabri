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

        <!-- <input type="number" step="0.01" min="0" id="price" name="price" value="<?= $_POST["price"] ?? "" ?>" placeholder="0" required> -->
        <input type="number" step="0.01" id="price" name="price" value="<?= $_POST["price"] ?? "" ?>" placeholder="0">
        <p class="error-message"><?= $validationErrors["price"] ?? "" ?></p>
        <br>
        <br>
        <span>=</span>
        <select name="currencies2" id="currencies2">
            <option value="usd" <?= selected("usd", "currencies2") ?>>$</option>
            <option value="eur" <?= selected("eur", "currencies2") ?>>€</option>
            <option value="jpy" <?= selected("jpy", "currencies2") ?>>¥</option>
            <option value="gbp" <?= selected("gbp", "currencies2") ?>>£</option>
            <option value="chf" <?= selected("chf", "currencies2") ?>>₣</option>
        </select>

        <?php
        if (
            !empty($_POST["submit"])
            && !empty($convertedPrice)
        ) {
            echo "<span class=\"converted-price\">" . $convertedPrice . "</span>";
        }
        ?>

        <br>
        <button class="button" type="submit" name="submit" value="convert">convert</button>
        <button class="button" type="submit" name="submit" value="swap">↑ swap ↓</button>

    </form>

</body>

</html>