<?php
include ("./layout/header.php");
include ("./layout/slider.php");
?>

<div class="admin-content-right">
            <div class="container">
                <h1>Thêm Sản phẩm</h1>
                <form action="" method="POST">
                    <input class="input" name="tenHH" type="text" placeholder="Nhập tên hàng hóa">
                    <input class="input" name="motaHH" type="text" placeholder="Nhập mô tả hàng hóa">
                    <input class="input" name="giaHH" type="text" placeholder="Nhập giá">
                    <input class="input" name="soluongHH" type="text" placeholder="Nhập số lượng hàng hóa">
                    <input class="input" name="ghichu" type="text" placeholder="Nhập ghi chú">
                    <input class="input" name="hinhHH" type="file" placeholder="Hình ảnh">
                    <?php
                    if (isset($_SESSION['error_submit_product'])) {
                        echo "<p class='text-error'>".$_SESSION['error_submit_product']."</p>";
                        unset($_SESSION['error_submit_product']);
                    }
                    ?>
                    <button type="submit" class='button'>Thêm</button>
                </form>
            </div>
        </div>
    </section>
<?php
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
    $hinhHangHoa = $_POST['hinhHH'];

    //kiem tra
    if ( !(strlen($tenHangHoa) && strlen($motaHangHoa) && strlen($giaHangHoa) 
    && strlen($soluongHangHoa) && strlen($ghichu) && strlen($hinhHangHoa)) ) {
        $_SESSION['error_submit_product'] = 'Vui lòng nhập đầy đủ thông tin';
        die();
    }

    //luu du lieu
    //mo ket noi
    $conn = new mysqli('localhost', 'root', '', 'quanlydathang');
    //kiem tra ket noi
    if ($conn->connect_error) {
        $_SESSION['error_submit_product'] = 'Kết nối tới cơ sở dữ liệu không thành công';
        die();
    }
    //ma hoa mat khau
    //$passwordNV = md5($passwordNV, true);
    $sql = "INSERT INTO `hanghoa` (`TenHH`, `MoTaHH`, `Gia`, `SoLuongHang`, `GhiChu`) VALUES (
        '$tenHangHoa',
        '$motaHangHoa',
        '$giaHangHoa',
        '$soluongHangHoa',
        '$ghichu')";
    
    $result = $conn->query($sql);
    //giai phong du lieu
    unset($_POST['submit'], $_POST['tenHH'], $_POST['motaHH'], $_POST['giaHH'], $_POST['soluongHH'], $_POST['ghichu'] );
    //chuyen huong
    if (isset($result)) {
        $_SESSION['success'] = 'Thêm hàng hóa thành công';
        header('location: http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/listproduct.php');
        die();
    } else {
        $_SESSION['error_submit_product'] = 'Thêm dữ liệu không thành công';
        die();
    }
}
?>