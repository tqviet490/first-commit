<?php 
if(!isset($_SESSION["nguoidung"])){
    header("location:../index.php");
}
require("../../model/database.php");
require("../../model/danhmuc.php");
require("../../model/baidang.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$dm = new DANHMUC();
$bd = new BAIDANG();

switch($action){
    case "xem":
        $tongmh=$bd->demtongsobaidangchuaduyet();
        $soluong=6;
        $tongsotrang=ceil($tongmh/$soluong);
        if(!isset($_REQUEST["trang"])) 
            $tranghh=1;
        else
            $tranghh=$_REQUEST["trang"];
        if($tranghh>$tongsotrang)
            $tranghh=$tongsotrang;
        else if($tranghh<1)
            $tranghh=1;
        $batdau=($tranghh-1)*$soluong;
        $baidang=$bd->laybaidangphantrangchuaduyet($batdau,$soluong);
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
    case "xemchitietdaduyet": 
        if(isset($_GET["mabaidang"])){
            $mabaidang = $_GET["mabaidang"];
            $ctbd = $bd->laybaidangtheoid($mabaidang);
            $anhbd = $bd->layanhbaidangtheoid($mabaidang);
            include("chitietdaduyet.php");
        }
        else
            header("location:index.php");
        break;
	case "xoa":
		if(isset($_GET["id"])){
			$bd->xoabaidang($_GET["id"]);
        }
		header("location:../qlbaidang"); 
		break;	
    case "duyet":
        if(isset($_GET["id"])){ 
            $bd->duyetbai($_GET["id"]);
            echo '<script language="javascript">alert("Duyệt bài thành công!"); window.location="../qlbaidang";</script>';
        }
        else{
            header("location:../qlbaidang");            
        }
        break;
    case "dsdaduyet":
        $tongsp=$bd->demtongsobaidang();
        $soluong=6;
        $tongsotrang=ceil($tongsp/$soluong);
        if(!isset($_REQUEST["page"])) 
            $page=1;
        else
            $page=$_REQUEST["page"];
        if($page>$tongsotrang)
            $page=$tongsotrang;
        else if($page<1)
            $page=1;
        $batdau=($page-1)*$soluong;
        $bd=$bd->laybaidangphantrang($batdau,$soluong);
        include("dsdaduyet.php");
        break;
    default:
        break;
}
?>
