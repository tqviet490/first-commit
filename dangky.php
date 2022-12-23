<?php include 'include/navbar.php'; ?>
<div class="card mt-3">
	<div class="card-header">Đăng ký tài khoản</div>
	<div class="card-body">
		<form action="index.php" method="post" onsubmit="if(repassword.value != password.value){alert('Mật khẩu xác nhận không khớp!'); return false;}">
		<div class="mb-3">
			<label class="form-label">Tên tài khoản:</label>
			<input type="text" class="form-control" name="username" maxlength="10" required />
		</div>
		<div class="mb-3">
			<label class="form-label">Mật khẩu:</label>
			<input type="password" class="form-control" name="password" minlength="6" required />
		</div>
		<div class="mb-3">
			<label class="form-label">Nhập lại mật khẩu:</label>
			<input type="password" class="form-control" name="repassword" required />
		</div>
		<div class="mb-3">
			<label class="form-label">Tên người dùng:</label>
			<input type="text" class="form-control" name="tennguoidung" required />
		</div>
		<div class="mb-3">
			<label class="form-label">Địa chỉ:</label>
			<textarea type="text" class="form-control" name="diachi" rows="4" required /></textarea>
		</div>
		<input type="hidden" name="action" value="xldangky" >
		<input class="btn btn-primary"   type="submit" value="Đăng ký"></br>
	</form>
</div>
</div>
<?php include 'include/footer.php'; ?>