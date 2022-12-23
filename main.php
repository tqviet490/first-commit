<?php include 'include/navbar.php'; ?>
<header class="w3-display-container w3-content w3-wide w3-margin" style="max-width:1500px;">
	<!-- <img name="bannerpic" class="banner w3-image" src="hinhanh/banner/banner1.jpg">   -->

	<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="hinhanh/banner/b1.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>Sản phẩm chất lượng</h5>
					<p>Rất nhiều sản phẩm và các loại tin rao vặt được đăng tại đây.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="hinhanh/banner/b2.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>Mẫu mã đa dạng</h5>
					<p>Những món đồ mà bạn đang tìm kiếm có thể sẽ có tại đây.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="hinhanh/banner/b3.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>Nhanh chóng và miễn phí</h5>
					<p>Sử dụng hoàn toàn miễn phí chỉ cần đăng nhập.</p>
				</div>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
</header>

<div class="card mt-3">
	<div class="card-header">Danh sách các bài đăng</div>
	<div class="card-body">
		<?php foreach($bd as $item):?> 	
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
			<?php endforeach; ?>
		</div>
	</div>
	<nav class="mt-3" aria-label="Page navigation example">
		<ul class="pagination justify-content-end">
			<?php 
			if($tranghh > 3){
				$first_page = 1;
				?>
				<li class="page-item">
					<a class="page-link" href="?trang=<?=$first_page?>">First</a>
				</li>
			<?php }
			if($tranghh > 1){
				$prev_page = $tranghh - 1;
				?>
				<li class="page-item">
					<a class="page-link" href="?trang=<?=$prev_page?>">Previous</a>
				</li>
			<?php } ?>
			<?php for($i=1;$i<=$tongsotrang;$i++){ ?>
				<?php if($i != $tranghh){ ?>
					<li class="page-item"><a class="page-link" href="?trang=<?=$i?>"><?=$i?></a></li>
				<?php }else{ ?>
					<li class="page-item active" aria-current="page">
						<span class="page-link"><?=$i?></span>
					</li>
				<?php } ?>
			<?php } ?>
			<?php 
			if($tranghh < $tongsotrang -1){
				$next_page = $tranghh + 1;
				?>
				<li class="page-item">
					<a class="page-link" href="?trang=<?=$next_page?>">Next</a>
				</li>
			<?php }
			if($tranghh < $tongsotrang - 3){
				$end_page = $tongsotrang;
				?>
				<li class="page-item">
					<a class="page-link" href="?trang=<?=$end_page?>">Last</a>
				</li>
			<?php } ?>
		</ul>
	</nav>

	<?php include 'include/footer.php'; ?>
