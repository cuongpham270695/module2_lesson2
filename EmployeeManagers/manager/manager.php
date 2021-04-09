<?php

namespace manager;

class EmployeeManager
{
    private static $employeeList = [];

    public static function displayList()
    {
        self::$employeeList = \JSON_Data::loadData();
        for ($i = 0; $i < count(self::$employeeList); $i++) {
            echo "<tr>";
            echo "<td>" . ($i + 1) . "</td>";
            foreach (self::$employeeList[$i] as $key => $value) {
                if ($key === "birthdate") {
                    $newFormat = date("d-m-Y", $value);
                    echo "<td>" . $newFormat . "</td>";
                } else {
                    echo "<td>" . $value . "</td>";
                }
            }
            echo "</tr>";
        }
    }

    public static function displayEmployee()
    {
        return self::$employeeList;
    }

    public static function addNewEmployee($employee)
    {
        self::$employeeList = \JSON_Data::loadData();
        array_push(self::$employeeList, $employee);
        \JSON_Data::saveData(self::$employeeList);
    }

    public static function deleteEmployee($index)
    {
        self::$employeeList = \JSON_Data::loadData();
        array_splice(self::$employeeList, $index, 1);
        \JSON_Data::saveData(self::$employeeList);
    }

    public static function editEmployee($index, $employee)
    {
        self::$employeeList = \JSON_Data::loadData();
        self::$employeeList[$index]->firstname = $employee->getFirstName();
        self::$employeeList[$index]->lastname = $employee->getLastName();
        self::$employeeList[$index]->birthdate = $employee->getBirthDate();
        self::$employeeList[$index]->address = $employee->getAddress();
        self::$employeeList[$index]->position = $employee->getPosition();
        \JSON_Data::saveData(self::$employeeList);
    }
}