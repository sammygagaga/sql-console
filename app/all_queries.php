<?php

require_once __DIR__ . '/../database/db.php';

$pdo = getPDO();

try {
    $sql = "SELECT users.username, queries.query_name, queries.query_text, queries.id FROM queries
        JOIN users ON queries.user_id = users.id";
    $stmt = $pdo->query($sql);
    $queries = $stmt->fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e) {

}


