<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap.min.css">
	<script src="__PUBLIC__/js/jquery-2.2.2.min.js"></script>
	<style>
		html,body {
			width: 100%;
			height: 100%;
			padding:0;
			margin: 0;
		}
		#login{
			width: 100%;
			height: 100%;
			overflow: hidden;
			position: relative;
		}
		.login_box {
			width:530px;
			height: 400px;
			background-color: #fff;
			position: absolute;
			right: 8%;
			top: 34%;
			box-shadow: 2px 4px 5px #a59c9c;
		}
		.login_top {
			height: 160px;
			text-align: center;
			padding-top: 20px;
		}
		.login_top img {
			position: absolute;
			top: -50px;
			right: -130px;
		}
		.form-control {
			font-size: 28px;
			height: 45px;
		}
		.btn {
			font-size: 20px;
			padding: 6px 50px;
		}
	</style>
</head>
<body>
	<section id="login">
		<img class="img-responsive center-block" src="__PUBLIC__/images/login_bg.png" alt="">
		<div class="login_box">
			<div class="login_top">
				<h2 style="text-align: right; padding-right: 100px; margin-top:80px;">用户登录</h2>
				<img class="img_responsive" src="__PUBLIC__/images/title.png" alt="">
			</div>
			<div class="login_bottom" style="text-align: center;padding-top: 20px;">
				<form class="form-inline" action="<?php echo U('Admin/Login/login');?>" method="POST">
				  <div class="form-group">
				    <label for="exampleInputName2" style="font-size: 24px">用户：</label>
				    <input type="text"  name="username" class="form-control"  placeholder="">
				  </div><br><br>
				  <div class="form-group">
				    <label for="exampleInputEmail2" style="font-size: 24px">密码：</label>
				    <input type="password" name="password" class="form-control"  placeholder="">
				  </div><br><br>
				  <button type="submit" class="btn btn-success">进入后台</button>
				</form>
			</div>
		</div>
	</section>
	
	<script src="__PUBLIC__/js/bootstrap.min.js"></script>
</body>
</html>