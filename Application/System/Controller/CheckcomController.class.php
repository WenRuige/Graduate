<?php
namespace System\Controller;
use Think\Controller;
class CheckcomController extends Controller {
    public function index(){
		$User=M("Company");
		$list =$User->query("select *from event_company where ISEXAM=0");
		$this->assign('list',$list);
    $this->display();
	}
	public function check($id=0){
		//$CID=I('post.cid','','htmlspecialchars'); //获取传过来的CID
		$User=M('Company');
		$data['ISEXAM']=1;
		$User->where('CID="'.$id.'"')->save($data); 
		
		$MAIL=$User->where('CID="'.$id.'"')->getField('MAIL');
		//dump($MAIL);
			$title='毕业生供需管理系统';	
							$content='
							尊敬的用户'."$MAIL".'您好:</br>
							您注册的公司已经通过我们的审核了
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
								
								// $this->success("邮件已经投送成功，请进入邮箱查收");
							  } else { 
								// $this->error("请填写正确的邮箱");
										} 
		
		
		
		
		
		
		$this->success('审核成功','/System/Index');
	}
}