<?php
include ("./layout/header.php");
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
                        <th>MSĐH</th>
                        <th>Ngày đặt hàng</th>
                        <th>Ngày giao hàng</th>
                        <th>Cập nhật</th>
                    </tr>
                </table>
            </div>
        </section>

<?php
include('./layout/footer.php');
?>