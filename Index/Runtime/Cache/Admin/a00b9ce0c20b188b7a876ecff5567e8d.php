<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>后台首页</title>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css">
	<script src="__PUBLIC__/js/jquery-2.2.2.min.js"></script>
	<script src="__PUBLIC__/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="" id="styleCss">
	<link rel="stylesheet" href="__PUBLIC__/css/index.css" />
	<style type="text/css">
	.page p {
    float: left;
    margin-left: 10px;
}
.xiufilelist p{
	font-size: 15px!important;
}
.filelist li{
	font-size: 15px!important;
}

</style>
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/scrollable.js"></script>
<script>
	window.onload = function() {
	    reSize();
	    window.onresize = throttle(reSize,300);
	    subForm("boxx","sub-btn","sub-btn-left");
	}
		function subForm(id,btn,btnl) {
			var box = document.getElementById(id);
			var obox = box.children[0];
			var obtn = document.getElementById(btn);
			var obtnl = document.getElementById(btnl);
			obtn.onclick = function() {
				target -= 900;
			}
			obtnl.onclick = function() {
				target += 900;
			}

			var leader = 0, target = 0;
			setInterval(function() {
				leader = leader + (target - leader)/10;
				if (target >= 0) {
					target = 0;
				}else if (target <= -1800) {
					target = -1800;
				};
				obox.style.left = leader + "px";
			},30);
		}
	$(function(){
			//原pdf
			$("#btn-sel-all").on('click',function(){
				$("#src-city option").appendTo("#tar-city");
			});
			$("#btn-sel-none").on('click',function(){
				$("#tar-city option").appendTo("#src-city");
			});
			$("#btn-sel").on('click',function(){
				$("#src-city option:selected").appendTo("#tar-city");
			});
			$("#btn-back").on('click',function(){
				$("#tar-city option:selected").appendTo("#src-city");
			});

			//原img
			$("#img-btn-sel-all").on('click',function(){
				$("#src-yuan-img option").appendTo("#tar-yuan-img");
			});
			$("#img-btn-sel-none").on('click',function(){
				$("#tar-yuan-img option").appendTo("#src-yuan-img");
			});
			$("#img-btn-sel").on('click',function(){
				$("#src-yuan-img option:selected").appendTo("#tar-yuan-img");
			});
			$("#img-btn-back").on('click',function(){
				$("#tar-yuan-img option:selected").appendTo("#src-yuan-img");
			});


			$("#xiubtn-sel").on('click',function(){
				$("#xiusrc-city option:selected").appendTo("#xiutar-city");
			});
			$("#xiubtn-sel-all").on('click',function(){
				$("#xiusrc-city option").appendTo("#xiutar-city");
			});
			$("#xiubtn-sel-none").on('click',function(){
				$("#xiutar-city option").appendTo("#xiusrc-city");
			});
			$("#xiubtn-back").on('click',function(){
				$("#xiutar-city option:selected").appendTo("#xiusrc-city");
			});

			$("#xiubtn-sel-img").on('click',function(){
				$("#xiusrc-city-img option:selected").appendTo("#xiutar-city-img");
			});
			$("#xiubtn-sel-all-img").on('click',function(){
				$("#xiusrc-city-img option").appendTo("#xiutar-city-img");
			});
			$("#xiubtn-sel-none-img").on('click',function(){
				$("#xiutar-city-img option").appendTo("#xiusrc-city-img");
			});
			$("#xiubtn-back-img").on('click',function(){
				$("#xiutar-city-img option:selected").appendTo("#xiusrc-city-img");
			});
	});
	function client() {
		if (window.innerwidth != null) {
			return {
				width:window.innerwidth,
				height:window.innerHeigh
			}
		}
		else if (document.compatMode === "CSS1Compet") {
			return {
				width:document.documentElement.clientWidth,
				Height:document.documentElement.clientHeight
			}
		}
		else {
			return {
				width:document.body.clientWidth,
				height:document.body.clientHeight
			}
		}
	}

	function throttle(fn,delay) {
		var timer = null;
		return function() {
			clearTimeout(timer);
			timer = setTimeout(fn,delay);
		}
	}
	

	function reSize() {
		var clientWidth = client().width;
		if (clientWidth < 1300) {
			styleCss.href = "__PUBLIC__/css/1200px.css";
			document.body.style.background = " #fff";
		}
		else {
			styleCss.href = "__PUBLIC__/css/1200px.css";
			document.body.style.background = "#fff";
		}
		console.log(client().width);
	}

	</script>
