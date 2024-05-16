<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';

try {
    $mesa= $conn->query('SELECT nome_cliente FROM clientes WHERE espera = 1');
    $rs = $mesa->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($rs);
} catch(PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
