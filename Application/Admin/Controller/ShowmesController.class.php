<?php
namespace Admin\Controller;
use Think\Controller;
class ShowmesController extends Controller {
public function index($id=0){
	
	$Data =M('Message');
	$list=$Data->query("select *from event_message where MID='$id'");
	$pic=$Data->query("select PICTURE from event_message where MID='$id'");
	//echo $pic;
			$str =explode("|",$pic[0]["picture"]);
			//dump($str);
	$this->assign('str',$str);		
	$this->assign('list',$list);
	$USERNAME=session('USERNAME');
		$this->assign('name',$USERNAME);
	
	$this->display();
}

}