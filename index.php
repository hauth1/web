﻿<?php
	if(!isset($_SESSION)) 
    { 
        session_start();
    } 
	
	include_once "cauhinh.php";
	
	include_once "thuvien.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>PETSHOP</title>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	
		<script type="text/javascript" src="scripts/jquery-1.4.1.js"></script>
		<script type="text/javascript" src="scripts/basic.js"></script>
		
		<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="scripts/ckfinder/ckfinder.js"></script>
		
		
		
	</head>
	<body onload="htGio()">
		<div id="TrangWeb">
			<div id="PhanDau">
				
			</div>
			<div id="PhanMenu1">
				<a class = "menu" href="index.php?do=home">Trang chủ</a>  
			</div>
			<div id="PhanMenu2"></div>
			
			<div id="PhanMenu3">
				<form action="index.php?do=search_xuly" method="post">
					Tìm kiếm: <input type="text" name="search" />
					<input type="submit" name="ok" value="search" />
				</form>
			</div>
			<div id="PhanGiua">
				<div id="BenTrai">
				<h3>Nước xuất xứ</h3>
					
					<?php

						$sql = "select * from `tbl_xuatxu` WHERE 1";
						$danhsach = $connect->query($sql);
						//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
						if (!$danhsach) {
							die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
							exit();
						}
						
					?>
					<div id="menudung">
					  <ul>						
						
							<?php
							
								while ($row = $danhsach->fetch_array(MYSQLI_ASSOC)) 
								{
    								echo "<li><a href='index.php?do=sanpham_nhasanxuat&id_nsx=" . $row['IdNuocXuatXu'] . "'>" . $row['NuocXuatXu'] . "</a></li>";   
  								}
							?>  
						  
					   </ul>
						
					</div>	
					
					
				
				
					<h3>Chức năng khác</h3>
					<ul>
						<li>...........</li>
						<li>...........</li>
					</ul>
					
								
					
					
					
				</div>	
				
				<div id="Giua">
					<table border="0" cellspacing="0" width="750" align="center" valign="top">
						<tr>
							<td>
								<?php include 'jquery.php'; ?>
							</td>
						</tr>
					</table>
				
				
					<?php
						$do = isset($_GET['do']) ? $_GET['do'] : "home";
						
						include $do . ".php";
					?>
					
					
				</div>
				
			<div id="PhanCuoi">
				<table>
					<tr>
						<td>
							<p>Giới thiệu công ty &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Chính sách bảo mật &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hệ thống cửa hàng 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tin tuyển dụng </p>
				
							<p>Quy chế hoạt động &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hướng dẫn mua online &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hệ thống bảo hành 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hướng dẫn mua trả góp </p>
				
							<p>Chính sách đổi trả &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phản hồi khách hàng Chính sách trả góp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
							Câu hỏi thường gặp mua hàng</p>
			
						</td>
						<td >
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/thanhtoan.jpg" />
						</td>
					</tr>
				</table>
				
			</div>
		</div>
	</body>
</html>