<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title>Web mua bán, rao vặt 490</title>
	<script src="../../js/function.js"></script>
	<link rel="stylesheet" href="../../css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body onload="setDay()">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-info" >
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php"><img src='../../hinhanh/banner.jpg' width='170px' height='35px'></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="../index.php">Trang chủ</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="#">Tìm kiếm</a>
						</li>	
					</ul>
					<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
						<?php if(!isset($_SESSION['nguoidung']['taikhoan'])){ ?>
							<li class="nav-item">
								<a class="nav-link" href="?action=dangnhap">Đăng nhập</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="?action=dangky">Đăng ký</a>
							</li>
						<?php }else{ ?>
							<li class="nav-item">
								<a class="nav-link" href="../../?action=dangtin">Đăng tin</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="../../?action=giohangcuatoi&id=<?php echo $_SESSION['nguoidung']['idnguoidung'] ?>">Giỏ hàng</a>
							</li>
							<?php if(($_SESSION['nguoidung']['quyen'])=="user"){ ?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<?php echo $_SESSION['nguoidung']['tennguoidung'] ?>
									</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#capnhattt">Cập nhật thông tin</a></li>
										<li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#capnhatmk">Cập nhật mật khẩu</a></li>
										<li><a class="dropdown-item" href="?action=donhangcuatoi&id=<?php echo $_SESSION['nguoidung']['idnguoidung'] ?>">Đơn hàng của tôi</a></li>
										<li><hr class="dropdown-divider"></li>
										<li><a class="dropdown-item" href="?action=dangxuat">Đăng xuất</a></li>
									</ul>
								</li>
							<?php }else{ ?>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										<?php echo $_SESSION['nguoidung']['tennguoidung'] ?>
									</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="../ktnguoidung/index.php?action=vetrangchu">Về trang chủ</a></li>
									</ul>
								</li>
							<?php } } ?>
						</ul>
					</div>
				</nav>