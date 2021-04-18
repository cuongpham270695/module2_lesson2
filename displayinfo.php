<?php
function calc($x, $y)
{
    try {
        if ($y == 0 || ($x == 0 && $y == 0)) {
            echo "Error";;
        } else {
            $result = [];
            echo array_push($result, $x + $y) . "<br>";
            echo array_push($result, $x - $y) . "<br>";
            echo array_push($result, $x * $y) . "<br>";
            echo array_push($result, $x / $y) . "<br>";
        }
    } catch (Exception $e) {
        $error = "Message: " . $e->getMessage();
    }
    if (isset($error)) {
        return $error;
    } else {
        return $result;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submit = $_POST["submit"];
    $num1 = $_POST["number1"];
    $num2 = $_POST["number2"];
    $result = calc($num1, $num2);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Display information</title>
</head>
<body>
<form action="displayinfo.php" method="post">
    <label for="number1">Insert x:</label>
    <input type="number" name="number1" id="number1"><br>
    <label for="number2">Insert y:</label>
    <input type="number" name="number2" id="number2">
    <button name="submit">Result:</button>
</form>
<div>
    <p>
        <?php
        if (gettype($result) == "array") {
            foreach ($result as $value) {
                echo $value . " ";
            }
        } else echo $result;
        ?>
    </p>
</div>
</body>
</html>