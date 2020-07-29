<?php
    session_start();
    global $pdo;
    try {
        $pdo = new PDO("mysql:dbname=classificados;host=127.0.0.1", "root", "12345");
    } catch (PDOException $e) {
        echo "FALHOU: ".$e->getMessage();
    }
?>