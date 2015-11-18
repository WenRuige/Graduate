<?php
namespace Home\Controller;
use Think\Controller;
class AltercomController extends Controller {
public function index(){
	$USERNAME=session('USERNAME');
	
		$this->assign('name',$USERNAME);
	$User=M('Company');
	$list =$User->query("select *from event_company where MAIL='$USERNAME'");
	$this->assign('list',$list);
	
$this->display();	
}
public function alter(){
		$USERNAME=session('USERNAME');
		$CNAME=I('post.CNAME','','htmlspecialchars'); //公司名称
		$ADDRESS=I('post.ADDRESS','','htmlspecialchars'); //公司地址
		$FIELD=I('post.FIELD','','htmlspecialchars'); //公司领域
		$SCALE=I('post.SCALE','','htmlspecialchars'); //公司规模
		$HOMEPAGE=I('post.HOMEPAGE','','htmlspecialchars'); //公司主页
		$CMAIL=I('post.CMAIL','','htmlspecialchars'); //招聘邮箱
		$LANDLINE=I('post.LANDLINE','','htmlspecialchars'); //固定电话
		$MOBILEPHONE=I('post.MOBILEPHONE','','htmlspecialchars'); //移动电话
		$SUMMARY=I('post.SUMMARY','','htmlspecialchars'); //公司简介
		$REGISTRATIONNUM=I('post.REGISTRATIONNUM','','htmlspecialchars'); //公司简介
		
		$picture = $_POST['picture'];
		
			$Data= M("Company");
			$data['CNAME']=$CNAME;
			$data['LOGO']= $picture;
			$data['ADDRESS']=$ADDRESS;
			$data['SUMMARY']=$SUMMARY;
			$data['FIELD']=$FIELD;
			$data['SCALE']=$SCALE;
			$data['HOMEPAGE']=$HOMEPAGE;
			$data['CMAIL']=$CMAIL;
			$data['LANDLINE']=$LANDLINE;
			$data['MOBILEPHONE']=$MOBILEPHONE;
			$data['REGISTRATIONNUM']=$REGISTRATIONNUM;
			$data['MAIL']=$USERNAME;
		$Data->where('MAIL="'.$USERNAME.'"')->save($data);
		 // $this->success('修改成功', '/Home/Home');
			
		}	
	

}