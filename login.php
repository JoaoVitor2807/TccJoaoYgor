<?php
    session_start();
    include 'db_connection.php';

    if($_SERVER["REQUEST METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT id, password FROM users WHERE username = ?";
        if($stmt = @conn->prepare($sql)) {
            $stmt->bind_param ("s", $username);
            $stmt->execute();
            $stmt->store_result();

            if($stmt->num_rows == 1) {
                $stmt->bind_result($id,$hashed_passord)
            }
        }
    }
?>