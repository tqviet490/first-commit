<?php include 'include/navbar.php'; ?>
<div class="card mt-3">
	<div class="card-header">Đăng nhập</div>
	<div class="card-body">
		<form action="index.php" method="post">
			<div class="mb-3">
				<label class="form-label">Tài khoản:</label>
				<input type="text" class="form-control" name="taikhoan" required />
			</div>
			<div class="mb-3">
				<label class="form-label">Mật khẩu:</label>
				<input type="password" class="form-control" name="matkhau" required />
			</div>
			<input type="hidden" name="action" value="xldangnhap" >
			<input class="btn btn-primary"   type="submit" value="Đăng nhập"></br>
		</form>
	</div>
</div>
<?php include 'include/footer.php'; ?>

