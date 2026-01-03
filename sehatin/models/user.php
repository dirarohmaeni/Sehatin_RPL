<?php
class User {
    public static function login($conn, $username, $password) {
        return mysqli_query($conn,
            "SELECT * FROM users 
             WHERE username='$username' 
             AND passwordHash='$password'");
    }
}
