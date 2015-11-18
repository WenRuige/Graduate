<?php
namespace Admin\Controller;
use Think\Controller;
class AltermesController extends Controller {
public function index($id=0){
	//dump($id);
	$User=M('Message');
	$list =$User->query("select *from event_message where MID=$id");
	$pic=$User->query("select PICTURE from event_message where MID='$id'");
	$this->assign('pic',$pic[0]["picture"]);
	$this->assign('list',$list);
	$USERNAME=session('USERNAME');
		$this->assign('name',$USERNAME);
		//dump($id);
	$this->display();
}
	public function alter(){
		$MID=I('post.MID','','htmlspecialchars'); //获取ID
		$TITLE=I('post.TITLE','','htmlspecialchars'); //获取标题
		$CONTENT=I('post.CONTENT','','htmlspecialchars'); //获取内容
		$PIC=I('post.PIC','','htmlspecialchars'); //获取内容
		//$PICTURE=I('post.PICTURE','','htmlspecialchars'); //获取内容
		$upload = new \Think\Upload();// 实例化上传类
			$upload->maxSize   =     3145728 ;// 设置附件上传大小
			$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
			$upload->rootPath  =      './Uploads/'; // 设置附件上传根目录
			$upload->savePath  =      ''; // 设置附件上传（子）目录
			// 上传文件 
			$info   =   $upload->upload();
			//dump($info);
			if(!$info) {// 上传错误提示错误信息
			//    $this->error($upload->getError());
			}else{// 上传成功 获取上传文件信息
				foreach($info as $file){
					$pic.=$file['savepath'].$file['savename'].'|';
				}
			}
			 $pic=substr($pic,0,strlen($pic)-1);
		
				$name1=$_FILES['photo1']['name'];
				$name2=$_FILES['photo2']['name'];
				$name3=$_FILES['photo3']['name'];
		
				$User=M('Message');
				$data['TITLE']=$TITLE;
				$data['CONTENT']=$CONTENT;
				if($name1!=''||$name2!=''||$name3!=''){
					
					$data['PICTURE']=$pic;
				}else{
				}
				//dump($MID);
				//dump($TITLE);
				//dump($CONTENT);
				$User->where('MID="'.$MID.'"')->save($data);
				$this->success("修改成功");	
	}

}