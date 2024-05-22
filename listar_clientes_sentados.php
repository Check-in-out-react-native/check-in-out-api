<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';

try {
    $clientes= $conn->query('SELECT id_cliente, nome_cliente, qtd_pessoas, id_mesa FROM clientes WHERE id_mesa IS NOT NULL');
    $rs = $clientes->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($rs);
} catch(PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
