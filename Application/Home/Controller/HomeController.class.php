<?php
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller {
public function index(){
	$USERNAME=session('USERNAME');
	$User=M("Company");
	$list =$User->query("select *from event_company where MAIL='$USERNAME'");
	//dump($list);
	$this->assign('name',$USERNAME);
	$this->assign('list',$list);

	$this->display();
}

}