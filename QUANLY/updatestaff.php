<?php
include ("./layout/header.php");
include ("./layout/slider.php");
if(!isset($_SESSION['userId'])){
    $_SESSION['error_submit_login'] = 'Vui lòng đăng nhập tài khoản';
    header('location: http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/login.php');
}
$id = $_GET['id'];
//mo ket noi
$conn = new mysqli('localhost', 'root', '', 'quanlydathang');

//kiem tra ket noi
if ($conn->connect_error) {
    $_SESSION['error_submit_staff'] = 'Kết nối tới cơ sở dữ liệu không thành công';
    die();
}

$sql = "SELECT * FROM `nhanvien` WHERE MSNV = $id";

$result = $conn->query($sql);

while($row = mysqli_fetch_array($result)) {
    
?>

<div class="admin-content-right">
            <div class="container">
                <h1>Cập nhật Nhân viên</h1>
                <form action="" method="POST">
                    <input required class="input" name="TenNV" type="text" value="<?php echo $row['HoTenNV'] ?>" placeholder="Nhập họ tên nhân viên">
                    <input required class="input" name="passwordNV" type="password" placeholder="Nhập password">
                    <input required class="input" name="chucvuNV" type="text" value="<?php echo $row['ChucVu'] ?>" placeholder="Nhập chức vụ">
                    <input required class="input" name="diachiNV" type="text" value="<?php echo $row['DiaChi'] ?>" placeholder="Nhập địa chỉ">
                    <input required class="input" name="sdtNV" type="text" value="<?php echo $row['SoDienThoai'] ?>" placeholder="Nhập số điện thoại">
                    <?php
                    if (isset($_SESSION['error_submit_staff'])) {
                        echo "<p class='text-error'>".$_SESSION['error_submit_staff']."</p>";
                        unset($_SESSION['error_submit_staff']);
                    }
                    ?>
                    <input type="submit" name="submit" class='button' value="Cập nhật">
                </form>
            </div>
        </div>
    </section>
<?php
}
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
    //ma hoa mat khau
    $passwordNV = md5($passwordNV, true);
    $sql = "UPDATE nhanvien
    SET HoTenNV = '$tenNhanVien', ChucVu = '$chucvuNhanVien', DiaChi = '$diachiNhanVien', SoDienThoai = '$sdtNV'
    WHERE MSNV = $id";
    
    $result = $conn->query($sql);
    //giai phong du lieu
    unset($_POST['submit'], $_POST['TenNV'], $_POST['passwordNV'], $_POST['chucvuNV'], $_POST['diachiNV'], $_POST['sdtNV'] );
    //chuyen huong
    if (isset($result)) {
        $_SESSION['success'] = 'Cập nhật nhân viên thành công';
        header('location: http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/liststaff.php');
        die();
    } else {
        $_SESSION['error_submit_staff'] = 'Cập nhật dữ liệu không thành công';
        die();
    }
}
?>