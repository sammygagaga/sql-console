<?php

require_once __DIR__ . '/../database/db.php';

$pdo = getPDO();

if (isset($_POST["queryName"]) && isset($_POST["queryText"]) && isset ($_POST["userId"])) {
    $queryName = $_POST["queryName"];
    $queryText = $_POST["queryText"];
    $userId = $_POST["userId"];
}

try {
    $sql = "INSERT INTO queries (query_name, query_text, user_id) VALUES (:queryName, :queryText,:userId)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':queryName', $queryName);
    $stmt->bindParam(':queryText', $queryText);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        header('Location: /../index.php');
    }else {
        require_once __DIR__ . '/../components/db-initialize-error.php';
        die();
    }

}catch (PDOException $e) {
    require_once __DIR__ . '/../components/db-connection-error.php';
    die();
}

