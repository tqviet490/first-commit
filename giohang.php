<?php include("include/navbar.php"); ?>
<div class="card mt-3">
  <div class="card-header">Giỏ hàng của tôi</a></div>
  <div class="card-body">
    <?php 
      foreach($giohang as $g): ?> 
        <?php
        foreach($baidang as $b):
          if($g["idbaidang"] == $b['id']){
            ?> 
            <section class='baidang'>
              <div class="anh"><img src="images/<?=$b['hinhanh']?>" height='196px'></div>
              <div class="noidung">
                <section class='danhmuc'><?=$b['danhmuc']?></section>
                <section class='mota'><span class="d-inline-block text-truncate" style="max-width: 180px;">
                  Mô tả: <?=$b['mota']?></span></section>
                  <section class='gia'>Giá: <?=number_format($b['gia'],0,',','.')?> VNĐ</section>
                  <section class='lienhe'>Liên hệ: <?=$b['lienhe']?></section>
                  <section class='button'><a class="btn btn-info" href="?action=xemchitiet&mabaidang=<?=$b['id'] ?>">Xem chi tiết</a></section><p></p>
                  <section class='button'><a class="btn btn-warning" href="?action=xoakhoigio&id=<?=$g['id'] ?>">Xóa khỏi giỏ</a></section><p></p>
                </div>
              </section>
              <?php } endforeach; ?>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="m-3">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
              <?php 
              if($tranggh > 1){
                $trang_truoc = $tranggh - 1;
                ?>
                <li class="page-item">
                  <a class="page-link" href="?action=giohangcuatoi&id=<?php echo $idnguoidung ?>&trang=<?=$trang_truoc?>"><</a>
                </li>
              <?php } ?>
              <?php for($i=1;$i<=$tongsotrang;$i++){ ?>
                <?php if($i != $tranggh){ ?>
                  <li class="page-item"><a class="page-link" href="?action=giohangcuatoi&id=<?php echo $idnguoidung ?>&trang=<?=$i?>"><?=$i?></a></li>
                <?php }else{ ?>
                  <li class="page-item active" aria-current="page">
                    <span class="page-link"><?=$i?></span>
                  </li>
                <?php } ?>
              <?php } ?>
              <?php 
              if($tranggh < $tongsotrang -1){
                $trang_sau = $tranggh + 1;
                ?>
                <li class="page-item">
                  <a class="page-link" href="?action=giohangcuatoi&id=<?php echo $idnguoidung ?>&trang=<?=$trang_sau?>">></a>
                </li>
              <?php }
              ?>
            </ul>
          </nav>
        </div>

        <?php include("include/footer.php"); ?>