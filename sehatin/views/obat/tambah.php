<?php include "views/layout/header.php"; ?>

<div class="row justify-content-center">
<div class="col-md-6">
<div class="main-card">

<h4 class="mb-3">Tambah Obat</h4>

<form method="POST">
<input class="form-control mb-3" name="name" placeholder="Nama Obat" required>
<input class="form-control mb-3" name="dosage" placeholder="Dosis">
<input class="form-control mb-3" type="time" name="time" required>
<textarea class="form-control mb-3" name="notes" placeholder="Catatan"></textarea>

<button name="simpan" class="btn btn-success">Simpan</button>
<a href="index.php" class="btn btn-secondary">Kembali</a>
</form>

</div>
</div>
</div>

<?php include "views/layout/footer.php"; ?>
