<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';

if (isset($_POST['id_cliente'],$_POST['id_mesa']))

{
    $id_cliente = $_POST['id_cliente'];
    $id_mesa = $_POST['id_mesa'];

    try {
        $stmt = $conn->prepare("UPDATE clientes SET id_mesa = $id_mesa, data_ini = NOW(), espera = 0 WHERE id_cliente = $id_cliente");
        $stmt->execute();
        $stmt1 = $conn->prepare("UPDATE mesas SET reserva = 1 WHERE id_mesa = $id_mesa");
        $stmt1->execute();
        $clienteId = $conn->lastInsertId();
        echo json_encode(['Checkin feito com sucesso!']);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}

