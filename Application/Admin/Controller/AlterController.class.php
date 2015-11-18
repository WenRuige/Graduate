<?php
namespace Admin\Controller;
use Think\Controller;
class AlterController extends Controller {
public function index($id=0){
	$User=M('Position');
	$list =$User->query("select *from event_position where PID=$id");
	$this->assign('list',$list);
	$USERNAME=session('USERNAME');
		$this->assign('name',$USERNAME);
		//dump($id);
	$this->display();
	
}
public function alter(){
		$ID=I('post.ID','','htmlspecialchars'); //获取ID
		$JOBNAME=I('post.JOBNAME','','htmlspecialchars'); //工作名称
		$DUTY=I('post.DUTY','','htmlspecialchars'); //岗位职责
		$REQUIREMENTS=I('post.REQUIREMENTS','','htmlspecialchars'); //任职要求
		$SALARY=I('post.SALARY','','htmlspecialchars'); //工作薪水
		$DEGREE=I('post.DEGREE','','htmlspecialchars'); //最低学历
		$EXPERIENCE=I('post.EXPERIENCE','','htmlspecialchars'); //工作经验
		//$DESCRIPTION=I('post.DESCRIPTION','','htmlspecialchars'); //职位描述
		$KEYWORD=I('post.KEYWORD','','htmlspecialchars'); //关键字
		$SCHOOL=I('post.SCHOOL','','htmlspecialchars'); //关键字
		
		$User= M('Position');
		$data['JOBNAME']=$JOBNAME;//存入 公司名称
		$data['DESCRIPTION']=$DESCRIPTION;
		$data['DUTY']=$DUTY;
		$data['REQUIREMENTS']=$REQUIREMENTS;	
		$data['KEYWORD']=$KEYWORD;
		$data['SALARY']=$SALARY;
		$data['DEGREE']=$DEGREE;
		$data['EXPERIENCE']=$EXPERIENCE;
		$data['SCHOOL']=$SCHOOL;
		$User->where('PID="'.$ID.'"')->save($data);
		$this->success("修改成功");		
		
	
	
}

}