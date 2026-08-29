<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello PHP</title>
</head>
<body>
     <table border="1">
        <form action="index.php" method="POST">
            <tr>
                <td>Enter Number 1:</td>
                <td><input type="text" name="number1" placeholder="enter number 1"></td>
            </tr>
            <tr>
                <td>Enter Number2:</td>
                <td><input type="text" name="number2" placeholder="enter number 2"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </form>
    </table>

    <?php
    if(isset($_POST['number1']) && isset($_POST['number2'])) {
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $sum = $number1 + $number2;
        $border = 1;
        $difference = $number1 - $number2;
        $product = $number1 * $number2;
        $quotient = $number1 / $number2;
        $modulo = $number1 % $number2;
            
        echo "<table border='1'>";
        echo "<tr><td>Sum</td><td>$sum</td></tr>";
        echo "<tr><td>Difference</td><td>$difference</td></tr>";
        echo "<tr><td>Product</td><td>$product</td></tr>";
        echo "<tr><td>Quotient</td><td>$quotient</td></tr>";
        echo "<tr><td>Modulo</td><td>$modulo</td></tr>";
        echo "</table>";
    }
    ?>
</body>
</html>
