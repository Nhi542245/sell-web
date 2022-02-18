<?php
include ("./layout/header.php");
include ("./layout/slider.php");
?>

<div class="admin-content-right">
            <div class="container">
                <h1>Cập nhật Nhân viên</h1>
                <form action="" method="POST">
                    <input required class="input" name="TenNV" type="text" placeholder="Nhập họ tên nhân viên">
                    <input required class="input" name="passNV" type="text" placeholder="Nhập password">
                    <input required class="input" name="chucvuNV" type="text" placeholder="Nhập chức vụ">
                    <input required class="input" name="diachiNV" type="text" placeholder="Nhập địa chỉ">
                    <input required class="input" name="sdtNV" type="text" placeholder="Nhập số điện thoại">
                    <button type="submit" class='button'>Thêm</button>
                </form>
            </div>
        </div>
    </section>
<?php
include('./layout/footer.php');
?>