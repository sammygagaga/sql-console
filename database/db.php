<?php

function getPDO()
{
    $config = json_decode(file_get_contents(__DIR__ . '/../config/db_config.json'), true);
    try {
        $pdo = new PDO(
            'mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'],
            $config['db_username'],
            $config['db_password'],
        );
        return $pdo;
    } catch (PDOException $e) {
        require_once __DIR__ . '/../components/db-connection-error.php';
        die();
    }
}












