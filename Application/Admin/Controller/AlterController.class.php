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
		$ID=I('post.ID','','htmlspecialchars'); //��ȡID
		$JOBNAME=I('post.JOBNAME','','htmlspecialchars'); //��������
		$DUTY=I('post.DUTY','','htmlspecialchars'); //��λְ��
		$REQUIREMENTS=I('post.REQUIREMENTS','','htmlspecialchars'); //��ְҪ��
		$SALARY=I('post.SALARY','','htmlspecialchars'); //����нˮ
		$DEGREE=I('post.DEGREE','','htmlspecialchars'); //���ѧ��
		$EXPERIENCE=I('post.EXPERIENCE','','htmlspecialchars'); //��������
		//$DESCRIPTION=I('post.DESCRIPTION','','htmlspecialchars'); //ְλ����
		$KEYWORD=I('post.KEYWORD','','htmlspecialchars'); //�ؼ���
		$SCHOOL=I('post.SCHOOL','','htmlspecialchars'); //�ؼ���
		
		$User= M('Position');
		$data['JOBNAME']=$JOBNAME;//���� ��˾����
		$data['DESCRIPTION']=$DESCRIPTION;
		$data['DUTY']=$DUTY;
		$data['REQUIREMENTS']=$REQUIREMENTS;	
		$data['KEYWORD']=$KEYWORD;
		$data['SALARY']=$SALARY;
		$data['DEGREE']=$DEGREE;
		$data['EXPERIENCE']=$EXPERIENCE;
		$data['SCHOOL']=$SCHOOL;
		$User->where('PID="'.$ID.'"')->save($data);
		$this->success("�޸ĳɹ�");		
		
	
	
}

}