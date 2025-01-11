<?php

require_once __DIR__ . '/../database/db.php';

$pdo = getPDO();

try {
    $sql = "SELECT queries.query_name FROM queries";
    $stmt = $pdo->query($sql);
    $queries = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-type: application/json');
    echo json_encode($queries);

}catch (PDOException $e){
    http_response_code(500);
    echo json_encode([
        'message' => 'Ошибка базы данных',
        'error' => $e->getMessage()
    ]);
}


