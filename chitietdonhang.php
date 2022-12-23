<?php include("include/navbar.php"); ?>
<div class="card mt-3">
  <div class="card-header">Chi tiết đơn hàng của tôi</a></div>
  <div class="card-body">
    <div class="thongtin">
      <table class="table" style="width:100%">
        <thead>
          <tr>
            <th class="table table-primary" colspan="2" scope="col" style="width:20%">Địa chỉ nhận hàng</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Tên người nhận</th>
            <th scope="row"><?php echo $donhang['tennguoimua']?></th>
          </tr>
          <tr>
            <th scope="row">Số điện thoại</th>
            <th scope="row"><?php echo $donhang['sodienthoai']?></th>
          </tr>
          <tr>
            <th scope="row">Địa chỉ</th>
            <th scope="row"><?php echo $donhang['diachi']?></th>
          </tr>
        </tbody>
      </table>
    </div>
    <?php
    foreach($baidang as $b):
      if($donhang["idbaidang"] == $b['id']){
        ?> 
        <form action="index.php" method="post">
          <div class="thongtindonhang">
            <table class="table table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th class="table table-danger" style="width:70%" scope="col">Thông tin đơn hàng</th>
                  <th class="table table-danger" scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row" style="text-align:left"><a style="text-decoration: none; font-size: 20pt;" href="?action=xemchitiet&mabaidang=<?=$donhang['idbaidang']?>"><img src="images/<?=$b['hinhanh']?>" width="150px">   <?=$b['mota']?></a></th>
                  <th scope="row" style="text-align:center; font-size: 17pt"><?php echo number_format($donhang['giabaidang'])?>đ</th>
                </tr>
                <tr>
                  <th scope="row" style="text-align:right; color:red">Ngày đặt</th>
                  <th scope="row" style="text-align:right"><?php echo $donhang['ngaydat']?></th>
                </tr>
                <tr>
                  <th scope="row" style="text-align:right; color:red">Trạng thái</th>
                  <th scope="row" style="text-align:right">
                    <?php if(($donhang['trangthai'])=='Chờ xác nhận'){ ?>
                      <a class="btn btn-warning disabled"><?php echo $donhang['trangthai']?></a>
                    <?php }elseif(($donhang['trangthai'])=='Chấp nhận giao'){ ?>
                      <a class="btn btn-info disabled"><?php echo $donhang['trangthai']?></a>
                    <?php }else{ ?>
                      <a class="btn btn-danger disabled"><?php echo $donhang['trangthai']?></a>
                    <?php } ?>
                  </th>
                </tr>
                <tr>
                  <th scope="row" style="text-align:right; color:red">Số lượng</th>
                  <th scope="row" style="text-align:right"><input style="width:20%;text-align:right" type="number" size="3" min="1" name="soluong" max="<?php echo $b['soluong'] ?>" value="<?php echo $donhang['soluong']?>"></th>
                </tr>
                <tr>
                  <th scope="row" style="text-align:right; color:red">Tổng tiền hàng</th>
                  <th scope="row" style="text-align:right"><input style="text-align:right; border:none" type="text" name="tongtien" value="<?php echo number_format($donhang['tongtien'])?>" readonly>đ</input></th>
                </tr>
                <tr>
                  <th scope="row" style="text-align:right; color:red">Ngày xác nhận</th>
                  <th scope="row" style="text-align:right"><?php echo $donhang['ngayxacnhan']?></th>
                </tr>
                <tr>
                  <th scope="row" style="text-align:right; color:red"></th>
                  <th scope="row" style="text-align:right">
                    <input type="hidden" class="form-control" name="giabai" value="<?php echo $donhang['giabaidang']; ?>">
                    <input type="hidden" class="form-control" name="iddon" value="<?php echo $donhang['id']; ?>"></th>
                  </tr>
                  <tr>
                    <th scope="row" style="text-align:right; color:red"></th>
                    <?php if(($donhang['trangthai'])=='Chờ xác nhận'){ ?>
                      <th scope="row" style="text-align:right">
                        <input type="hidden" name="action" value="xulycapnhatdonhang">
                        <input type="submit" value="Cập nhật" class="btn btn-primary" style="text-align:right">
                        <a class="btn btn-warning" onclick="return confirm('Bạn có chắc muốn hủy đơn này không?')" href="?action=huydonhang&id=<?php echo $donhang['id'] ?>">Hủy đơn</a>
                      <?php }else{ ?>
                        <th scope="row" style="text-align:right">
                          <input type="submit" value="Cập nhật" class="btn btn-primary" style="text-align:right" disabled>
                          <a class="btn btn-warning disabled" onclick="return confirm('Bạn có chắc muốn hủy đơn này không?')" href="?action=huydonhang&id=<?php echo $donhang['id'] ?>">Hủy đơn</a>
                          <?php } ?></th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
              <?php } endforeach; ?>
              <?php include("include/footer.php"); ?>