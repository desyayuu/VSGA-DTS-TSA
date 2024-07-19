<?php
    // Operator Aritmatika
    $a = 10;
    $b = 5;
    echo "<h3>Operator Aritmatika</h3>";
    echo "a + b = " . ($a + $b) . "<br>";
    echo "a - b = " . ($a - $b) . "<br>";
    echo "a * b = " . ($a * $b) . "<br>";
    echo "a / b = " . ($a / $b) . "<br>";
    echo "a % b = " . ($a % $b) . "<br>";

    // Operator Penugasan
    echo "<h3>Operator Penugasan</h3>";
    $a += $b;
    echo "a += b : " . $a . "<br>";
    $a -= $b;
    echo "a -= b : " . $a . "<br>";
    $a *= $b;
    echo "a *= b : " . $a . "<br>";
    $a /= $b;
    echo "a /= b : " . $a . "<br>";
    $a %= $b;
    echo "a %= b : " . $a . "<br>";

    // Operator Perbandingan
    echo "<h3>Operator Perbandingan</h3>";
    echo "a == b : " . var_export($a == $b, true) . "<br>";
    echo "a != b : " . var_export($a != $b, true) . "<br>";
    echo "a > b : " . var_export($a > $b, true) . "<br>";
    echo "a < b : " . var_export($a < $b, true) . "<br>";
    echo "a >= b : " . var_export($a >= $b, true) . "<br>";
    echo "a <= b : " . var_export($a <= $b, true) . "<br>";

    // Operator Logika
    echo "<h3>Operator Logika</h3>";
    $x = true;
    $y = false;
    echo "x AND y : " . var_export($x && $y, true) . "<br>";
    echo "x OR y : " . var_export($x || $y, true) . "<br>";
    echo "x XOR y : " . var_export($x xor $y, true) . "<br>";
    echo "!x : " . var_export(!$x, true) . "<br>";

    // Operator Increment dan Decrement
    echo "<h3>Operator Increment dan Decrement</h3>";
    $z = 10;
    echo "z : " . $z . "<br>";
    echo "z++ : " . $z++ . "<br>";
    echo "Setelah z++ : " . $z . "<br>";
    echo "++z : " . ++$z . "<br>";
    echo "z-- : " . $z-- . "<br>";
    echo "Setelah z-- : " . $z . "<br>";
    echo "--z : " . --$z . "<br>";

    // Operator String
    echo "<h3>Operator String</h3>";
    $str1 = "Hello";
    $str2 = "World!";
    echo "str1 . str2 : " . $str1 . " " . $str2 . "<br>";


    // Operator Array
    echo "<h3>Operator Array</h3>";
    $array1 = array("a" => "apple", "b" => "banana");
    $array2 = array("c" => "cherry", "d" => "date");
    $result = $array1 + $array2; // Union of $array1 and $array2
    echo "array1 + array2 : ";
    print_r($result);
    echo "<br>";
    $array3 = array("a" => "apple", "b" => "banana");
    $array4 = array("a" => "apple", "b" => "banana");
    echo "array3 == array4 : " . var_export($array3 == $array4, true) .
    "<br>";
    echo "array3 != array4 : " . var_export($array3 != $array4, true) .
    "<br>";
    ?>