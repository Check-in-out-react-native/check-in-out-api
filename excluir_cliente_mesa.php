<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';

if (isset($_POST['id_mesa'])) {
    $id_mesa = $_POST['id_mesa'];

    try {
        $excluir_cliente = $conn->query("DELETE from clientes WHERE id_mesa = $id_mesa");
        $rs = $excluir_cliente->fetchAll(PDO::FETCH_ASSOC);
        $livrar_mesa = $conn->prepare("UPDATE mesas SET reserva = 0 WHERE id_mesa = $id_mesa");
        $livrar_mesa->execute();
        header('Content-Type: application/json');
        echo json_encode('Checkout feito!');
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} 
