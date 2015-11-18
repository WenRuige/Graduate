<?php
namespace Home\Controller;
use Think\Controller;
class ShowController extends Controller {
public function index($id=0){
	$USERNAME=session('USERNAME');
	
		$this->assign('name',$USERNAME);
	$User=M("Position");
	$list =$User->query("select *from event_position where PID=$id");
	//dump($list);
	//dump($list);
	
	$Data =M('Company');
	$company=$Data->query("select *from event_company where MAIL='$USERNAME'");
	$this->assign('company',$company);
	$this->assign('list',$list);
	$this->display();
	
}

}