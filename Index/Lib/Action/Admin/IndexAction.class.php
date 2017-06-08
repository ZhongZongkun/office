<?php 
//后台模块
class IndexAction extends AdminAction{
	public function zzk()
	{
		$re=M('img')->select();
		$result=$this->my_sort($re,'time',SORT_ASC,SORT_STRING);
		print_r($re);
	}

	//显示会议列表
	public function index(){
		$huiyi=M('huiyi')->order('time desc')->select();
		$this->assign('huiyi',$huiyi);
		$this->display();
	}

	//显示pdf的截图
	public function info(){
		$id=I('id');
		$re=M('yiti')->find($id);
		$imgdir=$re['imagedir'];
		$con=$re['imagecount'];
		for($i=0;$i<$con;$i++)
		{
			if($con==1){
				$imgarr[$i]['img']='__PUBLIC__/../uploads/'.$imgdir.'/pdf.png';
			}else{
				$imgarr[$i]['img']='__PUBLIC__/../uploads/'.$imgdir.'/pdf-'.$i.'.png';
			}
		}
		$this->assign('imgarr',$imgarr);
		$this->display();
	}

	//添加会议名称
	public function addhuiyi(){
		if(!$_POST||$_SESSION['level']!=1)
			$this->error("页面不存在");
		$huiyi=M('huiyi');
		$data['huiyiname']=trim(I('huiyiname'));
		if($data['huiyiname']==null||$data['huiyiname']==''){
			$this->error('会议名称不能为空');
		}
		if($huiyi->where($data)->find()){
			$this->error('该会议已经存在会议列表，请勿重复添加');
		}
		$data['time']=time();
		$re=$huiyi->add($data);
		if($re){
			$this->success('会议添加成功');
		}else{
			$this->error('会议添加失败');
		}
	}

	//上传文件
	public function add_file(){
		if(!IS_POST) halt('页面不存在');
		import('ORG.Net.UploadFile');
	    $upload = new UploadFile();// 实例化上传类
	    $upload->allowExts  = '';// 设置附件上传类型
	    $upload->savePath =  './uploads/';// 设置附件上传目录
	    $upload->savename = time();
	    $yitiid=I('yitiid');
	    if(!$upload->upload()) {// 上传错误提示错误信息
	        $this->error($upload->getErrorMsg());
	    }else{// 上传成功
	    	$info = $upload->getUploadFileInfo();
	    	$myfile['yitiid']=$yitiid;
	    	$myfile['huiyiid']=I('huiyiid1');
	    	$myfile['filename']=$info[0]['name'];
	    	$myfile['file']=$info[0]['savepath'].$info[0]['savename'];
	    	$myfile['time']=time();
	    	$re=M('file')->add($myfile);	        
	    }
	}

	//添加议题信息
	public function addyiti(){
		if(!IS_POST)
			$this->error('页面不存在');
		$data['huiyiid']=I('huiyiid');
		$data['xuhao']=I('xuhao');
		$data['yitiname']=I('yitiname');
		$data['tiyiren']=I('tiyiren');
		$data['huibaodanwei']=I('huibaodanwei');
		$data['huibaoren']=I('huibaoren');
		$data['liexidanwei']=I('liexidanwei');
		$data['liexiren']=I('liexiren');
		$a=M('yiti')->add($data);
		$_SESSION['yitiid']=$a;
	}
	//动态显示已经上传文件信息
	public function show_upload_files(){
		$huiyiid=I('huiyiid');
		$yitiid=I('yitiid');
		$re=M('file')->where(array('huiyiid'=>$huiyiid,'yitiid'=>$yitiid))->select();
		$img=M('img')->where(array('huiyiid'=>$huiyiid,'yitiid'=>$yitiid))->order('ord')->select();
		if($re==null && $img ==null){
			die;
		}
		if($re==null)
		{
			$this->ajaxreturn($img);
		}
		if($img==null)
		{
			$this->ajaxreturn($re);
		}
		if($re!=null && $img !=null){
			$result = array_merge($re,$img);
			$result=$this->my_sort($result,'time',SORT_ASC,SORT_STRING);
			$this->ajaxreturn($result);
		}
	}

