<?php include '../include/navbar.php'; ?>
<div class="m-3">
	<a href="?action=xem" style="text-decoration: none;"><span class="w3-tag w3-large w3-round w3-red">Danh sách bài đăng chưa duyệt</span></a>
	<a href="?action=dsdaduyet" style="text-decoration: none;"><span class="w3-tag w3-large w3-round w3-teal">Danh sách bài đăng đã duyệt</pan></a>
</div>
<div class="card mt-3">
	<div class="card-header">Danh sách các bài đăng chờ duyệt</div>
	<div class="card-body">
		<?php foreach($baidang as $item):?> 	
			<section class='baidang'>
				<div class="anh"><img src="../../images/<?=$item['hinhanh']?>" height='196px'></div>
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

	<?php include '../include/footer.php'; ?>
