<?php include 'include/navbar.php'; ?>
<div class="card mt-3">
	<div class="card-header">Danh sách các bài đăng với từ khóa: <a style="color: red; font-weight: bold; font-size: 17pt"><?php echo $tukhoa ?></a></div>
	<div class="card-body">
		<?php 
			if($tk != null){
			foreach($tk as $item):?> 	
			<section class='baidang'>
				<div class="anh"><img src="images/<?=$item['hinhanh']?>" height='196px'></div>
				<div class="noidung">
					<section class='danhmuc'><?=$item['danhmuc']?></section>
					<section class='mota'><span class="d-inline-block text-truncate" style="max-width: 180px;">
						Mô tả: <?=$item['mota']?></span></section>
						<section class='gia'>Giá: <?=number_format($item['gia'],0,',','.')?> VNĐ</section>
						<section class='lienhe'>Liên hệ: <?=$item['lienhe']?></section><p></p>
						<section class='button'><a id="btn" href="?action=xemchitiet&mabaidang=<?=$item['id'] ?>">Xem chi tiết</a></section><p></p>
					</div>
				</section>
			<?php endforeach;}
				else echo "<p>Không tìm thấy bài đăng nào</p>"; ?>
		</div>
	</div>

	<?php include 'include/footer.php'; ?>
