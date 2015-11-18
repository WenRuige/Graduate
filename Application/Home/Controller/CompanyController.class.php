<?php
namespace Home\Controller;
use Think\Controller;
class CompanyController extends Controller {
    public function index(){
		$USERNAME=session('USERNAME');
		
		$value = session('name');
		
		// dump($_FILES);
		// dump($_SESSION);
		$this->assign('name',$USERNAME);
		$this->display();
    }
	public function handle(){

		$MAIL = session('USERNAME');
		
		$CNAME = I('post.CNAME','','htmlspecialchars'); //公司名称
		$ADDRESS = I('post.ADDRESS','','htmlspecialchars'); //公司地址
		$FIELD = I('post.FIELD','','htmlspecialchars'); //公司领域
		$SCALE = I('post.SCALE','','htmlspecialchars'); //公司规模
		$HOMEPAGE = I('post.HOMEPAGE','','htmlspecialchars'); //公司主页
		$CMAIL = I('post.CMAIL','','htmlspecialchars'); //招聘邮箱
		$LANDLINE = I('post.LANDLINE','','htmlspecialchars'); //固定电话
		$MOBILEPHONE = I('post.MOBILEPHONE','','htmlspecialchars'); //移动电话
		$SUMMARY = I('post.SUMMARY','','htmlspecialchars'); //公司简介
		$REGISTRATIONNUM = I('post.REGISTRATIONNUM','','htmlspecialchars'); //公司简介
		$picture = $_POST['picture'];
		
			$Data = M("Company");
			$data['CNAME'] = $CNAME;
			$data['LOGO'] = $picture;
			$data['ADDRESS'] = $ADDRESS;
			$data['SUMMARY'] = $SUMMARY;
			$data['FIELD'] = $FIELD;
			$data['SCALE'] = $SCALE;
			$data['HOMEPAGE'] = $HOMEPAGE;
			$data['CMAIL'] = $CMAIL;
			$data['LANDLINE'] = $LANDLINE;
			$data['MOBILEPHONE'] = $MOBILEPHONE;
			$data['REGISTRATIONNUM'] = $REGISTRATIONNUM;
			$data['MAIL']=$MAIL;
			
			$Data->add($data); 
			$User=M('User');
			$data['ISREGISTER'] = 1;
			$User->where('UID="'.$MAIL.'"')->save($data); //将已经注册按钮至为1
			$this->success("公司注册成功,请等该管理员审核,审核成功将会邮件通知您");
			$this->redirect('Exam/index');
			
	}
}