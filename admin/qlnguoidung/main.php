<?php include("../include/navbar.php"); ?>
<div>
  <h3>Quản lý người dùng</h3>
  <!-- Nút mở hộp modal chứa form thêm mới -->
  <div><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#themnguoidung">Thêm người dùng</a></div>

  <br>

  <!-- Danh sách người dùng -->
  <table class="table table-hover">
    <tr>
      <th>Tài khoản</th>
      <th>Họ tên</th>
      <th>Địa chỉ</th>
      <th>Quyền</th>
      <th>Ảnh đại diện</th>
      <th>Sửa</th>
      <th>Xóa</th>
      <th>Khóa</th>
    </tr>
    <?php foreach ($nguoidung as $nd): ?>
      <tr><td><?php echo $nd["taikhoan"]; ?></td>
       <td><?php echo $nd["tennguoidung"]; ?></td>
       <td><?php echo $nd["diachi"]; ?></td>
       <td><?php echo $nd["quyen"]; ?></td>
       <td><img src="../../profile/<?php echo $nd["anhdaidien"]; ?>" style="width: 50px;"></td>
       <td><a class="btn btn-warning" href="?action=sua&id=<?php echo $nd["idnguoidung"]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
       <td><a class="btn btn-danger" href="?action=xoa&id=<?php echo $nd["idnguoidung"]; ?>" onclick="return confirm('Bạn có chắc muốn xóa tài khoản này không?')"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
       <?php if($nd["trangthaitk"]==1){ ?>
         <td><a class="btn btn-info" href="?action=khoa&trangthai=0&id=<?php echo $nd["idnguoidung"]; ?>" onclick="return confirm('Bạn có chắc muốn khóa tài khoản này không?')"><i class="fa fa-unlock" aria-hidden="true"></i></a></td>
       <?php }else{ ?>
        <td><a class="btn btn-danger" href="?action=khoa&trangthai=1&id=<?php echo $nd["idnguoidung"]; ?>" onclick="return confirm('Bạn có chắc muốn mở khóa tài khoản này không?')"><i class="fa fa-ban" aria-hidden="true"></i></a></td>
        <?php 
      }
    endforeach; ?>
  </table>


  <!-- Hộp modal chứa form thêm mới -->
  <div class="modal fade" id="fthemnguoidung" role="dialog">
    <div class="modal-dialog">    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thêm nhân viên</h4>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="form-group">        
              <input class="form-control" type="text" name="txttaikhoan" placeholder="Tài khoản" required>
            </div>
            <div class="form-group">
              <input class="form-control"  type="text" name="txtmatkhau" placeholder="Mật khẩu" required>
            </div>
            <div class="form-group">
              <input class="form-control"  type="text" name="txttennguoidung" placeholder="Họ tên" required>
            </div>
            <div class="form-group">        
              <input class="form-control" type="number" name="txtdienthoai" placeholder="Số điện thoại" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="3" name="txtdiachi"></textarea> 
            </div>
            <div class="form-group">
              <label>Chọn quyền</label>
              <select class="form-control" name="optloaind">                
                <option value="admin">Quản trị</option>
                <option value="nhanvien" selected>Nhân viên</option>
                <option value="user">Khách hàng</option>
              </select></div>
              <div class="form-group">
                <input type="hidden" name="action" value="them" >
                <input class="btn btn-primary"  type="submit" value="Thêm">
                <input class="btn btn-warning"  type="reset" value="Hủy"></div>
              </form>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
          </div>

        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="themnguoidung" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm người dùng</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post">
                <div class="m-3">        
                  <input class="form-control" type="text" name="txttaikhoan" placeholder="Tài khoản" required>
                </div>
                <div class="m-3">
                  <input class="form-control"  type="text" name="txtmatkhau" placeholder="Mật khẩu" required>
                </div>
                <div class="m-3">
                  <input class="form-control"  type="text" name="txttennguoidung" placeholder="Họ tên" required>
                </div>
                <div class="m-3">
                  <textarea class="form-control" rows="3" name="txtdiachi"></textarea> 
                </div>
                <div class="m-3">
                  <label>Chọn quyền</label>
                  <select class="form-control" name="optloaind">                
                    <option value="admin">Quản trị</option>
                    <option value="user">Khách hàng</option>
                  </select></div>
                  <div class="m-3">
                    <input type="hidden" name="action" value="them" >
                    <input class="btn btn-primary"  type="submit" value="Thêm">
                    <input class="btn btn-warning"  type="reset" value="Hủy"></div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <?php include("../include/footer.php"); ?>
