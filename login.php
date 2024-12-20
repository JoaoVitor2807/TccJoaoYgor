<?php
    session_start();
    include 'db_connection.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT id, password FROM users WHERE username = ?";
        if($stmt = $conn->prepare($sql)) {
            $stmt->bind_param ("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows == 1) {
                $stmt->bind_result($id,$hashed_passord);
                $stmt->fetch();

                if (password_verify($password, $hashed_passord)) {
                    $_SESSION['logado'] = true;
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;

                    header("location: pagInicial.html");
                } else {
                    echo "senha incorreta.";
                }
            } else {
                echo "Nenhum usuário encontrado com esse username.";
            }
            $stmt->close();
        }
    }

$conn->close();
?>