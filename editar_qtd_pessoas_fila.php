<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';

if (isset($_POST['id_cliente'],$_POST['qtd_pessoas']))

{
    $id_cliente = $_POST['id_cliente'];
    $qtd_pessoas = $_POST['qtd_pessoas'];

    try {
        $stmt = $conn->prepare("UPDATE clientes SET qtd_pessoas = $qtd_pessoas WHERE id_cliente = $id_cliente AND espera = 1");
        $stmt->execute();
        $clienteId = $conn->lastInsertId();
        echo json_encode(['Edição feita com sucesso!']);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