</head>
<body>
	<div class="m-header">
	</div>
	<ul id="myTab" class="nav nav-tabs" >
	    <li class="active" style="padding-left: 50%; margin-left: -120px;">
	        <a href="#home" onfocus="this.blur();" data-toggle="tab">
	            新建会议
	        </a>
	    </li>
	  <li><a href="#meeting" onfocus="this.blur();" data-toggle="tab">会议列表</a></li>
	  <!-- <li><a href="#file" onfocus="this.blur();" data-toggle="tab">文件管理</a></li> -->
	</ul>
	<div id="myTabContent" class="tab-content w">
	    <div class="tab-pane fade in active" id="home">
	    	 <div class="page">
				 <h3>温馨提示！<br/><em><br />> 创建好会议主题后，请在会议列表中进行相关设置...</em></h3>  
				 <input type="hidden" id="show_huiyiid" value="<?php echo U('Admin/Index/show_huiyiid');?>" />
				 <form action="<?php echo U('Admin/Index/addhuiyi');?>" method="POST">
				 <span class="tit">
				 	 会议主题：<input type="text" name="huiyiname" /><input type="submit" class="btn  btn-success " style="border-radius: 1px;" value="确定">
				 </span>
				 </form>
	    	</div>
	    </div>
	     <div class="tab-pane fade" id="meeting">
	    	 <table class="table table-condensed" >
	    	 	<?php if(is_array($huiyi)): foreach($huiyi as $key=>$v): ?><tr>
	        			<td style="display:none;"><input type="hidden" class="<?php echo ($v["huiyiname"]); ?>" value="<?php echo ($v["id"]); ?>" /></td>
	        			<td class="tdo"><a data-toggle="modal" data-target="#myModal1" class='show_yiti'><?php echo ($v["huiyiname"]); ?></a></td>
						<td ><?php echo (date('Y-m-d',$v["time"])); ?></td>
						<td>
						<input type="button" class="btn btn-warning" name="huiyixiugai" style="height:36px;font-size:20px; position:relative; left:30px;" data-toggle="modal" data-target=".bs-example-modal-lg"  value="修改" />
						<input type="hidden" value="<?php echo ($v["id"]); ?>" class="xiuhuiyi" />
						</td>
						<td><form action="<?php echo U('Admin/Index/dehuiyi',array('id'=>$v['id']));?>"><input type="submit" class="btn btn-danger" style="height:36px;font-size:20px;" onclick="if (confirm('确定删除此会议吗')) return true;else return false;" value="删除" /></form></td>
	        		</tr><?php endforeach; endif; ?>
			</table>
	    </div>
		<div class="modal fade" id="myModal" style="z-index: 9999;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div style="margin-top: 50px;" >
		    <div class="modal-content" style="width: 95%; max-width:750px; margin: 0 auto;">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel"><span class='admin_title'></span></h4>
		        
		      </div>
		      <div class="modal-body">
		       		 <div class="sub-box" >
					<div id="wizard" style="width:100%;">
						<ul id="status">
							<li class="active"><strong>1.</strong>基本信息</li>
							<li><strong>2.</strong>上传文件</li>
							<li><strong>3.</strong>排序/完成</li>
						</ul>
						<div class="items">
							<div class="page" style="padding: 5px 5px;">
							<input type="hidden" calss="addyiti" value="<?php echo U('Admin/Index/addyiti');?>" />
							<form action="<?php echo U('Admin/Index/addyiti');?>" method="POST" id="yitiform" target="post_frame" >
							<iframe name='post_frame' id="post_frame" style="display:none;" mce_style="display:none;"></iframe> 
							  	 <h3>温馨提示！<br/><em><br />> 请填写基本信息，包括与会人员等...</em></h3>  
							 	<input type="hidden" name="huiyiid" class="huiyiid" value="" />	
				               <p><label>序号</label><input type="text" class="input xuhao" name="xuhao" /></p>
				               <p><label>议题</label><input type="text" class="input yitiname" id="pass" name="yitiname" /></p>
				               <p><label>提议人</label><input type="text" class="input tiyiren" id="pass1" name="tiyiren" /></p>
				               <p><label>汇报单位</label><input type="text" class="input huibaodanwei" id="user" name="huibaodanwei" /></p>
				               <p><label>汇报人</label><input type="text" class="input huibaoren" id="pass" name="huibaoren"  /></p>
				               <p><label>列席单位</label><input type="text" class="input liexidanwei" id="user" name="liexidanwei" /></p>
				               <p><label>列席人</label><input type="text" class="input liexiren" id="pass" name="liexiren" /></p>		
				               <div class="btn_nav">
				                  <input type="button" id="yitiok" class="next right " style="color:#428bca; margin-top:100px; margin-right:40px;"  value="下一步" />
				                  <input type="submit" class="btn btn-success" style="margin-top:100px;margin-left:-20px;" value="提交" id="add_yiti" onclick="if (confirm('确定添加此议题吗')) return true;else return false;" />
				               </div>
				            </form>
				            </div>
							<div class="page" style="padding: 5px 5px;">
							<input type="hidden" id="show_yitiid" value="<?php echo U('Admin/Index/show_yitiid');?>" />
							<input type="hidden" id="hebing" name='hebing' value="<?php echo U('Admin/Index/file_hebing');?>" />
							<input type="hidden" id="show_files" value="<?php echo U('Admin/Index/show_files');?>" />
				               	 <h3>温馨提示！<br/><em><br />> 请在浏览文件后，点击上传...</em></h3> 
				               <form method="POST" action="<?php echo U('Admin/Index/file_upload');?>" enctype="multipart/form-data" target="post_frame">
				               <input type="hidden" name="huiyiid1" class="huiyiid" value="" />
				               <input type="hidden" name="yitiid" id="yitiid" value="" />
				               <input type="file" class="input" name="file[]" multiple="multiple" style="padding: 0; top: 40px; left: -20px; position: relative;" />
				               <input type="submit" class="btn btn-info" id="upload" style="height: 39px; position: relative; left: 520px; font-size: 22px;" value="文件上传"></p>
				               </form>
				               <hr>
				               <span style="color:blue;" >已上传文件列表：</span>
				               <div class="btn_nav">
				                  <!-- <input type="button" class="prev" style="position: relative;left:-345px;
				                  top: 60px;" value="上一步" /> -->
				                  <input type="button" id="fileok" class="next right"  style="margin-right:50px;" value="下一步" />
				               </div>
				               <ol style="margin-left: 200px; margin-top:-130px;" class="filelist">
				               </ol>
				            
				            </div>
							<div class="page" style="padding: 5px 5px;">
				               <h3>温馨提示！<br/><em><br />> 右侧的是文件的展示顺序...</em></h3> 
				                <div style="font-size:14px;">文件上传:</div>
				               <div style="padding-bottom:10px;overflow:hidden;padding-left:40px;">
				               		  <select id="src-city" name="src-city" multiple="multiple" style="float: left; height: 150px;">
								 </select>
								 
								<div id="btn-box1" style="float: left;">
									<ul>
										<li><a id="btn-sel-all"></a></li>
										<li><a id="btn-sel-none"></a></li>
										<li><a id="btn-back"></a></li>
										<li><a id="btn-sel"></a></li>
									</ul>
								</div>
									<input type="hidden" name="huiyiid2" class="huiyiid" value="" />
				               		<input type="hidden" name="yitiid1" id="yitiid" value="" />
								 <select id="tar-city" name="tar-city" multiple="multiple" style="float: left; height: 150px;">
								 </select>
								 
				               </div> 
				             	 <div style="font-size:14px;">图片上传:</div>
								 <select id="src-yuan-img" name="src-yuan-img" multiple="multiple" style="float: left;margin-left:40px; height: 150px;">
								 </select>
								 <div id="btn-box11" style="float: left;">
									<ul>
										<li><a id="img-btn-sel-all"></a></li>
										<li><a id="img-btn-sel-none"></a></li>
										<li><a id="img-btn-back"></a></li>
										<li><a id="img-btn-sel"></a></li>
									</ul>
								</div>
								 <select id="tar-yuan-img" name="tar-yuan-img" multiple="multiple" style="float: left; height: 150px;">
								 </select>
				               <div class="btn_nav" style="clear: both;">
				                  <input type="button" class="prev" style="float:left;margin-left:50px;" value="上一步" />
				                  <input type="button" id="orderok" style="margin-right:70px;"  data-dismiss="modal" onclick="if (confirm('确定添加此议题吗')){
				                  window.location.reload();
				                  return true;
				                  } else return false;" class="next right" id="sub" value="确定" />
				               </div>
				            </div>
						</div>
					</div>
				</form>
				<script type="text/javascript">
				$(function(){
					$("#wizard").scrollable({
						onSeek: function(event,i){
							$("#status li").removeClass("active").eq(i).addClass("active");
						},
					});
				});
				</script>
		    </div>
		      </div>
		    </div>
		  </div>
		</div>
		<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div style="margin-top: 50px;" >
		    <div class="modal-content" style=" width:95%; margin: 0 auto;">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id=""><span class="admin_title"></span></h4>
		      </div>
		      <div class="modal-body">
		       <table class="table table-striped" id='yitilist'>
		       			<tr class="active">
							<td>序号</td>
							<td>议题</td>
							<td>提议人</td>
							<td>汇报单位</td>
							<td>汇报人</td>
							<td>列席单位</td>
							<td>列席人</td>
			       		</tr>
			       		

				</table>
		      <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info" style="margin-top: 0;  margin-left: 45%;margin-bottom:30px;">添加题表</button>
		      		</div>
		    </div>
		  </div>
		</div>
		<!--修改的弹出框-->
		<div class="modal fade bs-example-modal-lg1" id="myModal2"  style="z-index: 9999;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div style="margin-top: 50px;" >
		    <div class="modal-content" style="width: 95%; max-width:850px;  margin: 0 auto;">
		      <div class="modal-header">
		        <button type="button" class="close" onclick="window.location.reload();" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		         <h4 class="modal-title" id="myModalLabel">当前修改的议题:<span class='yiti_title'></span></h4>
		        
		      </div>
		      <div class="modal-body">
		       		<div id="boxx">
						<div id="box-content">
							<ul>
								<li>
									<div class="page" >
									<input type="hidden" calss="addyiti" value="<?php echo U('Admin/Index/addyiti');?>" />
									<form action="<?php echo U('Admin/Index/yitiinfo_change');?>" method="POST" id="yitiform" target="post_frame" >
									<iframe name='post_frame' id="post_frame" style="display:none;" mce_style="display:none;"></iframe> 
									  	 <h3>温馨提示！<br/><em><br />>在输入框中修改议题的基本信息,<b style='color:red;'>如果无需修改文件直接点击修改完成即可</b></em></h3>  
									 	<input type="hidden" name="huiyiid" class="huiyiid" value="" />	
						               <p><label>序号</label><input type="text" class="input xuhao" name="xiuxuhao" /></p>
						               <p><label>议题</label><input type="text" class="input yitiname" id="pass" name="xiuyitiname" /></p>
						               <p><label>提议人</label><input type="text" class="input tiyiren" id="pass1" name="xiutiyiren" /></p>
						               <p><label>汇报单位</label><input type="text" class="input huibaodanwei" id="user" name="xiuhuibaodanwei" /></p>
						               <p><label>汇报人</label><input type="text" class="input huibaoren" id="pass" name="xiuhuibaoren"  /></p>
						               <p><label>列席单位</label><input type="text" class="input liexidanwei" id="user" name="xiuliexidanwei" /></p>
						               <p><label>列席人</label><input type="text" class="input liexiren" id="pass" name="xiuliexiren" /></p>		
						               <div class="btn_nav">
						                  <input type="hidden" class="btn btn-success" style="margin-top:100px;margin-left:-20px;" value="修改" id="chang_yitiinfo"/>
						                  
						               </div>
						            </form>
						            </div>
								</li>
								<li>
									<form method="POST" action="<?php echo U('Admin/Index/file_upload');?>" enctype="multipart/form-data" target="post_frame">
						               	 <h3>温馨提示！<br/><em><br />> 请在浏览文件后，点击上传...</em></h3>  
						               	 <iframe name='post_frame' id="post_frame1" style="display:none;" mce_style="display:none;"></iframe> 
						               <input type="hidden" name="huiyiid1" class="huiyiid" value="" />
						               <input type="hidden" name="yitiid" id="yitiid" value="" />
						               <input type="file" class="input" name="file[]" multiple="multiple"  style="padding: 0; top: 40px; left: -20px; position: relative;" />
						               <input type="submit" class="btn btn-info"  style="height: 39px; position: relative; left: 520px; font-size: 22px;" value="上传"></p>
						               <hr>
						               <span style="color:blue;" >已上传文件列表：</span>
						               <div class="btn_nav">
						               </div>
						               <ol style=" margin-left: 200px; margin-top:-130px;" class="xiufilelist">
						               
						               </ol>
						               
						            </form>
								</li>
								<li>
									<h3>温馨提示！<br/><em><br />> 右侧的是文件的展示顺序...</em></h3> 
									<input type="hidden" name="huiyiid2" class="huiyiid" value="" />
						            <input type="hidden" name="yitiid1" id="yitiid" value="" /> 
						            <div style="font-size:14px;">文件排序:</div>
						               <select id="xiusrc-city" name="xiusrc-city" multiple="multiple" style="float: left; height: 150px;">
						               
										</select>
										<div id="xiubtn-box1" style="float: left;">
												<a id="xiubtn-sel-all" class="pai"></a>
												<a id="xiubtn-sel-none" class="pai"></a>
												<a id="xiubtn-back" class="pai"></a>
												<a id="xiubtn-sel" class="pai"></a>
										</div>
											
										 <select id="xiutar-city" name="tar-city" multiple="multiple" style="float: left; height: 150px;">
										 </select>
										 <div style="padding-top:10px;height:200px;clear:both;">
										 	<div style="font-size:14px;">图片排序:</div>
										<select id="xiusrc-city-img" name="xiusrc-city-img" multiple="multiple" style="float: left; height: 150px;">
						            
										</select>
										<div id="xiubtn-box1" style="float: left;">
												<a id="xiubtn-sel-all-img" class="pai"></a>
												<a id="xiubtn-sel-none-img" class="pai"></a>
												<a id="xiubtn-back-img" class="pai"></a>
												<a id="xiubtn-sel-img" class="pai"></a>
										</div>
											
										 <select id="xiutar-city-img" name="tar-city-img" multiple="multiple" style="float: left; height: 150px;">
										 </select>
										 </div>
										
								</li>
							</ul>
						</div>
					</div>
					<div style="width:100%; height:40px;margin:30px auto;">
						<input type="button" style="float:left;" class="btn btn-info" id="sub-btn-left" value="上一步" />
						<input type="button" style="margin-left:210px" id="changok" onclick="window.location.reload();" class="btn btn-info" value="< 修改完成 >" />
						<input type="hidden" name="xiuyitiid" value="" />
						<input type="button" style="float:right;" id="sub-btn" class="btn btn-info xiuxia" value="下一步" />
					</div>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content" style="padding-bottom:70px;">
	    <h3 style="margin:20px 10px;">请输入新的会议名称:</h3><hr />
	    <div style="width:66%;margin:0 auto;">
	    	<form action="<?php echo U('Admin/Index/huiyixiugai');?>" method="post">
	    	<input type="hidden" value="" name="huiyixiugaiid"/>
	        <input type="text" name="newhuiyi" value="" /><input type="submit" class="btn btn-success" value="提交" />
	        </form>
	    </div>
    </div>
  </div>
  </div>
