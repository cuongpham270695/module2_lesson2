<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration User</title>
    <style>
        .error {
            color: #FF0000;
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }
        td, th{
            border: solid 1px #ccc;
        }
        form{
            width: 450px;
        }
    </style>
</head>
<body>
<?php
function loadRegistrations($filename)
{
    $jsondata = file_get_contents($filename);
    $arr_data = json_decode($jsondata, true);
    return $arr_data;
}

function saveDataJSON($filename, $name, $email, $phoneNumber)
{
    try {
        $contact = array(
            "name" => $name,
            "email" => $email,
            "phoneNumber" => $phoneNumber,
        );
        $arr_data = loadRegistrations($filename);
        array_push($arr_data, $contact);
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);
        file_put_contents($filename, $jsondata);
        echo "Save access!!";
    } catch (Exception $e) {
        echo "Error!", $e->getMessage(), "\n";
    }
}

$nameErr = NULL;
$emailErr = NULL;
$phoneNumberErr = NULL;
$name = NULL;
$email = NULL;
$phoneNumber = NULL;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phoneNumber = $_POST["phoneNumber"];
    $error = false;
    if (empty($_POST["name"])) {
        $nameErr = "It's not invalid!you need to fill it!";
        $error = true;
    }
    if (empty($_POST["email"])) {
        $emailErr = "It's not invalid!you need to fill it!";
        $error = true;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "It's not a valid email address";
            $error = true;
        }
    }
    if (empty($_POST["phoneNumber"])) {
        $phoneNumberErr = "It's not invalid!you need to fill it!";
        $error = true;
    }
    if ($error === false){
        saveDataJSON("users.json",$name,$email,$phoneNumber);
        $name = NULL;
        $email = NULL;
        $phoneNumber = NULL;
    }
}
?>
<form method="post">
    <fieldset>
        <legend>Details</legend>
        Name: <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error">* <?php echo $nameErr; ?></span>
        <br><br>
        E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $emailErr; ?></span>
        <br><br>
        Phone: <input type="number" name="phoneNumber" value="<?php echo $phoneNumber; ?>">
        <span class="error">*<?php echo $phoneNumberErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Register">
        <p><span class="error">* Required field.</span></p>
    </fieldset>
    <?php $registrations = loadRegistrations("users.json"); ?>
    <h2>Registration List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
        <?php foreach ($registrations as $registration ): ?>
        <tr>
            <td><?= $registration["name"];?></td>
            <td><?= $registration["email"]; ?></td>
            <td><?= $registration["phoneNumber"] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</form>
</body>
</html>
