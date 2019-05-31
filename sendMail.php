<?php
require_once("PHPMailer/PHPMailer.php");
require_once("PHPMailer/SMTP.php");

echo $_GET['name'];
echo $_GET['phone'];
echo $_GET['type'];
echo $_GET['name'];
echo $_GET['name'];
echo $_GET['name'];
echo $_GET['name'];
// 实例化PHPMailer核心类
$mail = new PHPMailer();
// 是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
// $mail->SMTPDebug = 1;
// 使用smtp鉴权方式发送邮件
$mail->isSMTP();
// smtp需要鉴权 这个必须是true
$mail->SMTPAuth = true;
// 链接qq域名邮箱的服务器地址
$mail->Host = 'smtp.126.com';
// 设置使用ssl加密方式登录鉴权
$mail->SMTPSecure = 'ssl';
// 设置ssl连接smtp服务器的远程服务器端口号
$mail->Port = 465;
// 设置发送的邮件的编码
$mail->CharSet = 'UTF-8';
// 设置发件人昵称 显示在收件人邮件的发件人邮箱地址前的发件人姓名
$mail->FromName = 'Info';
// smtp登录的账号 QQ邮箱即可
$mail->Username = 'account@126.com';
// smtp登录的密码 使用生成的授权码
$mail->Password = 'password';
// 设置发件人邮箱地址 同登录账号
$mail->From = 'account@126.com';
// 邮件正文是否为html编码 注意此处是一个方法
$mail->isHTML(true);
// 设置收件人邮箱地址
$mail->addAddress('receiver@126.com');
// 添加多个收件人 则多次调用方法即可
// $mail->addAddress('87654321@163.com');
// 添加该邮件的主题
$mail->Subject = 'Test Email';



// get name
$name="";
if(isset($_REQUEST["name"]) && trim($_REQUEST["name"])!=""){
	$name=trim($_REQUEST["name"]);
}
// get phone
$phone="";
if(isset($_REQUEST["phone"]) && trim($_REQUEST["phone"])!=""){
	$phone=trim($_REQUEST["phone"]);
}
//get date
$date="";
if(isset($_REQUEST["date"]) && trim($_REQUEST["date"])!=""){
	$date=trim($_REQUEST["date"]);
}
// get time
$time="";
if(isset($_REQUEST["time"]) && trim($_REQUEST["time"])!=""){
	$time=trim($_REQUEST["time"]);
}
// get store
$store="";
if(isset($_REQUEST["store"]) && trim($_REQUEST["store"])!=""){
	$store=trim($_REQUEST["store"]);
   
}
// get type
$type="";
if(isset($_REQUEST["type"]) && trim($_REQUEST["type"])!=""){
	$mobile=trim($_REQUEST["type"]);
}


//get parameter from service
$contact_data=array(
    "姓名"=>$name,
    "电话"=>$phone,
    "预约店铺"=>$store,
    "到店时间"=>$date.''.$time,
    "服务类型"=>$type,

);

// 添加邮件正文
$sendInfo = "";
foreach ($contact_data as $key => $value) {
    $sendInfo = $sendInfo."<strong>".$key.":</strong>".$value."<br>";
}
$mail->Body = $sendInfo;
// 为该邮件添加附件
// $mail->addAttachment('./example.pdf');
// 发送邮件 返回状态
$status = $mail->send();
// header('Location: '.$_GET['lbl_booking_link']);