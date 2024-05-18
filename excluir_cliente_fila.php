<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';

if (isset($_POST['id_cliente'])) {
    $id_cliente = $_POST['id_cliente'];

    try {
        $excluir_cliente = $conn->query("DELETE from clientes WHERE id_cliente = $id_cliente");
        $rs = $excluir_cliente->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode('Cliente excluido da fila!');
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} 