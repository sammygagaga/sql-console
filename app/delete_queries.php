<?php

require_once __DIR__ . '/../database/db.php';

$pdo = getPDO();

if (isset($_POST['queryId'])) {
    $id = $_POST['queryId'];
    try {
        $sql = "DELETE FROM queries WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            header('Location: /index.php');
            exit();
        } else {
            echo "Ошибка при удалении записи.";
        }
    }
    catch (PDOException $e) {
        require_once __DIR__ . '/../components/db-connection-error.php';
        die();
    }
}
