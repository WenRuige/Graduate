<?php
namespace Admin\Controller;
use Think\Controller;
class AddmesController extends Controller {
public function index(){
	$USERNAME=session('USERNAME');
		$this->assign('name',$USERNAME);
$this->display();

}
	public  function add(){

				$name1=$_FILES['photo1']['name'];
				$name2=$_FILES['photo2']['name'];
				$name3=$_FILES['photo3']['name'];
			$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
			$upload->savePath  =      ''; // 设置附件上传（子）目录
			// 上传文件 
			$info   =   $upload->upload();
			//print_r($info);
			if(!$info) {// 上传错误提示错误信息
				if($name1!=''||$name2!=''||$name3!=''){
			    $this->error($upload->getError());
				}
			}else{// 上传成功 获取上传文件信息
				foreach($info as $file){
					$pic.=$file['savepath'].$file['savename'].'|';
				}
			}
			
		$TITLE=I('post.TITLE','','htmlspecialchars'); //标题
				$CONTENT=I('post.CONTENT','','htmlspecialchars'); //内容
				$USERNAME=session('USERNAME');
		 $pic=substr($pic,0,strlen($pic)-1);
		//dump($pic);		 
		$User =M('Message');
		$data['TITLE']=$TITLE;
		$data['CONTENT']=$CONTENT;
		$data['PICTURE']=$pic;
		$data['MAIL']=$USERNAME;
		$data['TIME']=date("Y-m-d");
		$User->add($data);
		$this->success("添加成功");
	//	dump($TITLE);
		//dump($CONTENT);
		//dump($pic);
		
		
	}
}