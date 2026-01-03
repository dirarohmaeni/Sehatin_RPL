<?php include "views/layout/header.php"; ?>

<div class="row justify-content-center">
<div class="col-md-4">
<div class="main-card">

<h4 class="mb-3 text-center">Login SEHATIN</h4>

<?php if(isset($error)){ ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php } ?>

<form method="POST">
<input class="form-control mb-3" name="username" placeholder="Username" required>
<input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
<button name="login" class="btn btn-success w-100">Login</button>
</form>

</div>
</div>
</div>

<?php include "views/layout/footer.php"; ?>
