<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';

if (isset($_POST['qtd_lugares'])) {
    $qtd_lugares = $_POST['qtd_lugares'];

    try {
        $stmt = $conn->prepare("INSERT INTO mesas (qtd_lugares, reserva) VALUES ('$qtd_lugares', 0)");
        $stmt->execute();
        $mesaID = $conn->lastInsertId();
        echo json_encode(['id_mesa' => $mesaID, 'qtd_lugares' => $qtd_lugares, 'reserva' => 0]);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
