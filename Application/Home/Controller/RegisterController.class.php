<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
   
public function index(){
	
				//$this->redirect('Company/Index');
	$this->display();
}
public function getMail(){
	//首先将穿过来的email 与数据库中的email比较 ，查看邮箱是否重复
			$MAIL=I('post.MAIL','','htmlspecialchars'); //进行 htmlspecialchars 过滤  防止 执行代码
			$ISBUREAU=I('post.ISBUREAU','','htmlspecialchars');
			$User = M("User"); // 实例化User对象
			$data = $User->where('UID="'.$MAIL.'"')->find();
			if($data!=null){
			$this->error("您输入的用户名重复");
			}else{
							$PASSWORD=I('post.PASSWORD','','htmlspecialchars'); //如上  进行过滤
							$REPASSWORD=I('post.REPASSWORD','','htmlspecialchars');
							if($PASSWORD!=$REPASSWORD){
									$this->error("两次输入的密码 不一致");
								}else{
									
							$TOKEN=md5($MAIL);//加密
							cookie('USERNAME',$MAIL,86400);//存入邮箱
							cookie('TOKEN',$TOKEN,86400);//存入验证码
							$token_exptime = time()+60*60*24;//过期时间为24小时后
							cookie('TOKEN_EXPTIME',$token_exptime,86400);
												
							
							$title='欢迎您注册毕业生供需管理系统';	
							$content='
							尊敬的用户'."$MAIL".'您好:</br>
							欢迎您注册毕业生供需管理系统，请点击以下链接注册账号</br>
							<a href="http://projectscore.sinaapp.com/index.php/Home/Register/Check/CODE/'.$TOKEN.'">
							http://projectscore.sinaapp.com/index.php/Home/Register/Check/CODE/'.$TOKEN.'</a><br/> 
    如果以上链接无法点击，请将它复制到你的浏览器地址栏中进入访问，该链接24小时内有效。

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
								$User = M("User"); // 实例化User对象
								$data['UID'] = $MAIL;
								$data['PASSWORD'] = $PASSWORD;
								$data['LOGINIP'] = get_client_ip();
								$data['REGISTERTIME']=date("Y-m-d");
								$data['ISBUREAU']=$ISBUREAU;
								$User->add($data);
								 $this->success("邮件已经投送成功，请进入邮箱查收");
							  } else { 
								 $this->error("请填写正确的邮箱");
										} 
										
																}
			}
}
public function check($CODE=""){
	$TOKEN = cookie('TOKEN');
	$TOKEN_EXPTIME=cookie('TOKEN_EXPTIME');//获取存到cookie里面的过期时间
	$USERNAME=cookie('USERNAME');
	if($TOKEN_EXPTIME>0){
				if($CODE!=$TOKEN){
					$this->error("验证码不相同");
				}else{
					$User = M("User"); // 实例化User对象
					$data['STATUS'] = 1;
					$User->where('UID="'.$USERNAME.'"')->save($data); // 根据条件更新记录
					$this->success("恭喜您邮箱激活成功");
					$this->redirect('Login/index');  // 跳转到  公司注册界面
					//跳转
				}
	}else{
		$this->error("对不起时间已经过期，请重新注册");
	}
	
	
		
}
public function user(){
	if(IS_AJAX){
	$MAIL=I('post.MAIL','','htmlspecialchars'); //如上  进行过滤
	$User = M("User"); // 实例化User对象
	$data = $User->where('UID="'.$MAIL.'"')->find();
	if($data){
			$data="用户名重复";
			$this->ajaxReturn($data);
			}
	//用户名重复验证
	}else{
		
	}
}
	

}
	
	
	
