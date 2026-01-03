<?php include "views/layout/header.php"; ?>

<div class="main-card">
<h4 class="mb-3">Jadwal Minum Obat</h4>

<a href="index.php?action=tambah" class="btn btn-success mb-3">
+ Tambah Obat
</a>

<table class="table table-bordered align-middle">
<thead>
<tr>
<th>Obat</th>
<th>Waktu</th>
<th>Pengulangan</th>
<th width="220">Aksi</th>
</tr>
</thead>
<tbody>

<?php while($row = mysqli_fetch_assoc($data)){ ?>
<tr>
<td><?= $row['name'] ?></td>
<td><?= $row['time'] ?></td>
<td><?= $row['repeatPattern'] ?></td>
<td>
<a href="index.php?action=detail&id=<?= $row['id'] ?>"
   class="btn btn-detail btn-sm">
   Detail
</a>
<a href="index.php?action=edit&id=<?= $row['id'] ?>" class="btn btn-edit btn-sm">Edit</a>
<a href="index.php?action=delete&id=<?= $row['id'] ?>" 
   class="btn btn-delete btn-sm"
   onclick="return confirm('Hapus data?')">Hapus</a>
</td>
</tr>
<?php } ?>

</tbody>
</table>
</div>

<?php include "views/layout/footer.php"; ?>
