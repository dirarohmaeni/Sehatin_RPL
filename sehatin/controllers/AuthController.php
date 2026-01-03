<?php
include "models/User.php";

class AuthController {
    public static function login($conn) {
        if (isset($_POST['login'])) {
            $result = User::login(
                $conn,
                $_POST['username'],
                $_POST['password']
            );

            if (mysqli_num_rows($result) > 0) {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['user_id'] = $user['id'];
                header("Location: index.php");
            } else {
                $error = "Login gagal";
            }
        }
        include "views/auth/login.php";
    }

    public static function logout() {
        session_destroy();
        header("Location: index.php");
    }
}
