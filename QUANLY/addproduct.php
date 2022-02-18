<?php
include ("./layout/header.php");
include ("./layout/slider.php");
?>

<div class="admin-content-right">
            <div class="container">
                <h1>Thêm Sản phẩm</h1>
                <form action="" method="POST">
                    <input required class="input" name="tenHH" type="text" placeholder="Nhập tên hàng hóa">
                    <input required class="input" name="motaHH" type="text" placeholder="Nhập mô tả hàng hóa">
                    <input required class="input" name="giaHH" type="text" placeholder="Nhập giá">
                    <input required class="input" name="soluongHH" type="text" placeholder="Nhập số lượng hàng hóa">
                    <input required class="input" name="ghichu" type="text" placeholder="Nhập ghi chú">
                    <input required class="input" name="hinhHH" type="file" placeholder="Hình ảnh">
                    <button type="submit" class='button'>Thêm</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>