	//ajax添加会议id
	public function show_huiyiid(){
		$id=$_POST['id'];
		$peoples=M('huiyi');
        $people=$peoples->where(array('id'=>$id))->select();
        $people1=M('yiti')->where(array('huiyiid'=>$id))->select();
        $ok=array_merge($people,$people1);
        if($people1==null){
        	$ok=$people;
        }
        $this->ajaxreturn($ok);
	}
	//ajax获取所有议题相关文件
	public function show_files(){
		$huiyiid=I('huiyiid');
		$yitiid=I('yitiid');
		$re=M('file')->where(array('huiyiid'=>$huiyiid,'yitiid'=>$yitiid))->select();
		$img=M('img')->where(array('huiyiid'=>$huiyiid,'yitiid'=>$yitiid))->order('ord')->select();
		if($re==null && $img ==null){
			die;
		}
		if($re==null)
		{
			$this->ajaxreturn($img);
		}
		if($img==null)
		{
			$this->ajaxreturn($re);
		}
		if($re!=null && $img !=null){
			$result = array_merge($re,$img);
			$this->ajaxreturn($result);
		}
	}
	//ajax获取议题id
	public function show_yitiid(){
        $people[0]['yitiid']=$_SESSION['yitiid'];
        unset($_SESSION['users_user_id']);
        $this->ajaxreturn($people);
	}
	//获取会议名称
	public function show_huiyiname(){
		if(!IS_POST){	
			$this->error('页面不存在');
			die;
		}
		$id=I('id');
		$huiyi=M('huiyi')->where(array('id'=>$id))->select();
		$this->ajaxreturn($huiyi);
	}
	//会议名称修改
	public function huiyixiugai(){
		if(!IS_POST){	
			$this->error('页面不存在');
			die;
		}
		$id=I('huiyixiugaiid');
		$data['huiyiname']=I('newhuiyi');
		M('huiyi')->where(array('id'=>$id))->save($data)?$this->success('修改成功'):$this->error('修改失败');
	}
	//修改议题获取议题信息
	public function show_yitiinfo(){
		if(!IS_POST){	
			$this->error('页面不存在');
			die;
		}
		$id=I('id');
		$re=M('yiti')->find($id);
		$this->ajaxreturn($re);
	}
	//修改议题内容
	public function chang_yitiinfo(){
		if(!IS_POST){	
			$this->error('页面不存在');
			die;
		}
		$data['id']=I('id');
		$data['yitiname']=I('yitiname');
		$data['xuhao']=I('xuhao');
		$data['tiyiren']=I('tiyiren');
		$data['huibaodanwei']=I('huibaodanwei');
		$data['huibaoren']=I('huibaoren');
		$data['liexidanwei']=I('liexidanwei');
		$data['liexiren']=I('liexiren');
		$re=M('yiti')->save($data);
		if($re){
			$r[0]['info']='success';
		}else{
			$r[0]['info']='error';
		}
		$this->ajaxreturn($r);
	}

	//获取文件排序并合并
	public function file_hebing(){
		if(!IS_POST)
			$this->error('页面不存在');
		$name=time();
		mkdir('D:wamp/www/office1/uploads/'.$name);
		$result['id']=I('yitiid');
		$result['imagedir']=$name;
		$result['pdf']=$name;
		M('yiti')->save($result);
		$file=trim(I('files'));

		$imgs=trim(I('imgs'));
		$this->img_order($imgs,I('yitiid'));

		$arr=explode(" ", $file);
		$files=M('file');
		$number = 0;
		for($i=0;$i<count($arr);$i++){
			sleep(1);
			$re=$files->find($arr[$i]);
			//get_zip_originalsize('D:wamp/www/images.zip','D:wamp/www/123/');
			// mkdir('D:wamp/www/'.$time);
	  //   	$number = copydir('d:/wamp/www/123', 'D:wamp/www/'.$time.'/' , 0);
	  //   	deldir('d:/wamp/www/123');
	  //   	var_dump($number);
			$filename = explode("/", $re['file']);
			$tempdir = time();
			$data['id'] = $arr[$i];
			$data['filepdf'] = $tempdir.$i;
			$files->save($data);
			get_zip_originalsize('D:wamp/www/office1/uploads/'.$filename[2],'D:wamp/www/office1/uploads/'.$tempdir.$i.'/');
			$number = copydir('D:wamp/www/office1/uploads/'.$tempdir.$i, 'D:wamp/www/office1/uploads/'.$name.'/' , $number);
			deldir('D:wamp/www/office1/uploads/'.$tempdir.$i);
		}
		$result['imagedir']=$name;
		$result['imagecount']=$number;
		M('yiti')->save($result);
		//mkdir('d:/wamp/www/office1/uploads/'.$name);		
		
	}

