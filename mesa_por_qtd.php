<?php

require 'database.php';

if (isset($_POST['qtd_lugares'])) {
    $qtd_lugares = $_POST['qtd_lugares'];

    try {
        $mesa = $conn->query("SELECT * FROM mesas WHERE qtd_lugares >= $qtd_lugares AND reserva NOT IN (1)");
        $rs = $mesa->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($rs);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} 

