<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';

try {
    $mesa= $conn->query('SELECT * FROM mesas A LEFT JOIN clientes B ON B.id_mesa = A.id_mesa');
    $rs = $mesa->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($rs);
} catch(PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
