<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
}

$id = $_GET['id'];

// Ambil data obat + jadwal
$query = "SELECT m.*, s.time 
          FROM medications m
          JOIN schedules s ON m.id = s.medId
          WHERE m.id='$id'";
$data = mysqli_fetch_assoc(mysqli_query($conn, $query));

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $dosage = $_POST['dosage'];
    $notes = $_POST['notes'];
    $time = $_POST['time'];

    mysqli_query($conn, "UPDATE medications 
                         SET name='$name', dosage='$dosage', notes='$notes'
                         WHERE id='$id'");

    mysqli_query($conn, "UPDATE schedules 
                         SET time='$time'
                         WHERE medId='$id'");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Obat</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
<div class="card">
<div class="card-header">Edit Obat</div>
<div class="card-body">

<form method="POST">
<input type="text" name="name" class="form-control mb-3"
       value="<?= $data['name'] ?>" required>

<input type="text" name="dosage" class="form-control mb-3"
       value="<?= $data['dosage'] ?>">

<textarea name="notes" class="form-control mb-3"><?= $data['notes'] ?></textarea>

<input type="time" name="time" class="form-control mb-3"
       value="<?= $data['time'] ?>" required>

<div class="d-flex justify-content-between">
<a href="index.php" class="btn btn-outline-secondary">← Kembali</a>
<button name="update" class="btn btn-warning">Update</button>
</div>
</form>

</div>
</div>
</div>
<?php include __DIR__ . "/../layout/footer.php"; ?>
