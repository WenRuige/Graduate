<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$USERNAME=session('USERNAME');
		$this->assign('name',$USERNAME);
	$this->display();
	}
}