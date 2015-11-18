<?php
namespace Home\Controller;
use Think\Controller;
class ForgetController extends Controller {
	public function index(){
		//$this->redirect('Login/index');
		$this->display();
	}
	public function forget(){
		$MAIL=I('post.MAIL','','htmlspecialchars'); //进行 htmlspecialchars 过滤  防止 执行代码
		//获取输入的邮箱密码
		$User = M("User");
		  $data = $User->where('UID="'.$MAIL.'"')->find();  //查找数据库是否有这个人
		  if($data){
							$TOKEN=md5($MAIL);//加密
							cookie('USERNAME',$MAIL,86400);//存入邮箱
							cookie('TOKEN',$TOKEN,86400);//存入验证码
							$token_exptime = time()+60*60*24;//过期时间为24小时后
							cookie('TOKEN_EXPTIME',$token_exptime,86400);
						
							$title='更改密码';	
							$content='
							尊敬的用户'."$MAIL".'您好:</br>
							更改密码,请点击以下链接更改密码</br>
							<a href="http://astoneman1.sinaapp.com/index.php/Home/Password/Check/CODE/'.$TOKEN.'">
							http://astoneman1.sinaapp.com/index.php/Home/Password/Check/CODE/'.$TOKEN.'</a><br/> 
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。若您没有进行操作，请忽视此邮件

							';
							$from='591978732@qq.com';
							$to=$MAIL;
							$chart='utf-8';
							$attachment ='';
							  Vendor('MAIL.autoload');
							  $mail = new\ PHPMailer(); 
							  //$mail = new PHPMailer(); 
							  $mail->CharSet = $chart; //设置采用gb2312中文编码 
							  $mail->IsSMTP('smtp'); //设置采用SMTP方式发送邮件 
							  $mail->Host = "smtp.qq.com"; //设置邮件服务器的地址 
							  $mail->Port = 25; //设置邮件服务器的端口，默认为25 
							  $mail->From = $from; //设置发件人的邮箱地址 
							  $mail->FromName = "毕业生供需管理"; //设置发件人的姓名 
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
								 $this->success("邮件已经投送成功，请进入邮箱查收");
							  } else { 
								 $this->error("请填写正确的邮箱");
										} 

						
		  }else{
			  $this->error("您并没有注册");
		  }
		//dump($MAIL);
		
	}
}



?>