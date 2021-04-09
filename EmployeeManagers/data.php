<?php

class JSON_Data
{
    public static function loadData()
    {
        $data = file_get_contents("data.json");
        return json_decode($data);
    }

    public static function saveData($data)
    {
        $dataJson = json_encode($data);
        file_put_contents("data.json", $dataJson);
    }
}