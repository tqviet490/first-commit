<?php 
$bd = new BAIDANG();

if(isset($_GET['mabaidang']))
	$id=$_GET['mabaidang'];
else
	$id=1;

include '../include/navbar.php'; 
?>
<div class="card mt-3">
	<section>
		<div class="w3-container w3-center">
			<div id="img-baidang" class="w3-container w3-left w3-card-4 w3-mobile"><img src="../../images/<?php echo $ctbd['hinhanh'] ?>"></div>
			<div id="chitiet-baidang">
				<h1 class="w3-center w3-mobile"><?php echo $ctbd['mota'] ?></h1>
				<label class="w3-left w3-margin-left w3-mobile">Người đăng: <span class="gia-baidang"><?php echo $ctbd['tennguoidung'] ?></span></label><br/>
				<label class="w3-left w3-margin-left w3-mobile">Giá: <span class="gia-baidang"><?php echo number_format($ctbd['gia'],0,',','.') ?> VNĐ</span></label>
				<label class="w3-left w3-margin-left w3-mobile">Số lượng: <span class="gia-baidang"> <?php echo $ctbd['soluong'] ?></span></label>
				<label class="w3-left w3-margin-left w3-mobile">Ngày đăng: <span class="gia-baidang"><?php echo $ctbd['ngaydang'] ?></span></label>
				<br/>
				<label class="themvaogio w3-button w3-round w3-amber w3-left w3-margin-left w3-mobile"><a href="?action=xoa&id=<?php echo $ctbd['id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa bài đăng này không?')">Xóa bài đăng</a></label><br/><br/>
				<?php if(!empty($anhbd)){ ?>
					<div id="img-chitiet" class="w3-margin">
						<ul>
							<?php foreach($anhbd as $anh){ ?>
								<li><img src="../../library/<?php echo $anh['image']?>" /></li>
							<?php } ?>
						</ul>
					</div>
				<?php }else echo "<p></p><h5>Bài đăng này không có ảnh chi tiết.</h5>"?>
			</div>
			<div class="clear-both"></div>
			<div class="w3-left-align">
				<p><h1  class="w3-text-red">Nội dung sản phẩm:</h1></p><hr/>
				<p><?php echo $ctbd['noidung'] ?></p>
			</div>
		</div>
	</section>
</div>
<?php include '../include/footer.php'; ?>