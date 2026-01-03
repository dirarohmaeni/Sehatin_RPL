<?php
class Medication {

    public static function getAll($conn, $userId) {
        return mysqli_query($conn,
            "SELECT m.id, m.name, s.time, s.repeatPattern
             FROM schedules s
             JOIN medications m ON s.medId = m.id
             WHERE s.userId='$userId'"
        );
    }

    public static function getDetail($conn, $id) {
        $stmt = mysqli_prepare($conn,
            "SELECT m.*, s.time, s.repeatPattern
             FROM medications m
             JOIN schedules s ON m.id = s.medId
             WHERE m.id = ?"
        );
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }

    public static function insert($conn, $userId, $name, $dosage, $notes) {
        mysqli_query($conn,
            "INSERT INTO medications (userId, name, dosage, notes)
             VALUES ('$userId','$name','$dosage','$notes')"
        );
        return mysqli_insert_id($conn);
    }

    public static function update($conn, $id, $name, $dosage, $notes) {
        mysqli_query($conn,
            "UPDATE medications
             SET name='$name', dosage='$dosage', notes='$notes'
             WHERE id='$id'"
        );
    }

    public static function delete($conn, $id) {
        mysqli_query($conn, "DELETE FROM medications WHERE id='$id'");
    }
}
