<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1</title>
</head>
<body>
    <h1 class="red-h1">Лабораторная работа №1</h1>
    <p>Выполнил студент Малютина Ю.В.<br>-------------------------------------------------<br></p>
    <p>Задание: Вычислить сумму длин рёбер параллелепипеда<br></p>
    <?php
        function calculate($a, $b, $c) {
            $S = 4 * $a + 4 * $b + 4 * $c;
            return $S;
        }

        
        $a = 2;
        $b = 3;
        $c = 4;

        echo "Длина: " . $a;
        echo "Ширина: " . $b;
        echo "Высота: " . $c;

        

        $result = calculate($a, $b, $c);
        echo "Результат вычисления: " . $result;
    ?>
</body>
</html>