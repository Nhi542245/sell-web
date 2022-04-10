<?php
include("./layout/header.php");
include("./layout/slider.php");
if(!isset($_SESSION['userId'])){
    $_SESSION['error_submit_login'] = 'Vui lòng đăng nhập tài khoản';
    header('location: http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/login.php');
}
?>

<div class="admin-content-right">
    <div class="container">
        <h1>Thêm Nhân viên</h1>
        <form action="" method="POST">
            <input  class="input" name="TenNV" type="text" placeholder="Nhập họ tên nhân viên">
            <input  class="input" name="passwordNV" type="password" placeholder="Nhập password">
            <input  class="input" name="chucvuNV" type="text" placeholder="Nhập chức vụ">
            <input  class="input" name="diachiNV" type="text" placeholder="Nhập địa chỉ">
            <input  class="input" name="sdtNV" type="text" placeholder="Nhập số điện thoại">
            <?php
            if (isset($_SESSION['error_submit_staff'])) {
                echo "<p class='text-error'>".$_SESSION['error_submit_staff']."</p>";
                unset($_SESSION['error_submit_staff']);
            }
            ?>
            <input type="submit" name="submit" class='button' value="Thêm">
        </form>
    </div>
</div>
<?php
include('./layout/footer.php');
?>

<?php
if (isset($_POST['submit'])) {
    //lay du lieu
    $tenNhanVien = $_POST['TenNV'];
    $passwordNV = $_POST['passwordNV'];
    $chucvuNhanVien = $_POST['chucvuNV'];
    $diachiNhanVien = $_POST['diachiNV'];
    $sdtNV = $_POST['sdtNV'];

    //kiem tra
    if ( !(strlen($tenNhanVien) && strlen($passwordNV) && strlen($chucvuNhanVien) 
    && strlen($diachiNhanVien) && strlen($sdtNV)) ) {
        $_SESSION['error_submit_staff'] = 'Vui lòng nhập đầy đủ thông tin';
        die();
    }

    //luu du lieu
    //mo ket noi
    $conn = new mysqli('localhost', 'root', '', 'quanlydathang');
    //kiem tra ket noi
    if ($conn->connect_error) {
        $_SESSION['error_submit_staff'] = 'Kết nối tới cơ sở dữ liệu không thành công';
        die();
    }
    //ma hoa mat khau
    $passwordNV = md5($passwordNV);
    $sql = "INSERT INTO `nhanvien` (`HoTenNV`, `Password`, `ChucVu`, `DiaChi`, `SoDienThoai`) VALUES (
        '$tenNhanVien',
        '$passwordNV',
        '$chucvuNhanVien',
        '$diachiNhanVien',
        '$sdtNV')";
    
    $result = $conn->query($sql);
    //giai phong du lieu
    unset($_POST['submit'], $_POST['TenNV'], $_POST['passwordNV'], $_POST['chucvuNV'], $_POST['diachiNV'], $_POST['sdtNV'] );
    //chuyen huong
    if (isset($result)) {
        $_SESSION['success'] = 'Thêm nhân viên thành công';
        header('location: http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/liststaff.php');
        die();
    } else {
        $_SESSION['error_submit_staff'] = 'Thêm dữ liệu không thành công';
        die();
    }
}
?>