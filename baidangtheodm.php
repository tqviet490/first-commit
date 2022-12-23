<?php include("include/navbar.php"); ?>
<div class="card mt-3">
  <div class="card-header">Danh sách các bài đăng với từ khóa: <a style="color: red; font-weight: bold; font-size: 17pt"><?php echo $tendm ?></a></div>
  <div class="card-body">
    <?php 
    if($baidang != null){
      foreach($baidang as $item):?>  
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

    <div class="m-3">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <?php 
          if($trangdm > 1){
            $trang_truoc = $trangdm - 1;
            ?>
            <li class="page-item">
              <a class="page-link" href="?action=xemdanhmuc&tendanhmuc=<?php echo $tendm ?>&trang=<?=$trang_truoc?>"><</a>
            </li>
          <?php } ?>
          <?php for($i=1;$i<=$tongsotrang;$i++){ ?>
            <?php if($i != $trangdm){ ?>
              <li class="page-item"><a class="page-link" href="?action=xemdanhmuc&tendanhmuc=<?php echo $tendm ?>&trang=<?=$i?>"><?=$i?></a></li>
            <?php }else{ ?>
              <li class="page-item active" aria-current="page">
                <span class="page-link"><?=$i?></span>
              </li>
            <?php } ?>
          <?php } ?>
          <?php 
          if($trangdm < $tongsotrang -1){
            $trang_sau = $trangdm + 1;
            ?>
            <li class="page-item">
              <a class="page-link" href="?action=xemdanhmuc&tendanhmuc=<?php echo $tendm ?>&trang=<?=$trang_sau?>">></a>
            </li>
          <?php }
          ?>
        </ul>
      </nav>
    </div>

    <?php include("include/footer.php"); ?>