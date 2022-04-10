<?php
session_start();
if(!isset($_SESSION['userId'])){
    $_SESSION['error_submit_login'] = 'Vui lòng đăng nhập tài khoản';
    header('location: http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/login.php');
}
//lay du lieu
$id = $_GET['id'];
//luu du lieu
//mo ket noi
$conn = new mysqli('localhost', 'root', '', 'quanlydathang');
//kiem tra ket noi
if ($conn->connect_error) {
    $_SESSION['error_submit_staff'] = 'Kết nối tới cơ sở dữ liệu không thành công';
    die();
}
$sql = "DELETE FROM `hinhHH` WHERE MSHH=$id";
$result = $conn->query($sql);

$sql = "DELETE FROM `hanghoa` WHERE MSHH=$id";
$result = $conn->query($sql);
//giai phong du lieu
unset($_POST['submit'], $_POST['tenHH'], $_POST['motaHH'], $_POST['giaHH'], $_POST['soluongHH'], $_POST['ghichu'] );
//chuyen huong
if (isset($result)) {
    $_SESSION['success'] = 'Xóa sản phẩm thành công';
    header('location: http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/listproduct.php');
    die();
} else {
    $_SESSION['error_submit_staff'] = 'Xóa dữ liệu không thành công';
    die();
}
?>