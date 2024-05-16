<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require 'database.php';

if (isset($_POST['nome_cliente'],$_POST['qtd_pessoas']))

{
    $nome_cliente = $_POST['nome_cliente'];
    $qtd_pessoas = $_POST['qtd_pessoas'];

    try {
        $stmt = $conn->prepare("INSERT INTO clientes (nome_cliente, qtd_pessoas, espera) VALUES ('$nome_cliente', $qtd_pessoas, 1)");
        $stmt->execute();
        $clienteId = $conn->lastInsertId();
        echo json_encode(['id_cliente' => $clienteId, 'nome_cliente' => $nome_cliente, 'qtd_pessoas' => $qtd_pessoas, 'espera' => 1]);
    } catch(PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
