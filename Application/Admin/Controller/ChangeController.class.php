<?php
namespace Admin\Controller;
use Think\Controller;
class ChangeController extends Controller {
public function index(){
	$USERNAME=session('USERNAME');
		$this->assign('name',$USERNAME);
	$this->display();
}
public function change(){
	$ORIGINAL=I('post.ORIGINAL','','htmlspecialchars'); //获取原密码
	$PASSWORD=I('post.PASSWORD','','htmlspecialchars'); //获取新密码
	$REPASSWORD=I('post.REPASSWORD','','htmlspecialchars'); //重复新密码
	$USERNAME=session('USERNAME');
	$User=M('User');
	$PASSWORD_TEMP=$User->where('UID="'.$USERNAME.'"')->getField('password');
	if($PASSWORD_TEMP!=$ORIGINAL){
		$this->error("原密码不同");
	}else{
	if($PASSWORD!=$REPASSWORD){
		$this->error("两次输入的密码不一致");
	}else{
		$data['PASSWORD']=$PASSWORD;
		$User->where('UID="'.$USERNAME.'"')->save($data);
		$this->success("修改成功");
		
	}
		
	}
	//dump($PASSWORD);
	//dump($USERNAME);
	//dump($ORIGINAL);
	//dump($PASSWORD);
	//dump($REPASSWORD);
	
}

}