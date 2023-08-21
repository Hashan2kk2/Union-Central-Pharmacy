<?php
use PHPMailer\PHPMailer\PHPMailer;

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$msg = $_POST["msg"];

if (empty($name)) {
    echo "Please Enter your First Name.";
} else if (empty($phone)) {
    echo "Please Enter your Mobile Number.";
} else if (strlen($phone) != 10) {
    echo "mobile number should contain 10 characters.";
} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $phone) == 0) {
    echo "Invalid Mobile Number.";
} else if (empty($email)) {
    echo "Please enter your Email Address";
} else if (strlen($email) >= 100) {
    echo "Email must be less than 100 characters.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address.";
} else if (empty($msg)) {
    echo "Please Enter Messaeg.";
} else {


    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'lakruwan.hashan2002@gmail.com';
    $mail->Password = 'byqmfjshskyinhry';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('lakruwan.hashan2002@gmail.com');
    $mail->addAddress('hashan.lakruwan2020@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = "Email From A Client";
    $mail->Body = '
    <div style="display: flex;align-items: center; justify-content: center; text-align: center;"> 
        <div style="width: 40%; padding: 40px; background-color: rgb(236, 236, 236);">
            <div
                style="border-bottom: 1px solid #a3a3a3; height: 100px; background-image: url(https://scontent.fcmb2-2.fna.fbcdn.net/v/t39.30808-6/358156407_123733410768252_4937622027037219232_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeGYQJ6HqXAAwVsj_2WkhRUqizdvj5GAe3eLN2-PkYB7dxmT4UOt_ajoXIGyUl5jrot8xWyS8YpX8FmZybBK6_Ya&_nc_ohc=l3cyDAx_zL4AX-I4w8O&_nc_pt=1&_nc_ht=scontent.fcmb2-2.fna&oh=00_AfBNqTdd7awRa-6_ISKjEObyGQ0klLQmQmrzcpI5cXVkhA&oe=64E807EF); background-repeat: no-repeat; background-position: center; background-size: 80px; padding-bottom: 20px;">
            </div>
            <br>
            <div>
                <h3 style="font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif; text-align: center; color: black; text-transform: capitalize;"><b>Message From a Client<b></h3>
            </div>
            <div style="text-align: center; margin: 20px 0; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; font-weight: bold;">Client Name</div>
            <div style="text-align: center; width: 400; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; display: block; margin: auto;">' . $name . '</div>
            <hr style="width:40%;">
            <br>
            <div style="text-align: center; margin: 20px 0; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; font-weight: bold;">Email Address</div>
            <div style="text-align: center; width: 400; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; display: block; margin: auto;">' . $email . '</div>
            <hr style="width:40%;">
            <br>
            <div style="text-align: center; margin: 20px 0; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; font-weight: bold;">Mobile Number</div>
            <div style="text-align: center; width: 400; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; display: block; margin: auto;">' . $phone . '</div>
            <hr style="width:40%;">
            <br>
            <div style="text-align: center; margin: 20px 0; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; font-weight: bold;">Message</div>
            <div style="text-align: center; width: 400; font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif; display: block; margin: auto;">' . $msg . '</div>
            <div style="width: 100%; height: 4px; background-color: #3cd2b3; margin-top: 30px; border-radius: 50px;"></div>
        </div>
    </div>';
    $mail->send();
}

// byqmfjshskyinhry
?>