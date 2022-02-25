<?php
include ("./layout/header.php");
?>
    <section>
            <div class="container">
                <br>
                <h1>Danh sách Nhân viên</h1><br>
                <button class='btn primary fm-primary'>Thêm nhân viên</button>
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