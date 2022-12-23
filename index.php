<?php 
require("model/database.php");
require("model/danhmuc.php");
require("model/baidang.php");
require("model/donhang.php");
require("model/nguoidung.php");
require("model/giohang.php");

$dm = new DANHMUC();
$bd = new BAIDANG();
$dh = new DONHANG();
$gh = new GIOHANG();
$nguoidung = new NGUOIDUNG();
$danhmuc = $dm->laydanhmuc();

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh"; 
}
$tb="";
switch($action){
    case "macdinh": 
        $tongsp=$bd->demtongsobaidang();
        $soluong=6;
        $tongsotrang=ceil($tongsp/$soluong);
        if(!isset($_REQUEST["trang"])) 
            $tranghh=1;
        else
            $tranghh=$_REQUEST["trang"];
        if($tranghh>$tongsotrang)
            $tranghh=$tongsotrang;
        else if($tranghh<1)
            $tranghh=1;
        $batdau=($tranghh-1)*$soluong;
        $bd=$bd->laybaidangphantrang($batdau,$soluong);
        include("main.php");
        break;
    case "xemchitiet": 
        if(isset($_GET["mabaidang"])){
            $mabaidang = $_GET["mabaidang"];
            $ctbd = $bd->laybaidangtheoid($mabaidang);
            $anhbd = $bd->layanhbaidangtheoid($mabaidang);
            include("chitiet.php");
        }
        else
            header("location:index.php");
        break;
    case "dangnhap":
        include("dangnhap.php");
        break;
    case "xldangnhap":
        $taikhoan = $_POST["taikhoan"]; 
        $matkhau = $_POST["matkhau"];
        if($nguoidung->kiemtranguoidung($taikhoan,$matkhau)==TRUE){
            $_SESSION['nguoidung'] = $nguoidung->laythongtinnguoidung($taikhoan);
            echo '<script language="javascript">alert("Đăng nhập thành công!"); window.location="index.php";</script>';
        }
        else{
            echo '<script language="javascript">alert("Tài khoản hoặc mật khẩu không chính xác! Hoặc tài khoản đang tạm khóa."); window.location="dangnhap.php";</script>';
        }
        break;
    case "dangky":
        include("dangky.php");
        break;
    case "xldangky":
        $taikhoan = $_POST["username"];
        $matkhau = $_POST["password"];
        $tennguoidung = $_POST["tennguoidung"];
        $diachi = $_POST["diachi"];
        if($nguoidung->laythongtinnguoidung($taikhoan)){   // Xem có người đăng ký chưa
            echo '<script language="javascript">alert("Tài khoản này đã tồn tại!"); window.location="dangky.php";</script>';
        }
        else{
            if(!$nguoidung->dangky($taikhoan,$matkhau,$tennguoidung,$diachi)){
                echo '<script language="javascript">alert("Có lỗi xảy ra hãy thử lại sau!"); window.location="dangky.php";</script>';
            }
        }
        echo '<script language="javascript">alert("Đăng ký tài khoản thành công!"); window.location="dangnhap.php";</script>';
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        header("location:index.php"); 
        break;
    case "dangtin":
        $danhmuc = $dm->laydanhmuc();
        include("dangtin.php");
        break;
    case "xulydangtin":    
        $gia=$_POST["gia"];
        $lienhe=$_POST["lienhe"];
        $noidung=$_POST["noidung"];
        $mota=$_POST["mota"];
        $danhmuc=$_POST["danhmuc"];
        $idnguoidang=$_POST["idnguoidang"];
        $trangthai=$_POST["trangthai"];
        $soluong=$_POST["soluong"];
        $ngaydang=$_POST["ngaydang"];

        $img_name=$_FILES['anh']['name'];
        $img_size=$_FILES['anh']['size'];
        $tmp_name=$_FILES['anh']['tmp_name'];
        $error=$_FILES['anh']['error'];


        if($error === 0)
        {
            if($img_size > 1250000)
            {
                echo '<script language="javascript">alert("File có dung lượng quá lớn!"); window.location="index.php";</script>';
            }
            else
            {   
                $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);
                $allowed_exs = array("jpg", "jpeg", "png");
                if(in_array($img_ex_lc, $allowed_exs))
                {
                    $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                    $new_upload_path='images/'.$new_img_name;
                    move_uploaded_file($tmp_name,$new_upload_path);
                    $bd->thembaidang($danhmuc,$new_img_name,$noidung,$gia,$lienhe,$idnguoidang,$mota,$trangthai,$soluong,$ngaydang);
                    echo '<script language="javascript">alert("Đăng tin thành công và chờ xét duyệt!"); window.location="index.php";</script>';
                }
                else
                {
                    echo '<script language="javascript">alert("File không đúng định dạng!"); window.location="index.php";</script>';
                }
            }
        }
        else
        {
            echo '<script language="javascript">alert("Lỗi không xác định!"); window.location="index.php";</script>';
        }
        // foreach($_FILES['anhct']['tmp_name'] as $key=>$image)
        // {
        //     $img_ex2=pathinfo($_FILES['anhct']['name'][$key], PATHINFO_EXTENSION);
        //     $img_ex_lc2=strtolower($img_ex2);
        //     $allowed_exs2 = array("jpg", "jpeg", "png");
        //     $tmp_name2=$_FILES['anhct']['tmp_name'][$key];
        //     if(in_array($img_ex_lc2, $allowed_exs2))
        //     {
        //         $new_img_name2=uniqid("IMG-",true).'.'.$img_ex_lc2;
        //         $new_upload_path2='library/'.$new_img_name2;
        //         move_uploaded_file($tmp_name2,$new_upload_path2);
        //         $bd->themanhchitietbaidang($new_img_name2);
        //         echo '<script language="javascript">alert("Đăng tin thành công và chờ xét duyệt!"); window.location="index.php";</script>';
        //     }
        // }
        break;
    case "quantri":
        header("location:admin/index.php");
        break;
    case "timkiem":
        $tukhoa=$_POST['txttukhoa'];
        if(isset($tukhoa)){
            $tk=$bd->timkiem($tukhoa);
            include("timkiem.php");
        }
        else 
            header("location:index.php");
        break;
    case "xemdanhmuc": 
        if(isset($_REQUEST["tendanhmuc"])){
            $tendm = $_REQUEST["tendanhmuc"];  
            // $sanpham = $sp->laysanphamtheodanhmuc($tendm);
            // include("sptheodm.php");
            $tongbd=$bd->demtongsobaidangtheodanhmuc($tendm);
            $soluong=6;
            $tongsotrang=ceil($tongbd/$soluong);
            if(!isset($_REQUEST["trang"])) 
                $trangdm=1;
            else
                $trangdm=$_REQUEST["trang"];
            if($trangdm>$tongsotrang)
                $trangdm=$tongsotrang;
            else if($trangdm<1)
                $trangdm=1;
            $batdau=($trangdm-1)*$soluong;
            $baidang=$bd->laybaidangphantrangtheodanhmuc($tendm,$batdau,$soluong);
            include("baidangtheodm.php");
        }
        else{
            header("location:index.php"); 
        }
        break;
    case "datmua":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        else if(isset($_GET["id"])){
            $id = $_GET["id"];
            // lấy thông tin chi tiết mặt hàng
            $bd = $bd->laybaidangtheoid($id);
            include("datmua.php");
        }
        else{
            header("location:index.php"); 
        }   
        break;
    case "xulydatmua":
        $idbaidang=$_POST["idbd"];
        $giabaidang=$_POST["giabd"];
        $tennguoimua=$_POST["tennm"];
        $idnguoimua=$_POST["idnguoimua"];
        $idnguoiban=$_POST["idnguoidang"];
        $diachi=$_POST["diachi"];
        $sodienthoai=$_POST["sodienthoai"];
        $soluong=$_POST["soluong"];
        $ngaydat=$_POST["ngaydat"];
        $tongtien=($_POST["giabd"])*($_POST["soluong"]);
        $dh->dathang($idbaidang,$idnguoiban,$idnguoimua,$tennguoimua,$giabaidang,$diachi,$sodienthoai,$soluong,$ngaydat,$tongtien);
        echo '<script language="javascript">alert("Đặt mua thành công và chờ người bán xác nhận!"); window.location="index.php";</script>';
        break;
    case "themvaogio":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        else{
            $idsanpham=$_REQUEST['id'];
            $idnguoidung=$_SESSION['nguoidung']['idnguoidung'];
            if($gh->ktragiohang($idsanpham, $idnguoidung)){  // Ktra hàng đã có trong giỏ chưa
                echo '<script language="javascript">alert("Sản phẩm này đã có trong giỏ hàng rồi!"); window.location="index.php";</script>';
            }
            else{
                if(!$gh->chovaogio($idsanpham, $idnguoidung)){
                    echo '<script language="javascript">alert("Có lỗi xảy ra hãy thử lại sau!"); window.location="index.php";</script>';
                }
            }
            echo '<script language="javascript">alert("Thêm vào giỏ hàng thành công!"); window.location="index.php";</script>';
        }
        break;
    case "xoakhoigio":
        $id = $_REQUEST["id"];
        $gh->xoakhoigio($id);
        echo '<script language="javascript">alert("Xóa khỏi giỏ hàng thành công!"); window.location="index.php";</script>';
        break;
    case "giohangcuatoi":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        else if(isset($_REQUEST["id"])){
            $idnguoidung=$_REQUEST["id"];
            $baidang=$bd->laybaidang();
            $tonggh=$gh->demtongsobaitronggio($idnguoidung);
            $soluong=6;
            $tongsotrang=ceil($tonggh/$soluong);
            if(!isset($_REQUEST["trang"])) 
                $tranggh=1;
            else
                $tranggh=$_REQUEST["trang"];
            if($tranggh>$tongsotrang)
                $tranggh=$tongsotrang;
            else if($tranggh<1)
                $tranggh=1;
            $batdau=($tranggh-1)*$soluong;
            $giohang=$gh->laygiohangphantrang($idnguoidung,$batdau,$soluong);
            include("giohang.php");
            break;
        }
        else{
            header("location:index.php"); 
        }   
        break;
    case "dsbaidang":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        else if(isset($_REQUEST["id"])){
            $idnguoidung=$_REQUEST["id"];
            $tongsp=$bd->demtongsobaidangcuatoi($idnguoidung);
            $soluong=6;
            $tongsotrang=ceil($tongsp/$soluong);
            if(!isset($_REQUEST["trang"])) 
                $tranghh=1;
            else
                $tranghh=$_REQUEST["trang"];
            if($tranghh>$tongsotrang)
                $tranghh=$tongsotrang;
            else if($tranghh<1)
                $tranghh=1;
            $batdau=($tranghh-1)*$soluong;
            $baidang=$bd->laybaidangphantrangcuatoi($idnguoidung,$batdau,$soluong);
            include("dsbaidang.php");
            break;
        }
        else{
            header("location:index.php"); 
        }
        break;
    case "xemchitiet_bd_cuatoi": 
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        else if(isset($_GET["mabaidang"])){
            $mabaidang = $_GET["mabaidang"];
            $ctbd = $bd->laybaidangtheoid($mabaidang);
            $anhbd = $bd->layanhbaidangtheoid($mabaidang);
            include("chitiet_bd_cuatoi.php");
        }
        else
            header("location:index.php");
        break;
    case "xoa":
        if(isset($_GET["id"])){
            $bd->xoabaidang($_GET["id"]);
        }
        header("location:index.php"); 
        break;  
    case "capnhat":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        if(isset($_GET["id"])){
            $mabaidang = $_GET["id"];
            $danhmuc = $dm->laydanhmuc(); 
            $ctbd = $bd->laybaidangtheoid($mabaidang);
            $anhbd = $bd->layanhbaidangtheoid($mabaidang);
            include("capnhat.php");
        }
        else
            header("location:index.php");
        break;
    case "xulycapnhat":
        $id = $_POST["id"];
        $danhmuc = $_POST["danhmuc"];
        $gia = $_POST["gia"];
        $soluong = $_POST["soluong"];
        $lienhe = $_POST["lienhe"];
        $mota = $_POST["mota"];
        $noidung = $_POST["noidung"];
        $hinhanh = $_POST["anhcu"];

        if($_FILES["filehinhanh"]["name"]!=""){
            $img_name=$_FILES['filehinhanh']['name'];
            $img_size=$_FILES['filehinhanh']['size'];
            $tmp_name=$_FILES['filehinhanh']['tmp_name'];
            $error=$_FILES['filehinhanh']['error'];

            if($error === 0)
            {
                if($img_size > 1250000)
                {
                    echo '<script language="javascript">alert("File có dung lượng quá lớn!"); window.location="index.php";</script>';
                }
                else
                {   
                    $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc=strtolower($img_ex);
                    $allowed_exs = array("jpg", "jpeg", "png");
                    if(in_array($img_ex_lc, $allowed_exs))
                    {
                        $hinhanh=uniqid("IMG-",true).'.'.$img_ex_lc;
                        $new_upload_path='images/'.$hinhanh;
                        move_uploaded_file($tmp_name,$new_upload_path);
                        // $bd->suabaidang($id,$danhmuc,$gia,$soluong,$lienhe,$mota,$noidung,$new_img_name);
                    }
                    else
                    {
                        echo '<script language="javascript">alert("File không đúng định dạng!"); window.location="index.php";</script>';
                    }
                }
            }
            else
            {
                echo '<script language="javascript">alert("Lỗi không xác định!"); window.location="index.php";</script>';
            }
        }
        $bd->suabaidang($id,$danhmuc,$gia,$soluong,$lienhe,$mota,$noidung,$hinhanh);
        echo '<script language="javascript">alert("Cập nhật bài đăng thành công!"); window.location="index.php";</script>';
        break;
    case "capnhatanh":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        if(isset($_GET["id"])){
            $mabaidang = $_GET["id"];
            $danhmuc = $dm->laydanhmuc(); 
            $ctbd = $bd->laybaidangtheoid($mabaidang);
            $anhbd = $bd->layanhbaidangtheoid($mabaidang);
            include("capnhatanh.php");
        }
        else
            header("location:index.php");
        break;
    case "xulycapnhatanh":
        $id = $_POST["id"];
        $bd->xoaanhbaidang($id);
        foreach($_FILES['filehinhanhct']['tmp_name'] as $key=>$image)
        {
            $img_size=$_FILES['filehinhanhct']['name'][$key];
            if($img_size > 1250000)
            {
                echo '<script language="javascript">alert("File có dung lượng quá lớn!"); window.location="index.php";</script>';
            }
            else
            {   

                $img_ex=pathinfo($_FILES['filehinhanhct']['name'][$key], PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);
                $allowed_exs= array("jpg", "jpeg", "png");
                $tmp_name=$_FILES['filehinhanhct']['tmp_name'][$key];
                if(in_array($img_ex_lc, $allowed_exs))
                {   
                    $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                    $new_upload_path='library/'.$new_img_name;
                    move_uploaded_file($tmp_name,$new_upload_path);
                    $bd->themanhchitietbaidang($id,$new_img_name);
                }
                else
                {
                    echo '<script language="javascript">alert("File không đúng định dạng!"); window.location="index.php";</script>';
                }
            }
        }
        echo '<script language="javascript">alert("Cập nhật ảnh bài đăng thành công!"); window.location="index.php";</script>';
        break;
    case "themanh":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        if(isset($_GET["id"])){
            $mabaidang = $_GET["id"];
            $ctbd = $bd->laybaidangtheoid($mabaidang);
            include("themanh.php");
        }
        else
            header("location:index.php");
        break;
    case "xulythemanh":
        $id = $_POST["id"];
        foreach($_FILES['filehinhanhct']['tmp_name'] as $key=>$image)
        {
            $img_size=$_FILES['filehinhanhct']['name'][$key];
            if($img_size > 1250000)
            {
                echo '<script language="javascript">alert("File có dung lượng quá lớn!"); window.location="index.php";</script>';
            }
            else
            {   

                $img_ex=pathinfo($_FILES['filehinhanhct']['name'][$key], PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);
                $allowed_exs= array("jpg", "jpeg", "png");
                $tmp_name=$_FILES['filehinhanhct']['tmp_name'][$key];
                if(in_array($img_ex_lc, $allowed_exs))
                {   
                    $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                    $new_upload_path='library/'.$new_img_name;
                    move_uploaded_file($tmp_name,$new_upload_path);
                    $bd->themanhchitietbaidang($id,$new_img_name);
                }
                else
                {
                    echo '<script language="javascript">alert("File không đúng định dạng!"); window.location="index.php";</script>';
                }
            }
        }
        echo '<script language="javascript">alert("Thêm ảnh bài đăng thành công!"); window.location="index.php";</script>';
        break;
    case "dsdoncanxacnhan":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $tongdh=$dh->demtongsodonhang($id);
            $soluong=6;
            $tongsotrang=ceil($tongdh/$soluong);
            if(!isset($_REQUEST["trang"])) 
                $tranghh=1;
            else
                $tranghh=$_REQUEST["trang"];
            if($tranghh>$tongsotrang)
                $tranghh=$tongsotrang;
            else if($tranghh<1)
                $tranghh=1;
            $batdau=($tranghh-1)*$soluong;
            $danhsach=$dh->laydonhangphantrang($id,$batdau,$soluong);
            include("dsdoncanxacnhan.php");
        }
        else
            header("location:index.php");
        break;
    case "chapnhan":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $donhang=$dh->laydonhangtheoid($id);
            include("chapnhan.php");
        }
        else
            header("location:index.php");
        break;
    case "xulychapnhan":
        $id=$_POST["id"];
        $idbaidang=$_POST["id_baidang"];
        $slton=$_POST["soluongton"];
        $sldat=$_POST["soluongdat"];
        $ngayxacnhan=$_POST["ngayxacnhan"];

        if($slton<$sldat){
            echo '<script language="javascript">alert("Số lượng không đủ để đáp ứng. Xác nhận thất bại!");window.location="index.php";</script>';
        }
        else{
            $dh->chapnhan($id, $ngayxacnhan);
            $bd->capnhatsl($idbaidang,$sldat);
            echo '<script language="javascript">alert("Chấp nhận đơn hàng thành công!");window.location="index.php";</script>';
        }
        break;
    case "huybo":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $donhang=$dh->laydonhangtheoid($id);
            include("huybo.php");
        }
        else
            header("location:index.php");
        break;
    case "xulyhuybo":
        $id=$_POST["id"];
        $ghichu=$_POST['ghichu'];
        $ngayxacnhan=$_POST["ngayxacnhan"];

        $dh->tuchoi($id, $ngayxacnhan, $ghichu);
        echo '<script language="javascript">alert("Từ chối đơn hàng thành công!");window.location="index.php";</script>';
        break;
    case "donhangcuatoi":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $baidang=$bd->laybaidang();
            $tongdh=$dh->demtongsodonhangcuatoi($id);
            $soluong=6;
            $tongsotrang=ceil($tongdh/$soluong);
            if(!isset($_REQUEST["trang"])) 
                $tranghh=1;
            else
                $tranghh=$_REQUEST["trang"];
            if($tranghh>$tongsotrang)
                $tranghh=$tongsotrang;
            else if($tranghh<1)
                $tranghh=1;
            $batdau=($tranghh-1)*$soluong;
            $danhsach=$dh->laydonhangphantrangcuatoi($id,$batdau,$soluong);
            include("donhangcuatoi.php");
        }
        else
            header("location:index.php");
        break;
    case "chitietdonhang":
        $id=$_GET['id'];
        $baidang=$bd->laybaidang();
        $donhang=$dh->laydonhangtheoid($id);
        include("chitietdonhang.php");
        break;
    case "huydonhang":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        if(isset($_GET["id"])){
            $id=$_GET["id"];

            $dh->huy($id);
            echo '<script language="javascript">alert("Hủy đơn hàng thành công!");window.location="index.php";</script>';
        }
        else
            header("location:index.php");
        break;
    case "xulycapnhatdonhang":
        $id=$_POST["iddon"];
        $soluong=($_POST["soluong"]);
        $tongtien=($_POST["soluong"])*($_POST["giabai"]);

        $dh->capnhatdonhang($id, $soluong, $tongtien);
        echo '<script language="javascript">alert("Cập nhật đơn hàng thành công!");window.location="index.php";</script>';
        break;
    case "thongtintaikhoan":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            $tt=$nguoidung->laythongtinnguoidungtheoid($id);
            include("thongtintaikhoan.php");
        }
        else
            header("location:index.php");
        break;
    case "capnhatthongtin":
        $id=$_POST["id"];
        $tennd=$_POST["tennd"];
        $diachi=$_POST["diachi"];
        $anhdaidien=$_POST["anhcu"];

        if(isset($_FILES['fhinh']['name']) AND !empty($_FILES['fhinh']['name'])){
        $img_name=$_FILES['fhinh']['name'];
        $img_size=$_FILES['fhinh']['size'];
        $tmp_name=$_FILES['fhinh']['tmp_name'];
        $error=$_FILES['fhinh']['error'];

        if($error === 0)
        {
            if($img_size > 125000)
            {
                echo '<script language="javascript">alert("File có dung lượng quá lớn!"); window.location="index.php";</script>';
            }
            else
            {   
                $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc=strtolower($img_ex);
                $allowed_exs = array("jpg", "jpeg", "png");
                if(in_array($img_ex_lc, $allowed_exs))
                {
                    $new_img_name=uniqid("IMG-",true).'.'.$img_ex_lc;
                    $new_upload_path='profile/'.$new_img_name;
                    $nguoidung->capnhatthongtin($id,$tennd,$diachi,$new_img_name);
                    move_uploaded_file($tmp_name,$new_upload_path);
                    echo '<script language="javascript">alert("Cập nhật thông tin thành công!"); window.location="index.php";</script>';
                }
                else
                {
                    echo '<script language="javascript">alert("File không đúng định dạng!"); window.location="index.php";</script>';
                }
            }
        }
        else
        {
            echo '<script language="javascript">alert("Lỗi không xác định!"); window.location="index.php";</script>';
        }
    }
    else
    {
        $nguoidung->capnhatthongtin($id,$tennd,$diachi,$anhdaidien);
        echo '<script language="javascript">alert("Cập nhật thông tin thành công!"); window.location="index.php";</script>';
    }
        break;
    case "capnhatmatkhau":
        if(!isset($_SESSION['nguoidung']['taikhoan'])){
            echo '<script language="javascript">alert("Vui lòng đăng nhập!"); window.location="dangnhap.php";</script>';
        }
        if(isset($_GET["id"])){
            $id=$_GET["id"];
            $tt=$nguoidung->laythongtinnguoidungtheoid($id);
            include("capnhatmatkhau.php");
        }
        else
            header("location:index.php");
        break;
    case "xulycapnhatmatkhau":
        $taikhoan=$_POST["tk"];
        $matkhau=$_POST["mk"];
        $mkmoi=$_POST["mkmoi"];

        if($nguoidung->kiemtranguoidung($taikhoan,$matkhau)==TRUE){
            $nguoidung->capnhatmatkhau($mkmoi,$taikhoan);
            echo '<script language="javascript">alert("Cập nhật mật khẩu thành công!"); window.location="index.php";</script>';
        }
        else{
            echo '<script language="javascript">alert("Tài khoản hoặc mật khẩu không chính xác."); window.location="index.php";</script>';
        }
        break;
    default:
        break;
}
?>