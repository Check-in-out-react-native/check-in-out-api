<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';

if (isset($_POST['qtd_lugares'])) {
    $qtd_lugares = $_POST['qtd_lugares'];

    try {
        $clientes_na_fila = $conn->query("SELECT id_cliente, nome_cliente, qtd_pessoas FROM clientes WHERE qtd_pessoas <= $qtd_lugares AND espera = 1");
        $rs = $clientes_na_fila->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($rs);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} 

