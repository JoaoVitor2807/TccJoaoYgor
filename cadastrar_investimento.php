<?php
session_start();
include 'db_connection.php';
$id = $_SESSION['id'];

$nome_investimento = $_POST['nome_investimento'];
$valor = $_POST['valor'];
$data_investimento = $_POST['data_investimento'];

if (empty($nome_investimento) || empty($valor) || empty($data_investimento)) {
    die("Preencha todos os campos.");
}

$sql = "INSERT INTO investimentos (id, nome_investimento, valor, data_investimento) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isds", $id, $nome_investimento, $valor, $data_investimento);

if ($stmt->execute()) {
    echo "Investimento cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar investimento: " . $conn->error;
}

$stmt->close();
$conn->close();
?>