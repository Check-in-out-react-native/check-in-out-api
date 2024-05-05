<?php

require 'database.php';

try {
    $mesa= $conn->query('SELECT * FROM mesas');
    $rs = $mesa->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($rs);
} catch(PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}