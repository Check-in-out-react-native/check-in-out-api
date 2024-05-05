<?php

require 'database.php';

if (isset($_POST['id_mesa'])) {
    $id_mesa = $_POST['id_mesa'];

    try {
        $mesa = $conn->query("SELECT * FROM mesas WHERE id_mesa = $id_mesa");
        $rs = $mesa->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($rs);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} 