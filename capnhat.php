<?php 
include 'include/navbar.php'; 
?>
<div class="card mt-3">
	<div class="card-header">Cập nhật bài đăng</div>
	<div class="card-body">
		<form action="index.php" method="post" enctype="multipart/form-data">
			<div class="mb-3">
				<label class="form-label">Người đăng:</label>
				<input type="text" disabled="disabled" class="form-control" name="tennd" value="<?php echo $_SESSION['nguoidung']['tennguoidung']; ?>">
			</div>
			<div class="mb-3">
				<label class="form-label">Danh mục:</label>
				<select class="form-select" name="danhmuc" required>
					<?php foreach ($danhmuc as $dm ) { ?>
						<option value="<?php echo $dm["tendanhmuc"]; ?>" <?php if($dm["tendanhmuc"] == $ctbd["danhmuc"]) echo "selected"; ?>><?php echo $dm["tendanhmuc"]; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="mb-3">
				<label class="form-label">Giá:</label>
				<input type="text" class="form-control" name="gia" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo $ctbd['gia']; ?>" required />
				</div>
				<div class="mb-3">
					<label class="form-label">Số lượng:</label>
					<input type="text" class="form-control" name="soluong" maxlength="100" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo $ctbd['soluong']; ?>" required />
					</div>
					<div class="mb-3">
						<label class="form-label">Liên hệ:</label>
						<input type="text" class="form-control" name="lienhe" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php echo $ctbd['lienhe']; ?>" required />
						</div>
						<div class="mb-3">
							<label class="form-label">Mô tả:</label>
							<input type="text" class="form-control" name="mota" maxlength="40" value="<?php echo $ctbd['mota']; ?>" required />
						</div>
						<div class="mb-3">
							<label class="form-label">Nội dung:</label></br>
							<textarea class="form-control" name="noidung" rows="6" required><?php echo $ctbd['noidung']; ?></textarea>
						</div>			
						<div class="mb-3">
							<label class="form-label">Ảnh mô tả:</label>
							<input type="hidden" name="anhcu" value="<?php echo $ctbd["hinhanh"]; ?>">
							<img src="images/<?php echo $ctbd["hinhanh"]; ?>" width="100"><br>
							<input type="checkbox" id="chkdoianh" name="chkdoianh" value="1"> Đổi ảnh<br>
						</div>
						<div id="file" class="m-3">  
							<input type="file" class="form-control" name="filehinhanh">
						</div>
						<div class="mb-3">
							<input type="hidden" class="form-control" name="id" value="<?php echo $ctbd['id']; ?>">
							<input type="hidden" name="action" value="xulycapnhat">
							<input type="submit" value="Cập nhật" class="btn btn-success">
						</form>
					</div>
				</div>
				<script>
					$(document).ready(function(){
						$("#file").hide();
						$("#chkdoianh").click(function(){        
							$("#file").toggle(500);
						});
					});
				</script>
				<?php include 'include/footer.php'; ?>

