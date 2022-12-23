<?php 
require("../../model/database.php");
require("../../model/nguoidung.php");

// Biến cho biết ng dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
elseif($isLogin == FALSE || ($_SESSION["nguoidung"]['quyen'])=='user'){
    $action = "vetrangchu";
}
else{
    $action="macdinh"; 
}

$nguoidung = new NGUOIDUNG();
$tb = "";
switch($action){
    case "macdinh":   
        include("main.php");
        break;
    case "vetrangchu": 
        header("location:../../index.php");
    default:
        break;
}
?>
