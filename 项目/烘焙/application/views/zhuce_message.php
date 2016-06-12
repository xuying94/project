<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>普通用户注册</title>
	<base href="<?php echo site_url();?>"/>
	<link rel="stylesheet" href="assets/css/common_zhuce.css">
	<link rel="stylesheet" href="assets/css/zhuce_message.css">
</head>
<body id="bg">
		<a class="top">用户注册</a>
		<div id="bgpic">
		</div>
	<div id="pg">
	    
		<ul class="step">
			<li><a href="" id="setname">1 用户名绑定</a></li>
			<li><a href="" id="message">2 填写帐号信息</a></li>
			<li><a href="" id="success">3 √ 注册成功</a></li>
		</ul>
	<div id="text">
	   <form action="user/do_zhuce_message" method="post">
	   &nbsp;&nbsp;<p class="font">昵称</p>&nbsp;&nbsp;<input type="text" id="a" name="firstname"
            value="请输入昵称"  onfocus="if (value =='请输入昵称'){value =''}" onblur="if (value ==''){value='请输入昵称';this.style.color='#ccc'}"  
            onkeydown="if(value!='请输入昵称') this.style.color='#000'"   >
        <br />
        <br />
        &nbsp;&nbsp;<p class="font">密码</p>&nbsp;&nbsp;<input type="text" id="b" name="psd1" />
        <br />
        <br />
        <p class="font">确认密码</p>&nbsp;&nbsp;<input type="text" id="bb" name="psd2" />
        
        
	</div>
	<div id="botton">
         <input type="submit" id="c" value="下一步  >">
        </form>
    </div> 
    </div>   
</body>
</html>