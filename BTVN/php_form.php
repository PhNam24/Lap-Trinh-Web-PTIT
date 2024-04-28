<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>PHP Form</title>
</head>

<style>
    .error {
        color: red;
    }
</style>
<body>
    <?php
        $nameErr = $emailErr = $genderErr = $passwordErr = $password2Err= "";
        $name = $email = $gender = $birth = $password = $password2 = $province = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Chưa nhập tên";
            } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Chỉ bao gồm chữ cái và khoảng trắng";
                }
            }
            
            if (empty($_POST["email"])) {
                $emailErr = "Chưa nhập emal";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Sai định dạng email";
                }
            }
                
            if (empty($_POST["password"])) {
                $password = "";
            } else {
                $password = test_input($_POST["password"]);
                if (!password_validation($password)) {
                    $passwordErr = "Mật khẩu không hợp lệ";
                }
            }

            if (empty($_POST["password2"])) {
                $password2Err = "Mật khẩu không trùng nhau";
            } else {
                $password2 = test_input($_POST["password"]);
                if ($password != $password2) {
                    $password2Err = "Mật khẩu không trùng nhau";
                }
            }

            if (empty($_POST["birth"])) {
                $birth = "";
            } else {
                $birth = test_input($_POST["birth"]);
            }

            if (empty($_POST["gender"])) {
                $genderErr = "Chưa chọn giới tính";
            } else {
                $gender = test_input($_POST["gender"]);
            }

            if (empty($_POST["select_province"])) {
                $province = "";
            } else {
                $province = test_input($_POST["select_province"]);
            }
        }

        function password_validation($data) {
            if (strlen($data) < 6) {
                return false;
            }
            $cnt_upper = 0;
            $cnt_special = 0;
            $cnt_number = 0;
            for ($i = 0; $i < strlen($data); $i++) {
                if (ctype_upper($data[$i])) {
                    $cnt_upper++;
                }
                if (ctype_alpha($data[$i])) {
                    $cnt_special++;
                }
                if (ctype_digit($data[$i])) {
                    $cnt_number++;
                }
            }
            if ($cnt_upper == 0 || $cnt_special == 0 || $cnt_number == 0) {
                return false;
            }
            return true;
        }

        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
    ?>

    <div class="container">
        <div class="card">
            <div class="card_title">
                <h1>PHP Form</h1>
                <p><span class="error">* Không được để trống</span></p>
            </div>
            <div class="form">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
                    Tên: <input type="text" class="in_text" name="name" require value="<?php echo $name;?>">
                    <span class="error">* <?php echo $nameErr;?></span>
                    <br>
                    E-mail: <input type="text" class="in_text" name="email" require value="<?php echo $email;?>">
                    <span class="error">* <?php echo $emailErr;?></span>
                    <br>
                    Mật khẩu: <input type="password" class="in_text" name="password" size="65" require placeholder="Mật khẩu nhiều hơn 6 ký tự, bao gồm ký tự đặc biệt, số, chữ hoa, chữ thường" value="<?php echo $password;?>">
                    <span class="error">* <?php echo $passwordErr;?></span>
                    <br>
                    Nhập lại mật khẩu: <input type="password" class="in_text" name="password2" require value="">
                    <span class="error">* <?php echo $password2Err;?></span>
                    <br>
                    Ngày sinh: <input type="date" name="birth" require value="<?php echo $birth;?>"></input>
                    <br><br>
                    Giới tính:
                    <input type="radio" class="in_ratio" name="gender" <?php if (isset($gender) && $gender=="Nam") echo "checked";?> value="Nam">Nam
                    <input type="radio" class="in_ratio" name="gender" <?php if (isset($gender) && $gender=="Nữ") echo "checked";?> value="Nữ">Nữ
                    <input type="radio" class="in_ratio" name="gender" <?php if (isset($gender) && $gender=="Khác") echo "checked";?> value="Khác">Khác  
                    <span class="error">* <?php echo $genderErr;?></span>
                    <br><br>
                    Tỉnh/Thành phố  : 
                    <select name= "select_province" class="in_text">
                        <option value="An Giang">An Giang
                        <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu
                        <option value="Bắc Giang">Bắc Giang
                        <option value="Bắc Kạn">Bắc Kạn
                        <option value="Bạc Liêu">Bạc Liêu
                        <option value="Bắc Ninh">Bắc Ninh
                        <option value="Bến Tre">Bến Tre
                        <option value="Bình Định">Bình Định
                        <option value="Bình Dương">Bình Dương
                        <option value="Bình Phước">Bình Phước
                        <option value="Bình Thuận">Bình Thuận
                        <option value="Bình Thuận">Bình Thuận
                        <option value="Cà Mau">Cà Mau
                        <option value="Cao Bằng">Cao Bằng
                        <option value="Đắk Lắk">Đắk Lắk
                        <option value="Đắk Nông">Đắk Nông
                        <option value="Điện Biên">Điện Biên
                        <option value="Đồng Nai">Đồng Nai
                        <option value="Đồng Tháp">Đồng Tháp
                        <option value="Đồng Tháp">Đồng Tháp
                        <option value="Gia Lai">Gia Lai
                        <option value="Hà Giang">Hà Giang
                        <option value="Hà Nam">Hà Nam
                        <option value="Hà Tĩnh">Hà Tĩnh
                        <option value="Hải Dương">Hải Dương
                        <option value="Hậu Giang">Hậu Giang
                        <option value="Hòa Bình">Hòa Bình
                        <option value="Hưng Yên">Hưng Yên
                        <option value="Khánh Hòa">Khánh Hòa
                        <option value="Kiên Giang">Kiên Giang
                        <option value="Kon Tum">Kon Tum
                        <option value="Lai Châu">Lai Châu
                        <option value="Lâm Đồng">Lâm Đồng
                        <option value="Lạng Sơn">Lạng Sơn
                        <option value="Lào Cai">Lào Cai
                        <option value="Long An">Long An
                        <option value="Nam Định">Nam Định
                        <option value="Nghệ An">Nghệ An
                        <option value="Ninh Bình">Ninh Bình
                        <option value="Ninh Thuận">Ninh Thuận
                        <option value="Phú Thọ">Phú Thọ
                        <option value="Quảng Bình">Quảng Bình
                        <option value="Quảng Bình">Quảng Bình
                        <option value="Quảng Ngãi">Quảng Ngãi
                        <option value="Quảng Ninh">Quảng Ninh
                        <option value="Quảng Trị">Quảng Trị
                        <option value="Sóc Trăng">Sóc Trăng
                        <option value="Sơn La">Sơn La
                        <option value="Tây Ninh">Tây Ninh
                        <option value="Thái Bình">Thái Bình
                        <option value="Thái Nguyên">Thái Nguyên
                        <option value="Thanh Hóa">Thanh Hóa
                        <option value="Thừa Thiên Huế">Thừa Thiên Huế
                        <option value="Tiền Giang">Tiền Giang
                        <option value="Trà Vinh">Trà Vinh
                        <option value="Tuyên Quang">Tuyên Quang
                        <option value="Vĩnh Long">Vĩnh Long
                        <option value="Vĩnh Phúc">Vĩnh Phúc
                        <option value="Yên Bái">Yên Bái
                        <option value="Phú Yên">Phú Yên
                        <option value="Tp.Cần Thơ">Tp.Cần Thơ
                        <option value="Tp.Đà Nẵng">Tp.Đà Nẵng
                        <option value="Tp.Hải Phòng">Tp.Hải Phòng
                        <option value="Tp.Hà Nội">Tp.Hà Nội
                        <option value="TP  HCM">TP HCM
                        </select>
                    <br><br><br>
                    <input type="submit" class="btn" name="submit" value="Submit">  
                </form>

                <br><br><br>
                <?php
                    if (isset($_POST['submit'])) {
                        if (!empty($name) && !empty($email) && !empty($birth) && !empty($gender) && password_validation($password) && $password == $password2) {
                            echo "<h2>Đăng ký thành công, vui lòng kiểm tra lại thông tin:</h2>";
                            echo "<br><br>";
                            echo '<h3>Tên: '.$name.'</h3?';
                            echo "<br>";
                            echo '<h3>Ngày sinh: '.$birth.'</h3?';
                            echo "<br>";
                            echo '<h3>Tỉnh/Thành phố: '.$province.'</h3?';
                            echo "<br>";
                            echo '<h3>Email: '.$email.'</h3?';
                            echo "<br>";
                            echo '<h3>Mật khẩu: '.$password.'</h3?';
                            echo "<br>";
                            echo '<h3>Giới tinh: '.$gender.'</h3?';
                        }
                        else {
                            echo "<h2>Đăng ký không thành công, vui lòng nhập lại thông tin</h2>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>