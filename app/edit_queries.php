<?php

require_once __DIR__ . '/../database/db.php';

$pdo = getPDO();

    try {
        $sql = "SELECT * FROM queries";
        $stmt = $pdo->query($sql);
        $queries = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }catch (PDOException $e){
        require_once __DIR__ . '/../components/db-connection-error.php';
        die();
    }

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $queryId = $_GET['id'];
    $sql = "SELECT * FROM queries WHERE id = :queryId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindparam(":queryId", $queryId);
    $stmt->execute();
    $queries = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['queryText'])  && isset($_POST['queryId'])) {
    $queryText = $_POST['queryText'];
    $queryId = $_POST['queryId'];
    $sql = "UPDATE queries SET query_text = :queryText WHERE id = :queryId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindparam(":queryId", $queryId);
    $stmt->bindparam(":queryText", $queryText);
    $stmt->execute();
    header('Location: /../index.php');
}

