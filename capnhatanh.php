<?php 
include 'include/navbar.php'; 
?>
<div class="card mt-3">
	<div class="card-header">Cập nhật ảnh bài đăng</div>
	<div class="card-body">
		<form action="index.php" method="post" enctype="multipart/form-data">			
			<div class="mb-3">
				<label class="form-label">Ảnh chi tiết:</label>
				<?php foreach($anhbd as $anh){ ?>
					<img src="library/<?php echo $anh['image']?>" width="100" height="100">
					<?php } ?><br>
					<input type="checkbox" id="chkdoianhct" name="chkdoianhct" value="1"> Đổi ảnh<br>
				</div>
				<div id="filect" class="m-3">  
					<input type="file" class="form-control" name="filehinhanhct[]" multiple>
				</div>
				<div class="mb-3">
					<input type="hidden" class="form-control" name="id" value="<?php echo $ctbd['id']; ?>">
					<input type="hidden" name="action" value="xulycapnhatanh">
					<input type="submit" value="Cập nhật" class="btn btn-success">
				</form>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				$("#filect").hide();
				$("#chkdoianhct").click(function(){        
					$("#filect").toggle(500);
				});
			});
		</script>
		<?php include 'include/footer.php'; ?>

