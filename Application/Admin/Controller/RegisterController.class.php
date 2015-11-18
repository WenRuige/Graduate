<?php
namespace Admin\Controller;
use Think\Controller;
class RegisterController extends Controller {
public function index(){
	$USERNAME=session('USERNAME');
		$this->assign('name',$USERNAME);
	$this->display();
}
	public function register(){
		$USERNAME=session('USERNAME');
		$BNAME=I('post.BNAME','','htmlspecialchars'); //人事局名称
		$LANDLINE=I('post.LANDLINE','','htmlspecialchars'); //固定电话
		$ADDRESS=I('post.ADDRESS','','htmlspecialchars'); //详细地址
		
	$User =M('Bureau');
	$data['MAIL']=$USERNAME;
	$data['LANDLINE']=$LANDLINE;
	$data['BNAME']=$BNAME;
	$data['ADDRESS']=$ADDRESS;
	$User->add($data);
	$Data =M('User');
	$data['ISREGISTER']=1;
	$Data->where('UID="'.$USERNAME.'"')->save($data);
	//注册成功
	$this->success('注册成功,请等待审核','/Home/Exam');
		
		
		//dump($USERNAME);
		//dump($LANDLINE);
	}
}