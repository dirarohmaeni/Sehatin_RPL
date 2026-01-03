<?php include __DIR__ . "/../layout/header.php"; ?>

<div class="row justify-content-center">
<div class="col-md-6">

<div class="main-card">
<h4 class="mb-3">Detail Obat</h4>

<table class="table table-borderless">
<tr>
    <th>Nama Obat</th>
    <td><?= htmlspecialchars($data['name']) ?></td>
</tr>
<tr>
    <th>Dosis</th>
    <td><?= htmlspecialchars($data['dosage']) ?></td>
</tr>
<tr>
    <th>Waktu</th>
    <td><?= $data['time'] ?></td>
</tr>
<tr>
    <th>Pengulangan</th>
    <td><?= htmlspecialchars($data['repeatPattern']) ?></td>
</tr>
<tr>
    <th>Catatan</th>
    <td><?= htmlspecialchars($data['notes']) ?></td>
</tr>
</table>

<a href="/sehatin/index.php" class="btn btn-secondary">Kembali</a>
</div>

</div>
</div>

<?php include __DIR__ . "/../layout/footer.php"; ?>
