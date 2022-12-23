<?php include("include/navbar.php"); ?>
<div class="card mt-3">
  <div class="card-header">Danh sách đơn hàng cần xác nhận</a></div>
  <div class="card-body">
   <div class="w3-responsive">
    <table class="w3-table-all">
      <tr>
        <th>Tên người mua</th>
        <th>Giá</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Số lượng đặt</th>
        <th>Ngày đặt</th>
        <th>Trạng thái</th>
        <th>Chấp nhận</th>
        <th>Hủy bỏ</th>
        <th>Ghi chú</th>
      </tr>
      <?php foreach($danhsach as $item):?>
        <tr>
          <td><?=$item['tennguoimua']?></td>
          <td><?=$item['giabaidang']?></td>
          <td><?=$item['diachi']?></td>
          <td><?=$item['sodienthoai']?></td>
          <td><?=$item['soluong']?></td>
          <td><?=$item['ngaydat']?></td>
          <?php if(($item['trangthai'])=='Chờ xác nhận'){ ?>
            <td><a class="btn btn-warning disabled"><?=$item['trangthai']?></a></td>
            <td><a class="btn btn-info" href="?action=chapnhan&id=<?php echo $item["id"]; ?>"><i class="fa fa-check-circle" aria-hidden="true"></i></a></td>
            <td><a class="btn btn-danger" href="?action=huybo&id=<?php echo $item["id"]; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
          <?php }elseif(($item['trangthai'])=='Chấp nhận giao'){ ?>
            <td><a class="btn btn-info disabled"><?=$item['trangthai']?></a></td>
            <td><a class="btn btn-info disabled" href="?action=chapnhan&id=<?php echo $item["id"]; ?>"><i class="fa fa-check-circle" aria-hidden="true"></i></a></td>
            <td><a class="btn btn-danger disabled" href="?action=huybo&id=<?php echo $item["id"]; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
          <?php }else{ ?>
            <td><a class="btn btn-danger disabled"><?=$item['trangthai']?></a></td>
            <td><a class="btn btn-info disabled" href="?action=chapnhan&id=<?php echo $item["id"]; ?>"><i class="fa fa-check-circle" aria-hidden="true"></i></a></td>
            <td><a class="btn btn-danger disabled" href="?action=huybo&id=<?php echo $item["id"]; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
          <?php } ?>
          <td><?=$item['ghichu']?></td>
        </tr>
      <?php endforeach; ?>
    </table>
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
                  <a class="page-link" href="?action=dsdoncanxacnhan&id=<?php echo $id ?>&trang=<?=$trang_truoc?>"><</a>
                </li>
              <?php } ?>
              <?php for($i=1;$i<=$tongsotrang;$i++){ ?>
                <?php if($i != $tranghh){ ?>
                  <li class="page-item"><a class="page-link" href="?action=dsdoncanxacnhan&id=<?php echo $id ?>&trang=<?=$i?>"><?=$i?></a></li>
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
                  <a class="page-link" href="?action=dsdoncanxacnhan&id=<?php echo $id ?>&trang=<?=$trang_sau?>">></a>
                </li>
              <?php }
              ?>
            </ul>
          </nav>
        </div>

        <?php include("include/footer.php"); ?>