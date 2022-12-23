<?php 
$bd = new BAIDANG();

if(isset($_GET['id']))
  $id=$_GET['id'];
else
  $id=1;

$b=$bd->laybaidangtheoid($id);

include 'include/navbar.php'; 
?>
<div class="card mt-3">
	<div class="card-header">Đặt mua sản phẩm</div>
	<div class="card-body">
		<form action="index.php" method="post">
			<div class="mb-3">
				<input type="hidden" class="form-control" id="idbd" name="idbd" value="<?php echo $b["id"]; ?>">
			</div>
			<div class="mb-3">
				<input type="hidden" class="form-control" id="idnguoimua" name="idnguoimua" value="<?php echo $_SESSION['nguoidung']["idnguoidung"]; ?>">
			</div>
			<div class="mb-3">
				<input type="hidden" class="form-control" id="idnguoidang" name="idnguoidang" value="<?php echo $b["idnguoidang"]; ?>">
			</div>
			<div class="mb-3">
				<label for="anhbd" class="form-label">Ảnh bài đăng:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="hidden" name="anhbd" value="<?php echo $b["hinhanh"]; ?>">
				<img src="images/<?php echo $b["hinhanh"]; ?>" width="200"><br>
			</div>
			<div class="mb-3">
				<label for="giabd" class="form-label">Giá bài đăng:</label>
				<input type="text" class="form-control" id="giabd" name="giabd" value="<?php echo $b["gia"]; ?>" readonly>
			</div><hr>
			<div class="mb-3">
				<label for="tennm" class="form-label">Tên người mua:</label>
				<input type="text" class="form-control" id="tennm" name="tennm" value="<?php echo $_SESSION['nguoidung']['tennguoidung'] ?>" readonly>
			</div>
			<div class="mb-3">
				<label for="diachi" class="form-label">Địa chỉ:</label>
				<input type="text" class="form-control" id="diachi" name="diachi" maxlength="100" value="<?php echo $_SESSION['nguoidung']['diachi']; ?>" required />
			</div>
			<div class="mb-3">
				<label for="sodienthoai" class="form-label">Số điện thoại:</label>
				<input type="text" class="form-control" id="sodienthoai" name="sodienthoai" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required />
			</div>
			<div class="mb-3">
				<label for="soluong" class="form-label">Số lượng:</label>
				<input type="number" class="form-control" id="soluong" value="1" name="soluong" min="1" max="<?php echo $b['soluong'] ?>" maxlength="1" style="width:70px"required />
			</div>
			<div class="mb-3">
				<input type="hidden" class="form-control" id="ngaydat" name="ngaydat" value="" required />
			</div>
			<input type="hidden" name="action" value="xulydatmua" >
			<input class="btn btn-primary"   type="submit" value="Đặt mua"></br>
		</form>
	</div>
</div>
<script>
	function setDay(){
		var curDate = new Date();
					// Ngày hiện tại
		var curDay = curDate.getDate();
					// Tháng hiện tại
		var curMonth = curDate.getMonth() + 1;
					// Năm hiện tại
		var curYear = curDate.getFullYear();

		document.getElementById("ngaydat").value = curDay + "/" + curMonth + "/" + curYear;
	}
</script>
<?php include 'include/footer.php'; ?>

