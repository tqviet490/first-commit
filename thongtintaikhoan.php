<?php include("include/navbar.php"); ?>
<div class="card mt-3">
  <div class="card-header">Thông tin tài khoản của tôi</a></div>
    <form action="index.php" method="post" enctype="multipart/form-data">
      <div class="thongtin">
        <table class="table" style="width:100%">
          <thead>
            <tr>
              <th class="table table-primary" scope="col" style="width: 20%"></th>
              <th class="table table-primary" scope="col" style="width: 15%"></th>
              <th class="table table-primary" scope="col" style="width: 35%"></th>
              <th class="table table-primary" scope="col" style="width: 30%"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td scope="row" style="text-align: left;"></td>
              <td scope="row"></td>
              <th scope="row"><input type="hidden" class="form-control" name="id" value="<?php echo $tt['idnguoidung']; ?>"></th>
            </tr>
            <tr>
              <td scope="row" rowspan="3">
                <a href="?action=thongtintaikhoan&id=<?php echo $_SESSION['nguoidung']['idnguoidung']; ?>" style="font-weight: bold; font-size: 12pt; text-decoration: none">Cập nhật thông tin</a>
                <p><a href="?action=capnhatmatkhau&id=<?php echo $_SESSION['nguoidung']['idnguoidung']; ?>" style=" text-decoration: none">Cập nhật mật khẩu</a></p>
              </td>
              <td scope="row">Tên đăng nhập</td>
              <th scope="row"><a name="taikhoan"><?php echo $tt['taikhoan']?></a></th>
              <td scope="row" rowspan="4">
                <div class="form-group" style="text-align: center;">
                  <label><b>Ảnh đại diện</b></label><br>
                  <img src="profile/<?php echo $tt['anhdaidien']; ?>" class="w3-round" width="150px">
                  <input type="hidden" class="form-control" name="anhcu" value="<?php echo $tt['anhdaidien']; ?>"><br>
                  <input type="checkbox" id="chkdoianh" name="chkdoianh" value="1"> Đổi ảnh<br>
                </div>
                <div id="file" class="form-group">  
                  <input type="file" name="fhinh">
                </div>
              </td>
            </tr>
            <tr>
              <td scope="row">Tên người dùng</td>
              <th scope="row"><input type="text" class="form-control" name="tennd" value="<?php echo $tt['tennguoidung']; ?>"></th>
            </tr>
            <tr>
              <td scope="row">Địa chỉ</td>
              <th scope="row"><textarea class="form-control" name="diachi" value="" rows="4"><?php echo $tt['diachi']; ?></textarea></th>
            </tr>
            <tr>
              <td scope="row"></td>
              <th scope="row" style="text-align:right; color:red"></th>
              <th scope="row" style="text-align:left">
                <input type="hidden" name="action" value="capnhatthongtin">
                <input type="submit" value="Lưu" class="btn btn-primary">
              </th>
            </tr>
          </tbody>
        </table>
      </div>
    </form>
  </div>
<script>
  $(document).ready(function(){
    $("#file").hide();
    $("#chkdoianh").click(function(){        
      $("#file").toggle(500);
    });
  });
</script>
<?php include("include/footer.php"); ?>