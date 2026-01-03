<?php
include "models/Medication.php";
include "models/Schedule.php";

class ObatController {

    public static function index($conn) {
        return Medication::getAll($conn, $_SESSION['user_id']);
    }

    public static function tambah($conn) {
        if (isset($_POST['simpan'])) {
            $medId = Medication::insert(
                $conn,
                $_SESSION['user_id'],
                $_POST['name'],
                $_POST['dosage'],
                $_POST['notes']
            );
            Schedule::insert(
                $conn,
                $medId,
                $_SESSION['user_id'],
                $_POST['time']
            );
            header("Location: index.php");
            exit;
        }
        include "views/obat/tambah.php";
    }

    public static function edit($conn, $id) {
        $result = Medication::getDetail($conn, $id);
        $data = mysqli_fetch_assoc($result);

        if (!$data) {
            die("Data tidak ditemukan");
        }

        if (isset($_POST['update'])) {
            Medication::update(
                $conn,
                $id,
                $_POST['name'],
                $_POST['dosage'],
                $_POST['notes']
            );
            Schedule::update($conn, $id, $_POST['time']);
            header("Location: index.php");
            exit;
        }
        include "views/obat/edit.php";
    }

    // ✅ METHOD DETAIL (INI YANG KURANG)
    public static function detail($conn, $id) {
        $result = Medication::getDetail($conn, $id);
        $data = mysqli_fetch_assoc($result);

        if (!$data) {
            die("Data tidak ditemukan");
        }

        include "views/obat/detail.php";
    }

    public static function delete($conn, $id) {
        Schedule::deleteByMed($conn, $id);
        Medication::delete($conn, $id);
        header("Location: index.php");
        exit;
    }
}
