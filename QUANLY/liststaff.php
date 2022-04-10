<?php
include ("./layout/header.php");
if(!isset($_SESSION['userId'])){
    $_SESSION['error_submit_login'] = 'Vui lòng đăng nhập tài khoản';
    header('location: http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/login.php');
}
?>
    <section>
            <div class="container">
                <br>
                <h1>Danh sách Nhân viên</h1><br>
                <a class='btn primary fm-primary' href="http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/addstaff.php">Thêm nhân viên</a>
                <?php
                if (isset($_SESSION['success'])) {
                    echo "<br/><br/><p class='text-success'>".$_SESSION['success']."</p>";
                    unset($_SESSION['success']);
                }
                ?>
                    <table border="1" cellspacing="0" class="table">                    
                        <tr>
                            <th>STT</th>
                            <th>MSNV</th>
                            <th>Họ tên NV</th>
                            <th>Chức vụ</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>   
                            <th>Cập nhật</th>                     
                        </tr>
                        <?php
                        //mo ket noi
                        $conn = new mysqli('localhost', 'root', '', 'quanlydathang');

                        //kiem tra ket noi
                        if ($conn->connect_error) {
                            $_SESSION['error_submit_staff'] = 'Kết nối tới cơ sở dữ liệu không thành công';
                            die();
                        }

                        $sql = "SELECT * FROM `nhanvien`";
                        
                        $result = $conn->query($sql);

                        $i = 0;
                        while($row = mysqli_fetch_array($result)) {
                            $i ++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['MSNV'] ?></td>
                                <td><?php echo $row['HoTenNV'] ?></td>                        
                                <td><?php echo $row['ChucVu'] ?></td>
                                <td><?php echo $row['DiaChi'] ?></td>
                                <td><?php echo $row['SoDienThoai'] ?></td>
                                <td>
                                <a class='btn primary' href="http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/updatestaff.php?id=<?php echo $row['MSNV'] ?>">Sửa</a>
                                <a class='btn error' href="http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/deletestaff.php?id=<?php echo $row['MSNV'] ?>">Xóa</a>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>        
    </section>
<?php
include('./layout/footer.php');
?>