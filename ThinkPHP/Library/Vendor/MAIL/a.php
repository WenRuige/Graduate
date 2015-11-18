<?php
header('Content-Type: text/html; charset=utf-8');
include 'class.phpmailer.php'; 
include 'class.smtp.php'; 
function send_mail ($title,$content,$from,$to,$chart='utf-8',$attachment ='') { 
	  
	  $mail = new PHPMailer(); 
	  $mail->CharSet = $chart; //设置采用gb2312中文编码 
	  $mail->IsSMTP('smtp'); //设置采用SMTP方式发送邮件 
	  $mail->Host = "smtp.qq.com"; //设置邮件服务器的地址 
	  $mail->Port = 25; //设置邮件服务器的端口，默认为25 
	  $mail->From = $from; //设置发件人的邮箱地址 
	  $mail->FromName = "个文瑞"; //设置发件人的姓名 
	  $mail->SMTPAuth = true; //设置SMTP是否需要密码验证，true表示需要 
	  $mail->Username = $from; //设置发送邮件的邮箱 
	  $mail->Password = "sharkcphqw1234"; //设置邮箱的密码 
	  $mail->Subject = $title; //设置邮件的标题 
	  $mail->AltBody = "text/html"; // optional, comment out and test 
	  $mail->Body = $content; //设置邮件内容 
	  $mail->IsHTML(true); //设置内容是否为html类型 
	  $mail->WordWrap = 50; //设置每行的字符数 
	  $mail->AddReplyTo("地址","名字"); //设置回复的收件人的地址 
	  $mail->AddAddress($to,""); //设置收件的地址 
   if ($attachment != '') { 
     $mail->AddAttachment($attachment, $attachment); 
    } 
	if($mail->Send()) { 
		  echo $to.'已投送成功<br />';
	  } else { 
		  echo 'b';
	} 

} 
$arr=array('591978732@qq.com','941137860@qq.com');

foreach($arr as $v){
	send_mail('收到请和我qq说收到了','good','591978732@qq.com',$v);
}
