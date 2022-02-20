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

        <div class="row">

            <!-- 1ST CURRENCY SELECTION -->
            <select name="currencies1" id="currencies1">
                <option value="usd" <?= selected("usd", "currencies1") ?>>$</option>
                <option value="eur" <?= selected("eur", "currencies1") ?>>€</option>
                <option value="jpy" <?= selected("jpy", "currencies1") ?>>¥</option>
                <option value="gbp" <?= selected("gbp", "currencies1") ?>>£</option>
                <option value="chf" <?= selected("chf", "currencies1") ?>>₣</option>
            </select>

            <!-- PRICE INPUT -->
            <input type="number" step="0.01" min="0.01" id="price" name="price" value="<?= $_POST["price"] ?? "0" ?>" placeholder="0" required autocomplete="off">
            <!-- <input type="text" step="0.01" id="price" name="price" value="<?= $_POST["price"] ?? "" ?>" placeholder="0"> -->

        </div>

        <!-- 1st currency selection error message -->
        <?php if (!empty($validationErrors["currencies1"])) : ?>
            <span class="error-message"><?= $validationErrors["currencies1"] ?? "" ?></span>
        <?php endif ?>

        <!-- price input error message -->
        <?php if (!empty($validationErrors["price"])) : ?>
            <span class="error-message"><?= $validationErrors["price"] ?? "" ?></span>
        <?php endif ?>

        <div class="row">

            <span class="equals">=</span>

            <!-- 2ND CURRENCY SELECTION -->
            <select name="currencies2" id="currencies2">
                <option value="usd" <?= selected("usd", "currencies2") ?>>$</option>
                <option value="eur" <?= selected("eur", "currencies2") ?>>€</option>
                <option value="jpy" <?= selected("jpy", "currencies2") ?>>¥</option>
                <option value="gbp" <?= selected("gbp", "currencies2") ?>>£</option>
                <option value="chf" <?= selected("chf", "currencies2") ?>>₣</option>
            </select>

            <!-- CONVERTED PRICE OUTPUT -->
            <span class="converted-price"><?= $convertedPrice ?? "0" ?></span>

        </div>

        <!-- 2nd currency selection error message -->
        <?php if (!empty($validationErrors["currencies2"])) : ?>
            <span class="error-message"><?= $validationErrors["currencies2"] ?? "" ?></span>
        <?php endif ?>

        <!-- BUTTONS -->
        <div class="row">
            <button class="button" type="submit" name="submit" value="convert">convert</button>
            <button class="button" type="submit" name="submit" value="swap">↑ swap ↓</button>
        </div>

    </form>

    <footer>
        <span>Made by Magali Fabri</span>
        • <span>View code on <a href="https://github.com/becodeorg/verou-3-the-dream-magalifabri">GitHub</a></span>
        • <span>Deployed with <a href="https://www.heroku.com/home">Heroku</a></span>
        • <span>Photo by <a href="https://unsplash.com/@arobj">Adam Jaime</a> on <a href="https://unsplash.com/">Unsplash</a></span>
    </footer>

</body>

</html>