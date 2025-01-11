<?php

require_once __DIR__ . '/../database/db.php';

$pdo = getPDO();

if (isset($_POST['query'])) {
    $query = $_POST['query'];
}
try {
    $sql = "SELECT queries.query_text FROM queries WHERE query_name = :query";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':query' => $query]);
    $queries = $stmt->fetchColumn();

    echo $queries ?? 'Запрос не найден';

}catch (PDOException $e){
    http_response_code(500);
    echo json_encode([
        'message' => 'Ошибка базы данных',
        'error' => $e->getMessage()
    ]);
}


