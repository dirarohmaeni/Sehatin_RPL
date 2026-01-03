<?php
class Schedule {
    public static function insert($conn, $medId, $userId, $time) {
        mysqli_query($conn,
            "INSERT INTO schedules (medId, userId, time, repeatPattern)
             VALUES ('$medId','$userId','$time','Harian')");
    }

    public static function update($conn, $medId, $time) {
        mysqli_query($conn,
            "UPDATE schedules SET time='$time' WHERE medId='$medId'");
    }

    public static function deleteByMed($conn, $medId) {
        mysqli_query($conn, "DELETE FROM schedules WHERE medId='$medId'");
    }
}
