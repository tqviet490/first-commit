<?php include("include/navbar.php"); ?>
<div class="card mt-3">
  <div class="card-header">Danh sách bài đăng của tôi</a></div>
  <div class="card-body">
    <div class="m-3"><a href="?action=dsdoncanxacnhan&id=<?php echo $_SESSION['nguoidung']['idnguoidung'] ?>" class="btn btn-primary">Danh sách đơn hàng cần xác nhận</a></div>
     <?php 
        foreach($baidang as $b):
            ?>
            <section class='baidang'>
              <div class="anh"><img src="images/<?=$b['hinhanh']?>" height='196px'></div>
              <div class="noidung">
                <section class='danhmuc'><?=$b['danhmuc']?></section>
                <section class='mota'><span class="d-inline-block text-truncate" style="max-width: 180px;">
                  Mô tả: <?=$b['mota']?></span></section>
                  <section class='gia'>Giá: <?=number_format($b['gia'],0,',','.')?> VNĐ</section>
                  <section class='lienhe'>Liên hệ: <?=$b['lienhe']?></section>
                  <section class='button'><a class="btn btn-info" href="?action=xemchitiet_bd_cuatoi&mabaidang=<?=$b['id'] ?>">Xem chi tiết</a></section><p></p>
                </div>
              </section>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="m-3">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-end">
              <?php 
              if($tranghh > 1){
                $trang_truoc = $tranghh - 1;
                ?>
                <li class="page-item">
                  <a class="page-link" href="?action=dsbaidang&id=<?php echo $idnguoidung ?>&trang=<?=$trang_truoc?>"><</a>
                </li>
              <?php } ?>
              <?php for($i=1;$i<=$tongsotrang;$i++){ ?>
                <?php if($i != $tranghh){ ?>
                  <li class="page-item"><a class="page-link" href="?action=dsbaidang&id=<?php echo $idnguoidung ?>&trang=<?=$i?>"><?=$i?></a></li>
                <?php }else{ ?>
                  <li class="page-item active" aria-current="page">
                    <span class="page-link"><?=$i?></span>
                  </li>
                <?php } ?>
              <?php } ?>
              <?php 
              if($tranghh < $tongsotrang -1){
                $trang_sau = $tranghh + 1;
                ?>
                <li class="page-item">
                  <a class="page-link" href="?action=dsbaidang&id=<?php echo $idnguoidung ?>&trang=<?=$trang_sau?>">></a>
                </li>
              <?php }
              ?>
            </ul>
          </nav>
        </div>

        <?php include("include/footer.php"); ?>