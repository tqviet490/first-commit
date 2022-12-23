<?php 
if(!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh"; 
}

$nguoidung = new NGUOIDUNG();

switch($action){
    case "macdinh":   
        $nguoidung = $nguoidung->laydanhsach();     
        include("main.php");
        break;
    case "them":
        $taikhoan = $_POST["txttaikhoan"];
        $matkhau = $_POST["txtmatkhau"];
        $tennguoidung = $_POST["txttennguoidung"];
        $diachi = $_POST["txtdiachi"];
        $quyen = $_POST["optloaind"];
        if($nguoidung->laythongtinnguoidung($taikhoan)){ 
            echo '<script language="javascript">alert("Tài khoản này đã được đăng ký!"); window.location="../qlnguoidung";</script>';
        }
        else{
            if(!$nguoidung->themtaikhoan($taikhoan,$matkhau,$tennguoidung,$diachi,$quyen)){
                echo '<script language="javascript">alert("Có lỗi xảy ra hãy thử lại sau!"); window.location="../qlnguoidung";</script>';
            }
        }
        $nguoidung = $nguoidung->laydanhsach();
        echo '<script language="javascript">alert("Thêm tài khoản thành công!"); window.location="../qlnguoidung";</script>';    
        break;
    case "sua":
        if(isset($_GET["id"])){ 
            $nguoidung = $nguoidung->laythongtinnguoidungtheoid($_GET["id"]);
            include("updateform.php");
        }
        else{
            $nguoidung = $nguoidung->laydanhsach(); 
            header("location:../qlnguoidung");   
        }
        break;
    case "xulysua":
        $taikhoan = $_POST["txttaikhoan"];
        $quyen = $_POST["optquyen"];

        $nguoidung->capnhatquyen($taikhoan,$quyen);    

        $nguoidung = $nguoidung->laydanhsach();
        echo '<script language="javascript">alert("Cập nhật quyền tài khoản thành công!"); window.location="../qlnguoidung";</script>';
        break;
    case "khoa":   
        $id = $_GET["id"];
        $trangthai = $_GET["trangthai"];
        if(!$nguoidung->doitrangthai($id, $trangthai)){
            echo '<script language="javascript">alert("Có lỗi xảy ra hãy thử lại sau!"); window.location="../qlnguoidung";</script>';
        }
        echo '<script language="javascript">alert("Cập nhật trạng thái tài khoản thành công!"); window.location="../qlnguoidung";</script>';
        $nguoidung = $nguoidung->laydanhsach();    
        break;
    case "xoa":
        if(isset($_GET["id"])){
            $nguoidung->xoataikhoan($_GET["id"]);
            echo '<script language="javascript">alert("Xóa tài khoản thành công!"); window.location="../qlnguoidung";</script>';
            $nguoidung = $nguoidung->laydanhsach();
            header("location:../qlnguoidung"); 
        }
        break;
    default:
        break;
}
?>
