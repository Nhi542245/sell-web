<?php
include ("./layout/header.php");
include ("./layout/slider.php");
?>

<div class="admin-content-right">
            <div class="container">
                <h1>Danh sách Sản phẩm</h1>
                <table border="1" class="table">                    
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
                            <button>Sửa</button>
                            <button>Xóa</button>
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
                            <button>Sửa</button>
                            <button>Xóa</button>
                        </td>
                    </tr>
                </table>
            </div>        
    </section>
</body>
</html>