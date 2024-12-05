<?php
session_start();
include 'db_connection.php';
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nome, $email);

    if ($stmt->execute()) {
        echo "Usuário atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o usuário: " . $conn->error;
    }
}
$stmt->close();
$conn->close();
?>
