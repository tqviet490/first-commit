<?php include("../include/navbar.php"); ?>
<div>
	<h3>Cập nhật quyền tài khoản</h3>
	<form method="post" action="index.php" enctype="multipart/form-data">
		<input type="hidden" name="action" value="xulysua">
		<input type="hidden" name="txtid" value="<?php echo $_GET["id"]; ?>">
		<input type="hidden" name="txttaikhoan" value="<?php echo $nguoidung["taikhoan"]; ?>">
		<div class="m-3">    
			<label class="form-label">Quyền</label>    
			<select class="form-control" name="optquyen">
				<option value="admin">admin</option>
				<option value="user">user</option>
			</select>
		</div>
		<div class="m-3">    
			<label class="form-label">Tên người dùng</label>    
			<input class="form-control" type="text" value="<?php echo $nguoidung["tennguoidung"]; ?>" readonly>
		</div> 
		<div class="m-3">    
			<label class="form-label">Địa chỉ</label>    
			<input class="form-control" type="text" value="<?php echo $nguoidung["diachi"]; ?>" readonly>
		</div> 
		<div class="m-3">
			<input class="btn btn-primary"  type="submit" value="Cập nhật">
			<input class="btn btn-warning"  type="reset" value="Hủy">
		</div>
	</form>
</div>
<?php include("../include/footer.php"); ?>