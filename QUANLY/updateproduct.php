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
    $_SESSION['error_submit_product'] = 'Kết nối tới cơ sở dữ liệu không thành công';
    die();
}

$sql = "SELECT * FROM `hanghoa` WHERE MSHH = $id";

$result = $conn->query($sql);

while($row = mysqli_fetch_array($result)) {
    
?>

<div class="admin-content-right">
            <div class="container">
                <h1>Cập nhật sản phẩm</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <input required class="input" name="tenHH" type="text" value="<?php echo $row['TenHH'] ?>" placeholder="Nhập tên hàng hóa">
                    <input required class="input" name="motaHH" type="text" value="<?php echo $row['MoTaHH'] ?>" placeholder="Nhập mô tả hàng hóa">
                    <input required class="input" name="giaHH" type="text" value="<?php echo $row['Gia'] ?>" placeholder="Nhập giá">
                    <input required class="input" name="soluongHH" type="text" value="<?php echo $row['SoLuongHang'] ?>" placeholder="Nhập số lượng hàng hóa">
                    <input required class="input" name="ghichu" type="text" value="<?php echo $row['GhiChu'] ?>" placeholder="Nhập ghi chú">
                    <input required class="input" name="hinhHH" type="file" placeholder="Hình ảnh">
                    <?php
                    if (isset($_SESSION['error_submit_product'])) {
                        echo "<p class='text-error'>".$_SESSION['error_submit_product']."</p>";
                        unset($_SESSION['error_submit_product']);
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
    $tenHangHoa = $_POST['tenHH'];
    $motaHangHoa = $_POST['motaHH'];
    $giaHangHoa = $_POST['giaHH'];
    $soluongHangHoa = $_POST['soluongHH'];
    $ghichu = $_POST['ghichu'];
    $hinhHangHoa = $_FILES['hinhHH'];

    //kiem tra
    if ( !(strlen($tenHangHoa) && strlen($motaHangHoa) && strlen($giaHangHoa) 
    && strlen($soluongHangHoa) && strlen($ghichu)) ) {
        $_SESSION['error_submit_product'] = 'Vui lòng nhập đầy đủ thông tin';
        die();
    }
    $sql = "SELECT * FROM `hanghoa`, `hinhHH` WHERE hanghoa.MSHH = hinhHH.MSHH";
                        
    $resultImg = $conn->query($sql);
    // echo $result;
    // die();
    while($row = mysqli_fetch_array($resultImg)) {
        unlink('../image/'.$row['TenHinh']);
        //upload img
        $image = $_FILES['hinhHH'];
        //store image
        $image_name = $image['name'];
        $is_success_upload = move_uploaded_file($image["tmp_name"], '../image/'.$image_name);
        if (!$is_success_upload) {
            $_SESSION['error_submit_product'] = 'Lưu hình ảnh không thành công';
            die();        
        }
        $sql = "UPDATE `hinhHH` SET `TenHinh`='$image_name' WHERE MSHH=$id";
        $result = $conn->query($sql);    
    }
    

    $sql = "UPDATE hanghoa
    SET TenHH = '$tenHangHoa', MoTaHH = '$motaHangHoa', Gia = '$giaHangHoa', SoLuongHang = '$soluongHangHoa', GhiChu = '$ghichu'
    WHERE MSHH = $id";

    $result = $conn->query($sql);
    //giai phong du lieu
    unset($_POST['submit'], $_POST['tenHH'], $_POST['motaHH'], $_POST['giaHH'], $_POST['soluongHH'], $_POST['ghichu'], $_FILES['hinhHH']);
    //chuyen huong
    if (isset($result)) {
        $_SESSION['success'] = 'Cập nhật sản phẩm thành công';
        header('location: http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/listproduct.php');
        die();
    } else {
        $_SESSION['error_submit_product'] = 'Cập nhật dữ liệu không thành công';
        die();
    }
}
?>