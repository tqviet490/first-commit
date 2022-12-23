<?php include("include/navbar.php"); ?>
<div class="card mt-3">
  <div class="card-header">Danh sách đơn hàng của tôi</a></div>
  <div class="card-body">
    <?php 
    foreach($danhsach as $item):
      ?>
      <?php
      foreach($baidang as $b):
        if($item["idbaidang"] == $b['id']){
          ?> 
          <section class='baidang'>
            <div class="anh"><img src="images/<?=$b['hinhanh']?>" height='196px'></div>
            <div class="noidung">
              <section class='danhmuc'><?=$b['danhmuc']?></section>
              <section class='gia'>Giá: <?=number_format($b['gia'],0,',','.')?> VNĐ</section>
              <section class='lienhe' title="Ghi chú: <?=$item['ghichu'] ?>">Trạng thái: <b><?=$item['trangthai']?></b></section><p></p>
              <?php if($item['trangthai'] == "Chấp nhận giao"){?>
                <section class='button'><a id="btn" href="?action=chitietdonhang&id=<?=$item['id'] ?>">Xem chi tiết</a></section><p></p>
              <?php }else{ ?>
                <section class='button'><a id="btn" href="?action=chitietdonhang&id=<?=$item['id'] ?>">Xem chi tiết</a></section><p></p>
                <section class='button'><a id="btn" style="background-color: orange;" onclick="return confirm('Bạn có chắc muốn hủy đơn này không?')" href="?action=huydonhang&id=<?=$item['id'] ?>">Hủy đơn</a></section>
              <?php } ?>
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
        if($tranghh > 1){
          $trang_truoc = $tranghh - 1;
          ?>
          <li class="page-item">
            <a class="page-link" href="?action=donhangcuatoi&id=<?php echo $id ?>&trang=<?=$trang_truoc?>"><</a>
          </li>
        <?php } ?>
        <?php for($i=1;$i<=$tongsotrang;$i++){ ?>
          <?php if($i != $tranghh){ ?>
            <li class="page-item"><a class="page-link" href="?action=donhangcuatoi&id=<?php echo $id ?>&trang=<?=$i?>"><?=$i?></a></li>
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
            <a class="page-link" href="?action=donhangcuatoi&id=<?php echo $id ?>&trang=<?=$trang_sau?>">></a>
          </li>
        <?php }
        ?>
      </ul>
    </nav>
  </div>

  <?php include("include/footer.php"); ?>