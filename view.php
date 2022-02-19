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
        <!-- FIRST CURRENCY SELECTION -->
        <select name="currencies1" id="currencies1">
            <option value="usd" <?= selected("usd", "currencies1") ?>>$</option>
            <option value="eur" <?= selected("eur", "currencies1") ?>>€</option>
            <option value="jpy" <?= selected("jpy", "currencies1") ?>>¥</option>
            <option value="gbp" <?= selected("gbp", "currencies1") ?>>£</option>
            <option value="chf" <?= selected("chf", "currencies1") ?>>₣</option>
        </select>
        <!-- error message -->
        <?php if (!empty($validationErrors["currencies1"])) : ?>
            <p class="error-message"><?= $validationErrors["currencies1"] ?? "" ?></p>
        <?php endif ?>

        <!-- PRICE INPUT -->
        <!-- <input type="number" step="0.01" min="0" id="price" name="price" value="<?= $_POST["price"] ?? "" ?>" placeholder="0" required> -->
        <input type="text" step="0.01" id="price" name="price" value="<?= $_POST["price"] ?? "" ?>" placeholder="0">
        <!-- error message -->
        <?php if (!empty($validationErrors["price"])) : ?>
            <p class="error-message"><?= $validationErrors["price"] ?? "" ?></p>
        <?php endif ?>

        <br>
        <br>

        <span>=</span>

        <!-- SECOND CURRENCY SELECTION -->
        <select name="currencies2" id="currencies2">
            <option value="usd" <?= selected("usd", "currencies2") ?>>$</option>
            <option value="eur" <?= selected("eur", "currencies2") ?>>€</option>
            <option value="jpy" <?= selected("jpy", "currencies2") ?>>¥</option>
            <option value="gbp" <?= selected("gbp", "currencies2") ?>>£</option>
            <option value="chf" <?= selected("chf", "currencies2") ?>>₣</option>
        </select>
        <!-- error message -->
        <?php if (!empty($validationErrors["currencies2"])) : ?>
            <p class="error-message"><?= $validationErrors["currencies2"] ?? "" ?></p>
        <?php endif ?>

        <!-- CONVERTED PRICE OUTPUT -->
        <?php if (!empty($_POST["submit"]) && !empty($convertedPrice)) : ?>
            <span class="converted-price"><?= $convertedPrice ?></span>
        <?php endif ?>
        <br>

        <!-- BUTTONS -->
        <button class="button" type="submit" name="submit" value="convert">convert</button>
        <button class="button" type="submit" name="submit" value="swap">↑ swap ↓</button>

    </form>

</body>

</html>