<script>
	$(document).ready(function(){
		//点击会议名称
		$('.show_yiti').click(function(){
				$("#yitilist").html('');
				$("#yitiok").hide();//隐藏添加议题信息中的下一步<td>列席单位</td><td>列席人</td>
				$(".admin_title").html('');
				$("#yitilist").append("<tr class='active'><td>序号</td><td>议题</td><td>提议人</td><td>汇报单位</td><td>汇报人</td><td>操作</td></tr>");
				var c=$(this).html();
		        //var a=$(this).parent('td').prevAll("input[name='huiyiid']").attr('value');
		        //<td>"+resalut[key]['liexidanwei']+"</td><td>"+resalut[key]['liexiren']+"</td>
		        var a=$("."+c).attr('value');
		        var b=$("#show_huiyiid").attr('value');
		        var deyiti="<?php echo U('Admin/Index/deyiti');?>";
		        var haha="<?php echo U('Admin/Index/haha');?>";
		        var info="<?php echo U('Admin/Index/info');?>";
		        $.ajax({
		            type: "post",
		            url: b,
		            data: {id:a},
		            dataType: "json",
		            success: function (data) {
		                var resalut = {};
		                $.each(data, function (key, value) {
		                    resalut[key] = value;
		                    $(".admin_title").html(resalut[0]['huiyiname']);
		                    $("input[name='huiyiid']").attr('value',resalut[0]['id']);
		                 	$("input[name='huiyiid1']").attr('value',resalut[0]['id']);
		                 	$("input[name='huiyiid2']").attr('value',resalut[0]['id']);
		                    if(key>0){
		                    	$("#yitilist").append("<tr><td >"+resalut[key]['xuhao']+"</td><td><form id='hahaform"+resalut[key]['yitiname']+"' action='"+info+"' method='POST'><input type='hidden' name='id' value='"+resalut[key]['id']+"'><a class='hahaa' style='background:#0B5EA5;border:none;color:white;border-radius:5px;'>"+resalut[key]['yitiname']+"</a></form></td><td>"+resalut[key]['tiyiren']+"</td><td>"+resalut[key]['huibaodanwei']+"</td><td>"+resalut[key]['huibaoren']+"</td><td><form action='"+deyiti+"' method='POST'><input class='changeyitiid' type='hidden' name='id' value='"+resalut[key]['id']+"'><input type='button' id='zzk' data-toggle='modal' data-target='.bs-example-modal-lg1' style='background:#FEC039;border:none;color:white;border-radius:5px;'value='修改'><input type='submit' style='background:#d9534f;border:none;color:white;border-radius:5px;' id='yiti_del' value='删除'></form></td></tr>");//在table最后面添加一行  
		                    	// $("#yitilist").append("<tr><td >"+resalut[key]['xuhao']+"</td><td><form action='"+haha+"' method='POST'><input type='hidden' name='id' value='"+resalut[key]['id']+"'><input type='submit' style='background:#0B5EA5;border:none;color:white;border-radius:5px;' value='"+resalut[key]['yitiname']+"'></form></td><td>"+resalut[key]['tiyiren']+"</td><td>"+resalut[key]['huibaodanwei']+"</td><td>"+resalut[key]['huibaoren']+"</td><td>"+resalut[key]['liexidanwei']+"</td><td>"+resalut[key]['liexiren']+"</td><td><form action='"+deyiti+"' method='POST'><input class='changeyitiid' type='hidden' name='id' value='"+resalut[key]['id']+"'><input type='button' id='zzk' data-toggle='modal' data-target='.bs-example-modal-lg1' style='background:#FEC039;border:none;color:white;border-radius:5px;'value='修改'><input type='submit' style='background:#d9534f;border:none;color:white;border-radius:5px;' id='yiti_del' value='删除'></form></td></tr>");//在table最后面添加一行  
		                    	 // $("#yitilist").append("<tr><td ><a onclick="+"window.open('__PUBLIC__/pdf/web/viewer.html?file=/openoffice/uploads/"+resalut[key]['pdf']+"','pdf','width:100%;height:100%;','_blank')"+">"+resalut[key]['xuhao']+"</a></td><td>"+resalut[key]['yitiname']+"</td><td>"+resalut[key]['tiyiren']+"</td><td>"+resalut[key]['huibaodanwei']+"</td><td>"+resalut[key]['huibaoren']+"</td><td>"+resalut[key]['liexidanwei']+"</td><td>"+resalut[key]['liexiren']+"</td><td><form action='"+deyiti+"' method='POST'><input class='changeyitiid' type='hidden' name='id' value='"+resalut[key]['id']+"'><input type='button' id='zzk' data-toggle='modal' data-target='.bs-example-modal-lg1' style='background:#FEC039;border:none;color:white;border-radius:5px;'value='修改'><input type='submit' style='background:#d9534f;border:none;color:white;border-radius:5px;' id='yiti_del' value='删除'></form></td></tr>");//在table最后面添加一行  
		                    }
		                }); 
		            }
		        });
		    });

		//点击议题中的下一步
		$('#yitiok').click(function(){
		        var b=$("#show_yitiid").attr('value');
		        $.ajax({
		            type: "post",
		            url: b,
		            data: {},
		            dataType: "json",
		            success: function (data) {
		                var resalut = {};
		                $.each(data, function (key, value) {
		                    resalut[key] = value;
		                });
		                 $("input[name='yitiid']").attr('value',resalut[0]['yitiid']);
		                 $("input[name='yitiid1']").attr('value',resalut[0]['yitiid']);
		            }
		        })
		    });
			//点击上传文件中的下一步,显示已经上传的文件
		$('#fileok').click(function(){
				$("#src-city").html("");
				$("#tar-city").html("");
				$("#src-yuan-img").html("");
				$("#tar-yuan-img").html("");
		        var b=$("#show_files").attr('value');
		        var hui=$("input[name='huiyiid2']").attr('value');
		        var yi=$("input[name='yitiid1']").attr('value');
		        $.ajax({
		            type: "post",
		            url: b,
		            data: {
		            	huiyiid:hui,
		            	yitiid:yi
		            },
		            dataType: "json",
		            success: function (data) {
		                var resalut = {};
		                $.each(data, function (key, value) {
		                    resalut[key] = value;
		                    if(resalut[key]['yong']==0)
		                    {
		                    	$("#src-yuan-img").append("<option value='"+resalut[key]['id']+"'>"+resalut[key]['filename']+"</option>");
		                    }else{
		                    	$("#src-city").append("<option value='"+resalut[key]['id']+"'>"+resalut[key]['filename']+"</option>");
		                    }
		                    
		                });
		                 
		            }
		        })
		    });

		//选择好了文件
		$("#orderok").click(function() {
				var b=$("input[name='hebing']").attr('value');
				var yi=$("input[name='yitiid1']").attr('value');
        		var str = $("#tar-city option").map(function(){return $(this).val();}).get().join(" ");
        		var imgstr = $("#tar-yuan-img option").map(function(){return $(this).val();}).get().join(" ");
        		$.ajax({
		            type: "post",
		            url: b,
		            data:{
		            	yitiid:yi,
		            	files:str,
		            	imgs:imgstr
		            },
		            dataType: "json",
		            success: function (data) {
		                var resalut = {};
		                $.each(data, function (key, value) {
		                    resalut[key] = value;
		                }); 

		            }
		        });
    		});
		//显示添加议题信息中的下一步
		$("#add_yiti").click(function(){
			$("#yitiok").show();
		});



		//显示已经上传的文件的定时器
		$("#upload").click(function(){
			var time1= window.setInterval(show_upload,5000); 
		});

		//展示已上传的文件
		function show_upload(){
			//$("#filelist").html('');
			var len=$(".filelist li").length;
			var url="<?php echo U('Admin/Index/show_upload_files');?>";
			var hui=$("input[name='huiyiid2']").attr('value');
			var yi=$("input[name='yitiid1']").attr('value');
		        $.ajax({
		            type: "post",
		            url: url,
		            data: {
		            	huiyiid:hui,
		            	yitiid:yi
		            },
		            dataType: "json",
		            success: function (data) {
		            	if((data.length) == 0)
		            		return false;
		                var resalut = {};
		                $.each(data, function (key, value) {
		                    resalut[key] = value;
		                    if(!resalut[key]['filename']) return false;
		                    if(key>=len){
		                    	$(".filelist").append("<li>"+(key+1)+"."+resalut[key]['filename']+"</li>");
		                    }
		                    
		                });
		                 
		            }
		        })
		}


		//修改会议名称
		$("input[name='huiyixiugai']").click(function() {
				var b="<?php echo U('Admin/Index/show_huiyiname');?>";
				var a=$(this).next().attr('value');
				//alert(a);
        		$.ajax({
		            type: "post",
		            url: b,
		            data: {id:a},
		            dataType: "json",
		            success: function (data) {
		                var resalut = {};
		                $.each(data, function (key, value) {
		                    resalut[key] = value;
		                }); 
		                $("input[name='newhuiyi']").attr('value',resalut[0]['huiyiname']);
		                $("input[name='huiyixiugaiid']").attr('value',resalut[0]['id']);
		            }
		        });
    		});
		//删除议题前先判断
		$('#yiti_del').live('click',function(){
			if(confirm('确定删除此议题吗'))
			 return true;
			else 
				return false;
		});
		//点击议题名跳转
		$(".hahaa").live('click',function(){
			var info=$(this).html();
			$('#hahaform'+info).submit();
		});

		//点击议题修改弹出议题信息
		$('#zzk').live('click', function(){

				//获取huiyiid var hui=$("input[name='huiyiid2']").attr('value');
				var b="<?php echo U('Admin/Index/show_yitiinfo');?>";
				var a=$(this).prev().attr('value');
				$(".yiti_title").html();
				//alert(a);
        		$.ajax({
		            type: "post",
		            url: b,
		            data: {id:a},
		            dataType: "json",
		            success: function (data) {
		                var resalut = {};
		                $.each(data, function (key, value) {
		                    resalut[key] = value;
		                }); 
		                $(".yiti_title").html(resalut['yitiname']);
		                $("input[name='xiuyitiname']").attr('value',resalut['yitiname']);
		                $("input[name='xiuxuhao']").attr('value',resalut['xuhao']);
		                $("input[name='xiutiyiren']").attr('value',resalut['tiyiren']);
		                $("input[name='xiuhuibaodanwei']").attr('value',resalut['huibaodanwei']);
		                $("input[name='xiuhuibaoren']").attr('value',resalut['huibaoren']);
		                $("input[name='xiuliexidanwei']").attr('value',resalut['liexidanwei']);
		                $("input[name='xiuliexiren']").attr('value',resalut['liexiren']);
		                $("input[name='xiuyitiid']").attr('value',resalut['id']);
		                $("input[name='yitiid']").attr('value',resalut['id']);
		                
		                
		            }
		        });
			});
	
		
		// //修改会议内容
		// $("#changok").click(function() {
		// 		var hui=$("input[name='huiyiid2']").attr('value');
		// 		var b="<?php echo U('Admin/Index/chang_yitiinfo');?>";
		// 		var a=$(this).next().attr('value');
		// 		var yitiname=$("input[name='xiuyitiname']").attr('value');
		// 		var xuhao=$("input[name='xiuxuhao']").attr('value');
		//         var tiyiren=$("input[name='xiutiyiren']").attr('value');
		//         var huibaodanwei=$("input[name='xiuhuibaodanwei']").attr('value');
		//         var huibaoren=$("input[name='xiuhuibaoren']").attr('value');
		//         var liexidanwei=$("input[name='xiuliexidanwei']").attr('value');
		//         var liexiren=$("input[name='xiuliexiren']").attr('value');
		// 		//alert(a);
  //       		$.ajax({
		//             type: "post",
		//             url: b,
		//             data: {id:a,
		//             		yitiname:yitiname,
		//             		xuhao:xuhao,
		//             		tiyiren:tiyiren,
		//             		huibaodanwei:huibaodanwei,
		//             		huibaoren:huibaoren,
		//             		liexidanwei:liexidanwei,
		//             		liexiren:liexiren
		//             		},
		//             dataType: "json",
		//             success: function (data) {
		//                 var result = {};
		//                 $.each(data, function (key, value) {
		//                     result[key] = value;
		//                 }); 
		//                if(result[0]['info']=='success'){
		//                	alert('信息修改成功，请进行下一步修改或刷新页面查看');
		//                }
		//                if(result[0]['info']=='error'){
		//                	alert('信息修改失败');
		//                }
		//             }
		//         });
  //   		});

		//点击修改里面的下一步
		$(".xiuxia").click(function(){
			var yi=$("input[name='xiuyitiid']").attr('value');			
			var time1= window.setInterval(show_xiuupload,800); 
				$("#xiusrc-city").html("");
				$("#xiutar-city").html("");
				$("#xiusrc-city-img").html("");
				$("#xiutar-city-img").html("");
		        var b=$("#show_files").attr('value');
		        var hui=$("input[name='huiyiid2']").attr('value');
		        $.ajax({
		            type: "post",
		            url: b,
		            data: {
		            	huiyiid:hui,
		            	yitiid:yi
		            },
		            dataType: "json",
		            success: function (data) {
		                var resalut = {};
		                $.each(data, function (key, value) {
		                    resalut[key] = value;
		                    if(resalut[key]['yong']==0||resalut[key]['yong']==1)
		                    {
		                    	$("#xiusrc-city-img").append("<option value='"+resalut[key]['id']+"'>"+resalut[key]['filename']+"</option>");
		                    }else{
		                    	$("#xiusrc-city").append("<option value='"+resalut[key]['id']+"'>"+resalut[key]['filename']+"</option>");
		                    }
		                });
		                 
		            }
		        })
		});
		//展示修改已上传的文件
		function show_xiuupload(){
			//$("#filelist").html('');
			var len=$(".xiufilelist p").length;
			var url="<?php echo U('Admin/Index/show_upload_files');?>";
			var hui=$("input[name='huiyiid2']").attr('value');
			var yi=$("input[name='xiuyitiid']").attr('value');
		        $.ajax({
		            type: "post",
		            url: url,
		            data: {
		            	huiyiid:hui,
		            	yitiid:yi
		            },
		            dataType: "json",
		            success: function (data) {
		                var resalut = {};
		                $.each(data, function (key, value) {
		                    resalut[key] = value;
		                    if(key>=len){
		                    	$(".xiufilelist").append("<p>"+(key+1)+"."+resalut[key]['filename']+"</p>");
		                    }
		                    
		                });
		                 
		            }
		        })
		}
		//选择要修改的文件
		$("#changok").click(function() {
				var hui=$("input[name='huiyiid2']").attr('value');
				var a=$(this).next().attr('value');
				var yitiname=$("input[name='xiuyitiname']").attr('value');
				var xuhao=$("input[name='xiuxuhao']").attr('value');
		        var tiyiren=$("input[name='xiutiyiren']").attr('value');
		        var huibaodanwei=$("input[name='xiuhuibaodanwei']").attr('value');
		        var huibaoren=$("input[name='xiuhuibaoren']").attr('value');
		        var liexidanwei=$("input[name='xiuliexidanwei']").attr('value');
		        var liexiren=$("input[name='xiuliexiren']").attr('value');
				var b="<?php echo U('Admin/Index/xiuhebing');?>";
				var yi=$("input[name='xiuyitiid']").attr('value');
        		var str = $("#xiutar-city option").map(function(){return $(this).val();}).get().join(" ");
        		var imgs = $("#xiutar-city-img option").map(function(){return $(this).val();}).get().join(" ");
        		$.ajax({
		            type: "post",
		            url: b,
		            data:{
		            		huiyiid:hui,
		            		yitiname:yitiname,
		            		xuhao:xuhao,
		            		tiyiren:tiyiren,
		            		huibaodanwei:huibaodanwei,
		            		huibaoren:huibaoren,
		            		liexidanwei:liexidanwei,
		            		liexiren:liexiren,
		            		yitiid:yi,
		            		files:str,
		            		imgs:imgs
		            },
		            dataType: "json",
		            success: function (data) {
		                var resalut = {};
		                $.each(data, function (key, value) {
		                    resalut[key] = value;
		                    alert(value);
		                }); 

		            }
		        });
    		});
		//点击排序，把下一步隐藏
		$(".pai").click(function(){
			$("#sub-btn").hide();
		});
		//点击上一步，把下一步显示出来
		$("#sub-btn-left").click(function(){
			$("#sub-btn").show();
		})

	});

</script>

</body>
</html>