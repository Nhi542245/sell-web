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
$sql = "DELETE FROM `nhanvien` WHERE MSNV=$id";

$result = $conn->query($sql);
//giai phong du lieu
unset($_POST['submit'], $_POST['TenNV'], $_POST['passwordNV'], $_POST['chucvuNV'], $_POST['diachiNV'], $_POST['sdtNV'] );
//chuyen huong
if (isset($result)) {
    $_SESSION['success'] = 'Xóa nhân viên thành công';
    header('location: http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/liststaff.php');
    die();
} else {
    $_SESSION['error_submit_staff'] = 'Xóa dữ liệu không thành công';
    die();
}
?>