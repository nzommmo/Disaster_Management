<?php 

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'disaster-management';

    // Database Source Name
    $dsn = 'mysql:host=' . $host . '; dbname=' . $dbname;

    try {
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "connected Successfully";

    } catch(PDOException $e) {
        echo "Connection Failed: " . $e->getMessage();
    }

?> 