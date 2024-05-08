<?php
	$IdSanPham = $_GET['id_sp'];
	
	$sql = "SELECT *
			FROM tbl_sanpham A, tbl_xuatxu B
			WHERE A.IdNuocXuatXu = B.IdNuocXuatXu AND A.IdSanPham = $IdSanPham";
	
	$danhsach = $connect->query($sql);
	//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
	if (!$danhsach) {
		die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
		exit();
	}
	
	$dong = $danhsach->fetch_array(MYSQLI_ASSOC);
	
	// Tăng lượt xem
	$sql = "UPDATE tbl_sanpham SET LuotXem = LuotXem + 1 WHERE IdSanPham = $IdSanPham";
	$truyvan_luotxem = $connect->query($sql);
	
	
	$giaban = $dong['DonGia'] - (($dong['TiLeGiamGia'] /100) * $dong['DonGia']);
	
?>
<table>
	<tr> 
		<td>
			<h3><?php echo $dong['TenSanPham']; ?></h3>
			<p class="TomTat">Nước xuất xứ: <?php echo $dong['NuocXuatXu']; ?></p>
			<p class="TomTat">Giá gốc:<span class="dongia"><?php echo number_format($dong['DonGia']); ?> đ</span></p>
			<p class="TomTat">Giá bán: <span class="giaban"><?php echo number_format($giaban); ?> đ</p>
			<p class="TomTat">Số lượng: <?php echo $dong['SoLuong']; ?></p>
			<p class="TomTat">Tỉ lệ giảm giá: <?php echo $dong['TiLeGiamGia']; ?></p>
			<p><?php echo    "<img width=\"400\" src=" . $dong["HinhAnh"] . ">"; ?></p>			
		</td>
		<td>
			<img src="images/muangay.jpg" />
		</td>
	</tr>
</table>

<p>..................................................................................................</p>
<h3>Giống chó cùng nước xuất xứ</h3>
<?php  
	
	include "sanpham_nhasanxuat.php";
?>