<?php
namespace Home\Controller;
use Think\Controller;
class ExamController extends Controller {
    public function index(){
		$USERNAME=session('USERNAME');
		$this->assign('name',$USERNAME);
		$this->display();
    }
}