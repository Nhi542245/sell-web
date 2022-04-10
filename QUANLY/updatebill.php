<?php
include ("./layout/header.php");
include ("./layout/slider.php");
if(!isset($_SESSION['userId'])){
    $_SESSION['error_submit_login'] = 'Vui lòng đăng nhập tài khoản';
    header('location: http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/login.php');
}
?>

<div class="admin-content-right">
            <div class="container">
                <h1>Cập nhật đơn hàng</h1>
                <form action="" method="POST">
                    <input required class="input" name="ngayGH" type="text" placeholder="Ngày giao hàng">
                    <select name="trangthaiDH" class='input'>
                        <option value="Đã đặt hàng">Đã đặt hàng</option>
                        <option value="Đang giao">Đang giao</option>
                        <option value="Giao hàng thành công">Giao hàng thành công</option>
                    </select>                    
                    <button type="submit" class='button'>Thêm</button>
                </form>
            </div>
        </div>
    </section>
<?php
include('./layout/footer.php');
?>