<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员注册</title>
<base href="<?php echo site_url();?>">
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/regist.js"></script>
<link rel="stylesheet" href="css/regist.css" />
<link rel="icon" type="image/png" href="images/logo1.jpg">
</head>
<style>
	.formtips{width: 240px;margin:2px;padding:2px;position:relative;left:205px;top:-22px;}
	.onError{
	    background:#FFE0E9 url(images/reg3.gif) no-repeat 0 center;
		padding-left:25px;
	}
	.high{
		position:absolute;
		left:550px;
		top:83px;
	}
	.onSuccess{
	    background:#5CB85C url(images/reg4.gif) no-repeat 0 center;
		padding-left:25px;
	}
	.high{
	    color:red;
	    float:left:
	}
	.ppp{
		color:red;
	}
</style>
<body>
<div class="topBg">
    <!-- <div class="top layout"></div>
        <div class="nav layout"> 
            <a href="index.html">首页</a>
            <a href="求职主页.html">岗位浏览</a>
            <a href="发布推荐信息.html">我来推荐</a> 
            <a href="#">个人档案</a> <a href="#">消息</a>
            <a href="#">帮助</a>
            <a href="javascript:0;" class="navEnd user_option">angus</a>       
        </div>
     <ul class="select_option"style="display:none;">
        <li><a href="user_center.html">资料</a></li>
        <li><a href="user_edit.html">设置</a></li>
        <li><a href="index.html">退出</a></li>
      </ul> -->
</div>
<!-- **************************************************************-->
<div class="main regist_content">
	<div class="right">
    	<div class="rSearch shadow">
    	    <input name="input" type="text" value="搜索职位" onclick="this.value=''" />
    	</div>
        <!-- <div class="rRe shadow">
        	推荐人：<strong>戴光浩</strong>
        </div> -->
        <div class="rPosition shadow">
            <strong>其它同类职位</strong>
            <a href="#">• 前端开发工程师</a>
            <a href="#">• 市场经理</a>
            <a href="#">• 高级软件工程师</a>
            <a href="#">• AS3高级开发工程师 </a>
            <a href="#">• java开发工程师</a>
        </div>
    </div>
	<div class="left">
	    <div class="box1 shadow">
        	<div class="tit">
            	<span class="fr c999">非常欢迎并感谢您注册成为我们的一员</span><h3 class="fl">HR快速注册</h3>
        	</div>    
        	<form action="welcome/company_save" method="post">
            <table class="TB2">
                <tr>
                    <th>登陆邮箱：</th>
                    <td>
                    	<input id="email" class="TB2Input required" required="required"name="account" type="text" />
                    </td>
                </tr>
                <tr>
                    <th>性别：</th>
                    <td><input name="sex" type="radio" id="radio" value="男"/> 男　　　<input type="radio" name="sex" id="radio2" value="女" /> 女</td>
                </tr>
                <tr>
                    <th>姓名：</th>
                    <td><input class="TB2Input" required="required"name="name" type="text" /></td>
                </tr>
                <tr>
                    <th>密码：</th>
                    <td><input id="password"required="required" class="TB2Input required" name="password1" type="text" /></td>
                </tr>
                <tr>
                    <th>确认密码：</th>
                    <td><input class="TB2Input required" required="required"name="password2" type="text" /></td>
                </tr>
                <!-- <tr>
                    <th>验证码：</th>
                    <td><input class="TB2Input" name="input4" type="text" /></td>
                </tr> -->
                <tr>
                    <td colspan="2">
                    	<hr class="line" />
                        <input type="submit"class="TB2Btn1"value="注册">
                    	<!-- <input type="reset"value="重置"class="TB2Btn2"> -->
                    	<!-- <input type="button"value="返回"class="TB2Btn2"> -->
                        <!-- <a href="welcome/choose" class="TB2Btn1">完成</a> -->
                        <a href="welcome/index" class="TB2Btn2">不想注册了</a>                   
                    </td>
                </tr>
            </table>
            </form>
        </div>
	</div>
</div>
<div class="foot">Copyright © 2012 itmag.com All rights reserved. | 版权所有ICP备12067872号 </div>
</body>
</html>
<script>
    $(document).ready(function(){

        $(".user_option").click(function() {
          
            $(".select_option").animate({
              height:'toggle'
            });
        
        });


    });
   
</script>
