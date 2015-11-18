<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
	public function index(){
		$this->display();

	}
	public function  Verify(){
		//验证码
	$Verify =     new \Think\Verify();
	$Verify->fontSize = 30;
	$Verify->length   = 3;
	$Verify->useNoise = false;
	$Verify->entry();	
	}

	public function login(){
	
  $verify = new \Think\Verify();
 if(!$verify->check($_POST['CODE']))
        {
            $this->error("验证码错误！");
            return;
        }else{
				$MAIL=I('post.MAIL','','htmlspecialchars'); //进行 htmlspecialchars 过滤  防止 执行代码
				$PASSWORD_TEMP=I('post.PASSWORD','','htmlspecialchars'); //进行 htmlspecialchars 过滤  防止 执行代码
				$User =M('User');
				session('USERNAME',$MAIL);
				$USERNAME = $User->where('UID="'.$MAIL.'"')->find();
				$PASSWORD=$User->where('UID="'.$MAIL.'"')->getField('password');
				$STATUS=$User->where('UID="'.$MAIL.'"')->getField('status');
				$ISREGISTER=$User->where('UID="'.$MAIL.'"')->getField('isregister');
				$ISBUREAU=$User->where('UID="'.$MAIL.'"')->getField('isbureau');
				$ISADMIN=$User->where('UID="'.$MAIL.'"')->getField('isadmin');
				$Data=M('Company');
				$ISEXAM=$Data->where('MAIL="'.$MAIL.'"')->getField('isexam');
				$BUREAU =M('Bureau');
				$ISCHECK=$BUREAU->where('MAIL="'.$MAIL.'"')->getField('ischeck');
				//dump($BUREAU);
				//dump($ISEXAM);
				//dump($PASSWORD);
				//$PASSWORD = $User->where('UID="'.$PASSWORD.'"')->find();
				if($USERNAME){
					//如果有值的话
					if($PASSWORD==$PASSWORD_TEMP){
						
						if($ISADMIN){
							$this->redirect('/System/Index');//如果是管理员  跳转到管理员界面
						}
							if($STATUS){
										if($ISBUREAU){
										//如果是人事局的话	
											//$this->redirect('/Admin/Home');	
													if($ISREGISTER){
														
																		if($ISCHECK){
																				$this->redirect('/Admin/Home');
																	}else{
																		$this->redirect('Exam/index');//跳转到等待验证界面
														}
															
														
													}else{
														$this->redirect('/Admin/Register');
													}
											
											}else{
												
											}
											
											//企业用户
												if($ISREGISTER){
											if($ISEXAM){
															$this->redirect('Home/index');//跳转到主界面
													}else{
														$this->redirect('Exam/index');//跳转到等待验证界面
															}
													
											}else{
												$this->redirect('Company/index');//跳转到公司注册界面
											}
								}else{
									$this->error("您的邮箱尚未激活");
								}			
					}else{
						//$this->success("123");
						$this->error("密码输入错误");
					}		
				}else{
					$this->error("用户名不存在");
				}
        
		
 }

	
				
				
		
	}
	

}


?>