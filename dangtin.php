<?php 
include 'include/navbar.php'; 
?>

<div class="card mt-3">
	<div class="card-header">Đăng tin</div>
	<div class="card-body">
		<form action="index.php" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Người đăng:</label>
				<input type="text" disabled="disabled" class="form-control" name="tennd" value="<?php echo $_SESSION['nguoidung']['tennguoidung']; ?>">
			</div>
			<div class="mb-3">
				<label for="danhmuc" class="form-label">Danh mục:</label>
				<select class="form-select" name="danhmuc" required>
					<?php
					foreach($danhmuc as $d):
						?>
						<option value="<?php echo $d["tendanhmuc"]; ?>"><?php echo $d["tendanhmuc"]; ?></option>
						<?php
					endforeach;
					?>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Giá:</label>
				<input type="text" class="form-control" name="gia" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required />
			</div>
			<div class="mb-3">
				<input type="hidden" class="form-control" id="ngaydang" name="ngaydang" value="" required />
			</div>
			<div class="mb-3">
				<label class="form-label">Số lượng:</label>
				<input type="text" class="form-control" name="soluong" maxlength="100" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required />
			</div>
			<div class="mb-3">
				<label class="form-label">Liên hệ:</label>
				<input type="text" class="form-control" id="lienhe" name="lienhe" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required />
			</div>
			<div class="mb-3">
				<label class="form-label">Mô tả:</label>
				<input type="text" class="form-control" name="mota" maxlength="40" required />
			</div>
			<div class="mb-3">
				<label class="form-label">Nội dung:</label></br>
				<textarea class="form-control" name="noidung" rows="6" required></textarea>
			</div>			
			<div class="mb-3">
				<label for="anh" class="form-label">Chọn hình ảnh mô tả:</label>
				<input class="form-control" type="file" name="anh" required>
			</div>
			<div class="mb-3">
				<input type="hidden" class="form-control" name="idnguoidang" value="<?php echo $_SESSION['nguoidung']['idnguoidung']; ?>"required />
			</div>	
			<div class="mb-3">
				<input type="hidden" class="form-control" id="trangthai" name="trangthai" value='Chờ xét duyệt' required />
			</div>	
			<input type="hidden" name="action" value="xulydangtin">
			<input type="submit" value="Thêm mới" class="btn btn-success">
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

		document.getElementById("ngaydang").value = curDay + "/" + curMonth + "/" + curYear;
	}
</script>
<?php include 'include/footer.php'; ?>

