<?php
namespace Home\Controller;
use Think\Controller;
class PasswordController extends Controller {
	public function index(){
		$USERNAME=cookie('USERNAME');
		//dump($USERNAME);
		
		$this->assign('name',$USERNAME);
	
		$this->assign('list',$USERNAME);
		$this->display();
	}
	public function check($CODE=""){
		$TOKEN = cookie('TOKEN');
		$TOKEN_EXPTIME=cookie('TOKEN_EXPTIME');//获取存到cookie里面的过期时间
		$USERNAME=cookie('USERNAME');
		if($TOKEN_EXPTIME>0){
				if($CODE!=$TOKEN){
					$this->error("验证码不相同");
				}else{
						$this->redirect('Password/index');  // 跳转到  公司注册界面
				}
		}else{
		$this->error("对不起时间已经过期，请重新注册");
		}
		
		
	}
	public function forget(){
		$PASSWORD=I('post.PASSWORD','','htmlspecialchars'); //进行 htmlspecialchars 过滤  防止 执行代码
		$REPASSOWRD=I('post.REPASSWORD','','htmlspecialchars'); //进行 htmlspecialchars 过滤  防止 执行代码
		$USERNAME=cookie('USERNAME');
		if($PASSWORD!=$REPASSOWRD){
			$this->error("两次输入的密码不一致");
		}else{
			$User= M("User");
			$data['PASSWORD']=$PASSWORD;
			$User->where('UID="'.$USERNAME.'"')->save($data); // 根据条件更新记录
			$this->success("更改密码成功");
			//$User->add($data);
		}
		
	}
}


?>