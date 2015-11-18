<?php
namespace System\Controller;
use Think\Controller;
class ShowcomController extends Controller {
public function index($id=0){
	$Data =M('Company');
	$list=$Data->query("select * from event_company where CID=$id");
	//dump($list);
	$this->assign('list',$list);
	$this->display();
	
}}