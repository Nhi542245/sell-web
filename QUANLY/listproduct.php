<?php
include ("./layout/header.php");
?>
    <section>
            <div class="container">
                <br>
                <h1>Danh sách Sản phẩm</h1><br>
                <button class='btn primary fm-primary'>Thêm sản phẩm</button>
                <?php
                if (isset($_SESSION['success'])) {
                    echo "<p class='text-success'>".$_SESSION['success']."</p>";
                    unset($_SESSION['success']);
                }
                ?>
                <table border="1" cellspacing="0" class="table">                    
                    <tr>
                        <th>STT</th>
                        <th>MSHH</th>
                        <th>Tên HH</th>
                        <th>Ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Cập nhật</th>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>001</td>
                        <td>Kem lót</td>
                        <td><img src="./images/skin/kl1.jpg" alt=""></td>
                        <td>90.000</td>
                        <td>20</td>
                        <td>
                            <button class="btn primary">Sửa</button>
                            <button class="btn error">Xóa</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>002</td>
                        <td>Kem nền</td>
                        <td><img src="./images/skin/kn1.jpg" alt=""></td>
                        <td>200.000</td>
                        <td>20</td>
                        <td>
                            <button class="btn primary">Sửa</button>
                            <button class="btn error">Xóa</button>
                        </td>
                    </tr>
                </table>
            </div>        
    </section>
<?php
include('./layout/footer.php');
?>