<?php 
include("include/navbar.php"); ?>
<div class="card mt-3">
  <div class="card-header">Hủy bỏ đơn hàng</div>
  <div class="card-body">
    <form action="index.php" method="post" enctype="multipart/form-data" >
      <div class="mb-3">
        <input type="hidden" class="form-control" name="id" value="<?php echo $_GET['id']; ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Lí do:</label></br>
        <textarea class="form-control" name="ghichu" rows="6" required></textarea>
      </div>    
      <div class="mb-3">
        <label for="noidung" class="form-label">Ngày xác nhận:</label></br>
        <input type="hidden" class="form-control" id="ngayxacnhan" name="ngayxacnhan" readonly >
      </div>
      <input type="hidden" name="action" value="xulyhuybo">
      <input type="submit" value="Từ chối" class="btn btn-warning">
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