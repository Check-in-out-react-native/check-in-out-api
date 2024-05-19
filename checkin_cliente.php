<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';

if (isset($_POST['nome_cliente'],$_POST['qtd_pessoas'],$_POST['id_mesa']))

{
    $nome_cliente = $_POST['nome_cliente'];
    $qtd_pessoas = $_POST['qtd_pessoas'];
    $id_mesa = $_POST['id_mesa'];

    try {
        $stmt = $conn->prepare("INSERT INTO clientes (nome_cliente, qtd_pessoas, id_mesa, data_ini, espera) VALUES ('$nome_cliente', $qtd_pessoas, $id_mesa, NOW(), 0)");
        $stmt->execute();
        $stmt1 = $conn->prepare("UPDATE mesas SET reserva = 1 WHERE id_mesa = $id_mesa");
        $stmt1->execute();
        $clienteId = $conn->lastInsertId();
        echo json_encode(['id_cliente' => $clienteId, 'nome_cliente' => $nome_cliente, 'qtd_pessoas' => $qtd_pessoas, 'id_mesa' => $id_mesa, 'data_ini' => 'data atual', 'espera' =>  0]);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
