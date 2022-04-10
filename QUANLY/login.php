<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="./css/style2.css">
</head>

<body>
    <div class="container-login">
        <form action="" method="post" class="login-form">
            <div class="form-container">
                <h1 class="title-login">Đăng nhập</h1>
                <div class="input-component">
                    <input class="input-login" type="text" placeholder="Nhập tên người dùng" required name="username">
                </div>
                <div class="input-component">
                    <input class="input-login" type="password" placeholder="Nhập mật khẩu" required name="password">
                </div>
                <div class="input-component">
                    <?php
                    if (isset($_SESSION['error_submit_login'])) {
                        echo "<p class='text-error error-login'>".$_SESSION['error_submit_login']."</p> <br/>";
                        unset($_SESSION['error_submit_login']);
                    }
                    ?>
                    <input class="input-submit-login" name="submit" type="submit" id="submit" value="Log in">
                </div>
            </div>
        </form>
    </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    //lay du lieu
    $username = $_POST['username'];
    $password = $_POST['password'];

    //kiem tra
    if ( !(strlen($username) && strlen($password)) ) {
        $_SESSION['error_submit_login'] = 'Vui lòng nhập đầy đủ thông tin';
        die();
    }

    //mo ket noi
    $conn = new mysqli('localhost', 'root', '', 'quanlydathang');
    //kiem tra ket noi
    if ($conn->connect_error) {
        $_SESSION['error_submit_login'] = 'Kết nối tới cơ sở dữ liệu không thành công';
        die();
    }
    //ma hoa mat khau
    $passwordNV = md5($password);
    $sql = "SELECT * FROM nhanvien WHERE MSNV=$username AND Password='$passwordNV'";
    
    $result = $conn->query($sql);

    while($row = mysqli_fetch_array($result)) {
        $_SESSION['userId'] = $row['MSNV'];
        header('location: http://localhost/B1805901_NGUYEN_HUYNH_VAN_NHI/QUANLY/bill.php');
        die();
    }

    $_SESSION['error_submit_login'] = 'Đăng nhập không thành công!';

}

?>