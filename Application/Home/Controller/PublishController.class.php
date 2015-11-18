<?php
namespace Home\Controller;
use Think\Controller;
class PublishController extends Controller {
	public function index(){
		$USERNAME=session('USERNAME');
		$this->assign('name',$USERNAME);
		$this->display();
		
	}
	public function publish(){
		
		$JOBNAME = I('post.JOBNAME','','htmlspecialchars'); //工作名称
		$CLASSIFICATION = I('post.CLASSIFICATION','','htmlspecialchars');
		$WORKPLACE = I('post.WORKPLACE','','htmlspecialchars'); //工作地点
		$html = $_POST['html'];
		$REQUIREMENTS = I('post.REQUIREMENTS','','htmlspecialchars'); //任职要求
		$SALARY = I('post.SALARY','','htmlspecialchars'); //工作薪水
		$DEGREE = I('post.DEGREE','','htmlspecialchars'); //最低学历
		$EXPERIENCE = I('post.EXPERIENCE','','htmlspecialchars'); //工作经验
	
		$KEYWORD = I('post.KEYWORD','','htmlspecialchars'); //关键字
		$SCHOOL = I('post.SCHOOL','','htmlspecialchars'); //关键字
		$USERNAME = session('USERNAME');
		
		$User = M('Company');
		$CID = $User->where('MAIL="'.$USERNAME.'"')->getField('cid');
		$Data = M('Position');
		$data['CID'] = $CID;//存入cid的值
		$data['JOBNAME'] = $JOBNAME;//存入 公司名称
		$data['CLASSIFICATION'] = $CLASSIFICATION;//存入  分类
		$data['DESCRIPTION'] = $DESCRIPTION;
		$data['WORKPLACE'] = $WORKPLACE;
		$data['REQUIREMENTS'] = $html;	
		$data['KEYWORD'] = $KEYWORD;
		$data['SALARY'] = $SALARY;
		$data['DEGREE'] = $DEGREE;
		$data['EXPERIENCE'] = $EXPERIENCE;
		$data['SCHOOL'] = $SCHOOL;
		$data['DATELINE'] = date("Y-m-d h:m:s");
		$data['MAIL'] = $USERNAME;
		$Data->add($data);
		$this->success("发布成功");
		/*dump($CID);
		dump($USERNAME);
		
		dump($JOBNAME);
		dump($DUTY);
		dump($REQUIREMENTS);
		dump($SALARY);
		dump($DEGREE);
		dump($EXPERIENCE);
		dump($DESCRIPTION);
		dump($KEYWORD);
		*/
		echo $html;
		
		
		
	}
	
	
}