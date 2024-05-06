<!DOCTYPE html>
<html>
<head>
    <title>Умножение чисел в столбик</title>
</head>
<body>
    <h1>Результат умножения</h1>
    <?php
    if(isset($_POST['num1']) && isset($_POST['num2'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $result = $num1 * $num2;

        echo "<p>Первое число: $num1</p>";
        echo "<p>Второе число: $num2</p>";
        echo "<hr>";
        echo "<p>Процесс умножения:</p>";

        $digits1 = str_split(strrev($num1));
        $digits2 = str_split(strrev($num2));

        $lines = array();

        foreach ($digits2 as $i => $digit2) {
            $line = "";
            $carry = 0;

            for ($j = 0; $j < $i; $j++) {
                $line .= " ";
            }

            foreach ($digits1 as $digit1) {
                $product = $digit1 * $digit2 + $carry;
                $line .= $product % 10;
                $carry = floor($product / 10);
            }

            if ($carry > 0) {
                $line .= $carry;
            }

            $lines[] = strrev($line);
        }

        $totalLines = count($lines);

        foreach ($lines as $i => $line) {
            echo $line;

            if ($i < $totalLines - 1) {
                echo "<br>";
            }
        }

        echo "<hr>";
        echo "<p>Результат: $result</p>";
    }
    ?>
</body>
</html>