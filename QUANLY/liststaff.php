<?php
include ("./layout/header.php");
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

                        <tr>
                            <td>1</td>
                            <td>100</td>
                            <td>Vân Nhi</td>                        
                            <td>Thu ngân</td>
                            <td>57 CMT8, An Thới, Bình Thủy, CT</td>
                            <td>0939695677</td>
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