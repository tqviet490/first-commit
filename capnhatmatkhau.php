<?php include("include/navbar.php"); ?>
<div class="card mt-3">
  <div class="card-header">Thông tin tài khoản của tôi</a></div>
  <form action="index.php" method="post" onsubmit="if(mkmoi.value != mkxn.value){alert('Mật khẩu và mật khẩu xác nhận không khớp!'); return false;}">
    <div class="thongtin">
      <table class="table" style="width:100%">
        <thead>
          <tr>
            <th class="table table-primary" scope="col" style="width:20%"></th>
            <th class="table table-primary" scope="col" style="width:20%"></th>
            <th class="table table-primary" scope="col" style="width:60%"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"></th>
            <th scope="row"></th>
            <th scope="row"><input type="hidden" class="form-control" name="tk" value="<?php echo $tt['taikhoan']; ?>"></th>
          </tr>
          <tr>
            <td scope="row" rowspan="3">
              <a href="?action=thongtintaikhoan&id=<?php echo $_SESSION['nguoidung']['idnguoidung']; ?>" style="text-decoration: none">Cập nhật thông tin</a>
              <p><a href="?action=capnhatmatkhau&id=<?php echo $_SESSION['nguoidung']['idnguoidung']; ?>" style="font-weight: bold; font-size: 12pt; text-decoration: none">Cập nhật mật khẩu</a></p>
            </td>
            <td scope="row" style="text-align:left">Mật khẩu cũ:</td>
            <th scope="row"><input type="password" class="form-control" name="mk" value="" required>
            </th>
          </tr>
          <tr>
            <td scope="row" style="text-align:left">Mật khẩu mới:</td>
            <th scope="row"><input type="password" class="form-control" name="mkmoi" value="" minlength="6" required>
            </th>
          </tr>
          <tr>
            <td scope="row" style="text-align:left">Xác nhận mật khẩu:</td>
            <th scope="row"><input type="password" class="form-control" id="mkxn" name="mkxn" value="" required>
            </th>
          </tr>
          <tr>
            <th scope="row"></th>
            <th scope="row" style="text-align:right; color:red"></th>
            <th scope="row" style="text-align:left">
              <input type="hidden" name="action" value="xulycapnhatmatkhau">
              <input type="submit" value="Cập nhật" class="btn btn-primary">
            </th>
          </tr>
        </tbody>
      </table>
    </div>
  </form>
</div>
<?php include("include/footer.php"); ?>