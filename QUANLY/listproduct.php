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
                <h1>Danh sách Sản phẩm</h1><br>
                <a class='btn primary fm-primary' href="http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/addproduct.php">Thêm sản phẩm</a>
                <?php
                if (isset($_SESSION['success'])) {
                    echo "<br/><br/><p class='text-success'>".$_SESSION['success']."</p>";
                    unset($_SESSION['success']);
                }
                ?>

                <table border="1" cellspacing="0" class="table">                    
                    <tr>
                        <th>STT</th>
                        <th>MSHH</th>
                        <th>Tên HH</th>
                        <th>Ảnh</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Cập nhật</th>
                    </tr>                    
                    <?php
                        //mo ket noi
                        $conn = new mysqli('localhost', 'root', '', 'quanlydathang');

                        //kiem tra ket noi
                        if ($conn->connect_error) {
                            $_SESSION['error_submit_product'] = 'Kết nối tới cơ sở dữ liệu không thành công';
                            die();
                        }

                        $sql = "SELECT * FROM `hanghoa`, `hinhHH` WHERE hanghoa.MSHH = hinhHH.MSHH";
                        
                        $result = $conn->query($sql);

                        $i = 0;
                        while($row = mysqli_fetch_array($result)) {
                            $i ++;
                        ?>                    
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['MSHH'] ?></td>
                                <td><?php echo $row['TenHH'] ?></td>
                                <td><img src="<?php echo "../image/".$row['TenHinh'] ?>" alt="<?php echo $row['TenHinh'] ?>"></td>
                                <td><?php echo $row['MoTaHH'] ?></td>
                                <td><?php echo $row['Gia'] ?></td>
                                <td><?php echo $row['SoLuongHang'] ?></td>
                                <td>
                                <a class='btn primary' href="http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/updateproduct.php?id=<?php echo $row['MSHH'] ?>">Sửa</a>
                                <a class='btn error' href="http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/deleteproduct.php?id=<?php echo $row['MSHH'] ?>">Xóa</a>
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