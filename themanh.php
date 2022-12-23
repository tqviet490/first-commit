<?php 
include 'include/navbar.php'; 
?>
<div class="card mt-3">
	<div class="card-header">Cập nhật ảnh bài đăng</div>
	<div class="card-body">
		<form action="index.php" method="post" enctype="multipart/form-data">			
			<div class="mb-3">
				<div id="filect" class="m-3">  
					<label class="form-label">Chọn ảnh chi tiết:</label>
					<input type="file" class="form-control" name="filehinhanhct[]" multiple>
				</div>
				<div class="mb-3">
					<input type="hidden" class="form-control" name="id" value="<?php echo $ctbd['id']; ?>">
					<input type="hidden" name="action" value="xulythemanh">
					<input type="submit" value="Thêm" class="btn btn-success">
				</div>
			</div>
		</form>
	</div>
	<?php include 'include/footer.php'; ?>

