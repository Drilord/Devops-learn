<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello World</title>
</head>
<body>
    <h1>Hello, World!</h1>
    <form>
        <label for="number1">Number 1:</label>
        <input type="number" id="number1" name="number1"><br><br>
        <label for="number2">Number 2:</label>
        <input type="number" id="number2" name="number2"><br><br>
        <input type="submit" value="Submit">
    </form>

    <?php
        if(isset($_GET['number1']) && isset($_GET['number2'])) {
            $number1 = $_GET['number1'];
            $number2 = $_GET['number2'];
            $sum = $number1 + $number2;
            echo "<span style='color: red;'>The sum of $number1 and $number2 is $sum</span>";
        }
    ?>
</body>
</html>