	//修改议题信息
	public function xiuhebing(){
		if(!IS_POST)
			$this->error('页面不存在');
		$data['id']=I('yitiid');
		$data['yitiname']=I('yitiname');
		$data['xuhao']=I('xuhao');
		$data['tiyiren']=I('tiyiren');
		$data['huibaodanwei']=I('huibaodanwei');
		$data['huibaoren']=I('huibaoren');
		$data['liexidanwei']=I('liexidanwei');
		$data['liexiren']=I('liexiren');
		$re=M('yiti')->save($data);
		$xiuyiti=I('yitiid');
		$xiuhui=I('huiyiid');
		$file=trim(I('files'));

		$imgs=trim(I('imgs'));
		if($imgs!=null)
		{
			$this->xiu_img_order($imgs,I('yitiid'));
		}

		if($file==null||$file==''){
			die;
		}
		$name=time();
		mkdir('D:wamp/www/office1/uploads/'.$name);
		$result['id']=I('yitiid');
		$result['pdf']=$name;
		$result['imagedir']=$name;
		$yuanpdf=M('yiti')->find($result['id']);
		if($yuanpdf['imagedir'] != null || $yuanpdf['imagedir'] !=''){
			deldir("d:/wamp/www/office1/uploads/".$yuanpdf['imagedir']);
		}
		
		M('yiti')->save($result);

		$arr=explode(" ", $file);
		$files=M('file');
		$number = 0;
		for($i=0;$i<count($arr);$i++){
			sleep(1);
			$re=$files->find($arr[$i]);
			$filename = explode("/", $re['file']);
			$tempdir = time();
			$data['id'] = $arr[$i];
			$data['filepdf'] = $tempdir.$i;
			$files->save($data);
			get_zip_originalsize('D:wamp/www/office1/uploads/'.$filename[2],'D:wamp/www/office1/uploads/'.$tempdir.$i.'/');
			$number = copydir('D:wamp/www/office1/uploads/'.$tempdir.$i, 'D:wamp/www/office1/uploads/'.$name.'/' , $number);
			deldir('D:wamp/www/office1/uploads/'.$tempdir.$i);
		}
		$result['imagedir']=$name;
		$result['imagecount']=$number;
		M('yiti')->save($result);	
		
	}

