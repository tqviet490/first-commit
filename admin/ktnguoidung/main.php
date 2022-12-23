<?php include("../include/navbar.php"); ?>
<div>
	<div class="card-body m-3" style="text-align: center;">
		<h3 style="font-size: 25pt; color: blue; font-weight: bold;">Trang quản trị</h3>
		<h4>Chào <?php echo $_SESSION["nguoidung"]["tennguoidung"]; ?>! Chúc một ngày tốt lành!</h4>
		<p>Chào mừng đến với trang quản trị</p>
		<a href="../qlbaidang/index.php" style="text-decoration: none;"><span class="w3-tag w3-large w3-round w3-red">Quản lí bài đăng </span></a>
		<a href="../qlnguoidung/index.php" style="text-decoration: none;"><span class="w3-tag w3-large w3-round w3-teal">Quản lí tài khoản</pan></a>
		<a href="../qldanhmuc/index.php" style="text-decoration: none;"><span class="w3-tag w3-large w3-round w3-yellow">Quản lí danh mục</span></a>

	</div>
</div>
<?php include("../include/footer.php"); ?>
