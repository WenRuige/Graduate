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
	$ORIGINAL=I('post.ORIGINAL','','htmlspecialchars'); //��ȡԭ����
	$PASSWORD=I('post.PASSWORD','','htmlspecialchars'); //��ȡ������
	$REPASSWORD=I('post.REPASSWORD','','htmlspecialchars'); //�ظ�������
	$USERNAME=session('USERNAME');
	$User=M('User');
	$PASSWORD_TEMP=$User->where('UID="'.$USERNAME.'"')->getField('password');
	if($PASSWORD_TEMP!=$ORIGINAL){
		$this->error("ԭ���벻ͬ");
	}else{
	if($PASSWORD!=$REPASSWORD){
		$this->error("������������벻һ��");
	}else{
		$data['PASSWORD']=$PASSWORD;
		$User->where('UID="'.$USERNAME.'"')->save($data);
		$this->success("�޸ĳɹ�");
		
	}
		
	}
	//dump($PASSWORD);
	//dump($USERNAME);
	//dump($ORIGINAL);
	//dump($PASSWORD);
	//dump($REPASSWORD);
	
}

}