	//删除会议
	public function dehuiyi(){
		$huiyiid=I('id');
		$file=M('file');
		$huiyifile=$file->where(array('huiyiid'=>$huiyiid))->select();
		if($huiyifile!=null){
			for($i=0;$i<count($huiyifile);$i++){
				unlink($huiyifile[$i]['file']);
				unlink("./uploads/".$huiyifile[$i]['filepdf']);
				unlink("./uploads/".$huiyifile[$i]['filename']);
			}
		}
		$file->where(array('huiyiid'=>$huiyiid))->delete();

		$imgs=M('img');
		$huiyiimgs=$imgs->where(array('huiyiid'=>$huiyiid))->select();
		if($huiyiimgs!=null){
			for($i=0;$i<count($huiyiimgs);$i++){
				unlink($huiyiimgs[$i]['file']);
				unlink($huiyiimgs[$i]['file']);
			}
		}
		$imgs->where(array('huiyiid'=>$huiyiid))->delete();

		$yiti=M('yiti');
		$yitifile=$yiti->where(array('huiyiid'=>$huiyiid))->select();
		if($yitifile!=null){
			for($i=0;$i<count($yitifile);$i++){
				unlink("./uploads/".$yitifile[$i]['pdf']);
				if($yitifile[$i]['imagedir']!=null||$yitifile[$i]['imagedir']!='')
				{
					deldir('d:/wamp/www/office1/uploads/'.$yitifile[$i]['imagedir']);

				}
			}
		}
		$yiti->where(array('huiyiid'=>$huiyiid))->delete();
		$huiyi=M('huiyi');
		$r=$huiyi->delete($huiyiid);
		if($r){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	//删除议题
	public function deyiti(){
		$yitiid=I('id');
		$file=M('file');
		$yitifile=$file->where(array('yitiid'=>$yitiid))->select();
		if($yitifile!=null){
			for($i=0;$i<count($yitifile);$i++){
				unlink($yitifile[$i]['file']);
				unlink("./uploads/".$yitifile[$i]['filepdf']);
				unlink("./uploads/".$yitifile[$i]['filename']);
			}
		}
		$file->where(array('yitiid'=>$yitiid))->delete();

		$imgs=M('img');
		$huiyiimgs=$imgs->where(array('yitiid'=>$yitiid))->select();
		if($huiyiimgs!=null){
			for($i=0;$i<count($huiyiimgs);$i++){
				unlink($huiyiimgs[$i]['file']);			}
		}
		$imgs->where(array('yitiid'=>$yitiid))->delete();

		$re=M('yiti')->find($yitiid);
		unlink("./uploads/".$re['pdf']);
		if($re['imagedir'] != null || $re['imagedir'] != '')
		{
			deldir('d:/wamp/www/office1/uploads/'.$re['imagedir']);
		}
		$r=M('yiti')->delete($yitiid);
		if($r){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}

	}



	//多文件上传
	public function file_upload()
    {
		$File = $_FILES['file'];
		$i=0;
		foreach( $File['name'] as $Key => $FileName ) {
			$i++;
			$FileNames = $FileName; //上传的文件名
			$FileTypes = $File['type'][$Key];//上传的文件类型
			$FileSize  = $File['size'][$Key];//上传的文件大小
			$FileTmps  = $File['tmp_name'][$Key]; //上传的文件副本
			$arr = explode(".",$FileNames);
			$typearr = explode("/",$FileTypes);
			$filesavename = time().$i.".".$arr[1];
			$result = move_uploaded_file($FileTmps,"d:/wamp/www/office1/uploads/".$filesavename);
			if($result)
			{
				if($typearr[0] == "image")
				{
					$myfile['yitiid']=I('yitiid');
			    	$myfile['huiyiid']=I('huiyiid1');
			    	$myfile['filename']=$FileNames;
			    	$myfile['file']="./uploads/".$filesavename;
			    	$myfile['time']=time();
			    	$myfile['yong']=0;
			    	$re=M('img')->add($myfile);
				}else
				{
					$myfile['yitiid']=I('yitiid');
			    	$myfile['huiyiid']=I('huiyiid1');
			    	$myfile['filename']=$FileNames;
			    	$myfile['file']="./uploads/".$filesavename;
			    	$myfile['time']=time();
			    	$re=M('file')->add($myfile);
				}
				
			}
		}

    }
	//多图片排序
	public function img_order($imgs,$yitiid)
	{
		$img_arr=explode(" ",$imgs);
		for($i=0;$i<count($img_arr);$i++)
		{
			$data['yitiid']=$yitiid;
			$data['id']=$img_arr[$i];
			$re=M('img')->where($data)->find();
			$re['ord']=$i;
			$re['yong']=1;
			M('img')->save($re);
		}
	}
	//多图片修改排序
	public function xiu_img_order($imgs,$yitiid)
	{
		if($imgs ==null || $imgs =='')
		{
			return;
		}
		$data['yitiid']=$yitiid;
		$yuan = M('img')->where($data)->select();
		for($j=0;$j<count($yuan);$j++)
		{
			$yuan[$j]['ord']='';
			$yuan[$j]['yong']=0;
			M('img')->save($yuan[$j]);
		}
		$img_arr=explode(" ",$imgs);
		for($i=0;$i<count($img_arr);$i++)
		{
			$data['yitiid']=$yitiid;
			$data['id']=$img_arr[$i];
			$re=M('img')->where($data)->find();
			$re['ord']=$i;
			$re['yong']=1;
			M('img')->save($re);
		}
	}
	//对数组进行排序
	public function my_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC )
	{   
        if(is_array($arrays)){   
            foreach ($arrays as $array){   
                if(is_array($array)){   
                    $key_arrays[] = $array[$sort_key];   
                }else{   
                    return false;   
                }   
            }   
        }else{   
            return false;   
        }  
        array_multisort($key_arrays,$sort_order,$sort_type,$arrays);   
        return $arrays;   
    }


		 public function testzip()
    {
    	$size = get_zip_originalsize('D:wamp/www/images.zip','D:wamp/www/123/');
    	$time=time();
    	mkdir('D:wamp/www/'.$time);
    	$number = copydir('d:/wamp/www/123', 'D:wamp/www/'.$time.'/' , 0);
    	deldir('d:/wamp/www/123');
    	var_dump($number);
    }


}



 ?>