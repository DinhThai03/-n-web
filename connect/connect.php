<?php

function connectdb()
{
    $servername = "localhost:3306";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO('mysql:host=localhost;dbname=doanweb', "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
    }
    return $conn;
}
