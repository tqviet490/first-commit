<?php 
$soluong=$bd->laybaidangtheoidbai($donhang['idbaidang']);
include("include/navbar.php"); ?>
<div class="card mt-3">
  <div class="card-header">Xác nhận đơn hàng</div>
  <div class="card-body">
    <form action="index.php" method="post" enctype="multipart/form-data" >
      <div class="mb-3">
        <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id']; ?>">
      </div>
      <div class="mb-3">
        <input type="hidden" class="form-control" name="id_baidang" value="<?php echo $donhang['idbaidang']; ?>">
      </div>
      <div class="mb-3">
        <input type="hidden" class="form-control" name="soluongton" value="<?php echo $soluong['soluong']; ?>">
      </div>
      <div class="mb-3">
        <label for="noidung" class="form-label">Tên người mua:</label></br>
        <input class="form-control" type="text" name="ten" value="<?php echo $donhang['tennguoimua']; ?>" readonly>
      </div>  
      <div class="mb-3">
        <label for="noidung" class="form-label">Địa chỉ:</label></br>
        <input class="form-control" type="text" name="dc" value="<?php echo $donhang['diachi']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="noidung" class="form-label">Số lượng đặt:</label></br>
        <input type="text" class="form-control" name="soluongdat" value="<?php echo $donhang['soluong']; ?>" readonly>
      </div>
      <div class="mb-3">
        <label for="noidung" class="form-label">Ngày xác nhận:</label></br>
        <input type="text" class="form-control" id="ngayxacnhan" name="ngayxacnhan" readonly >
      </div>
      <input type="hidden" name="action" value="xulychapnhan">
      <input type="submit" value="Xác nhận" class="btn btn-success">
    </form>
  </div>
</div>
<script>
  function setDay(){
    var curDate = new Date();
          // Ngày hiện tại
    var curDay = curDate.getDate();
          // Tháng hiện tại
    var curMonth = curDate.getMonth() + 1;
          // Năm hiện tại
    var curYear = curDate.getFullYear();

    document.getElementById("ngayxacnhan").value = curDay + "/" + curMonth + "/" + curYear;
  }
</script>
<?php include("include/footer.php"); ?>