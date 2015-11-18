<?php
namespace Admin\Controller;
use Think\Controller;
class HomeController extends Controller {
    public function index(){
		$USERNAME=session('USERNAME');
		$this->assign('name',$USERNAME);
	$this->display();
	}
}