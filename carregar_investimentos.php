<?php
session_start();

include 'db_connection.php';

$id = $_SESSION['id']; 

$sql = "SELECT * FROM investimentos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Verifica se há registros
if ($result->num_rows > 0) {
    $dados = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $investimentos = [];
}
?>
