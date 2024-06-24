<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';

if (isset($_POST['id_mesa'])) {
    $id_mesa = $_POST['id_mesa'];

    try {
        $excluir_cliente = $conn->query("DELETE from mesas WHERE id_mesa = $id_mesa");
        $rs = $excluir_cliente->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode('Mesa excluida!');
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} 
