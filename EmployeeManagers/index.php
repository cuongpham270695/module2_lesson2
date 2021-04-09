<?php
require_once "data.php";
require_once "employee/employee.php";
require_once "manager/manager.php";

use employee\Employee;
use manager\EmployeeManager;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"]-1;
    $firstname= $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $birthdate = strtotime($_POST["birthdate"]);
    $address = $_POST["address"];
    $position = $_POST["position"];
    $employee = new Employee($firstname,$lastname,$birthdate,$address,$position);
    if(isset($_POST["add"])){
        EmployeeManager::addNewEmployee($employee);
    }
    if(isset($_POST["delete"])){
        EmployeeManager::deleteEmployee($id);
    }
    if (isset($_POST["edit"])){
        EmployeeManager::editEmployee($id,$employee);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee Manager</title>
</head>
<style>
    table{
        margin-top: 50px;
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
    }
    td{
        border: 1px solid dimgray;
    }
</style>
<body>
<div class="Add_form">
    <form action="index.php" method="post">
        <fieldset>
            <legend>Manager Employee</legend>
            <label for="id">ID:</label>
            <input type="number" name="id" placeholder="Insert ID" required><br>
            <label for="firstname">First name</label>
            <input type="text" name="firstname" id="firstname" required><br>
            <label for="lastname">Last name</label>
            <input type="text" name="lastname" id="lastname" required><br>
            <label for="birthdate">Birthdate</label>
            <input type="text" name="birthdate" id="birthdate" placeholder="dd/mm/yyyy" required><br>
            <label for="address">Address</label>
            <input type="text" name="address" id="address" placeholder="Insert address" required><br>
            <label for="position">Position job</label>
            <input type="text" name="position" id="position" required><br>
            <button name="add">Add</button>
            <button name="edit">Edit</button>
            <button name="delete">Delete</button>
        </fieldset>
    </form>
</div>
<div>
    <table>
        <caption>Employee List</caption>
        <tr>
            <td>ID</td>
            <td>First name</td>
            <td>Last name</td>
            <td>Birthdate</td>
            <td>Address</td>
            <td>Position</td>
        </tr>
        <?php EmployeeManager::displayList(); ?>
    </table>
</div>
</body>
</html>
