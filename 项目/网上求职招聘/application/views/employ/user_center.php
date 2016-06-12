<?php
	if($this->session->userdata('login_user')){
		$login_user=$this->session->userdata("login_user");
		$employ_name=$login_user->employ_name;
		$employ_id=$login_user->employ_id;
		$src="{$employ_id}.jpg";
		// var_dump($employ_id);
		// die;
	}else{
		redirect('welcome/login');
		$employ_name="未登录";
		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人中心</title>
<base href="<?php echo site_url();?>">
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.11.3.min.js"></script>
<link rel="icon" type="image/png" href="images/logo1.jpg">
</head>
<body>
<p>&nbsp;</p>
<div class="topBg">
    <div class="top layout"></div>
        <div class="nav layout"> 
            <a href="welcome/index">首页</a>
            <a href="welcome/company_all">公司</a>
            <a data-id="<?php echo $employ_id; ?>"class="btn6"href="javascript:0;">消息</a>
            <a href="javascript:0;" class="navEnd user_option selected"><?php echo $employ_name?></a>       
        </div>
     <ul class="select_option"style="display:none;">
        <li><a data-id="<?php echo $employ_id; ?>"class="btn4"href='javascript:0;'>资料</a></li>
        <li><a data-id="<?php echo $employ_id; ?>"class="btn5"href='javascript:0;'>设置</a></li>
        <li><a href="welcome/loginout">退出</a></li>
      </ul>
</div>
<div class="main">
    <div class="right">
        <div class="rSearch shadow"> 职位
            <input name="input" type="text" value="搜索职位" onclick="this.value=''" class="rSearchInput" />
            <br />
            企业
            <select name="select4" id="select4">
                <option>全部</option>
                <option>IT企业</option>
            </select>
            <br />
            地区
            <select name="select5" id="select5">
                <option>全部</option>
                <option>江苏</option>
            </select>
            <br />
            日期
            <select name="select6" id="select6">
                <option>所有</option>
                <option>三日内</option>
                <option>本周内</option>
                <option>本月内</option>
            </select>
            <br />
            <a class="inputBtn searchBtn">搜索</a> </div>
        <div class="rType shadow"> <strong>分类浏览招聘</strong>
            <ul>
                <li class="select">全部</li>
                <li>研发</li>
                <li>产品</li>
                <li>策划</li>
                <li>运营</li>
                <li>其它</li>
            </ul>
        </div>
        <!-- <div class="rRe shadow"> 推荐人：<strong>戴光浩</strong> </div> -->
        <div class="rPosition shadow"> <strong>其它同类职位</strong> <a href="#">• 前端开发工程师</a> <a href="#">• 市场经理</a> <a href="#">• 高级软件工程师</a> <a href="#">• AS3高级开发工程师 </a> <a href="#">• java开发工程师</a> </div>
    </div>
    <div class="left">
    	<div class="card shadow">
        	<a href="javascript:0;" class="select">求职档案</a><!-- <a href="#">伯乐档案</a> --></div>
        
        <!-- 一条记录 开始 -->
        <div class="box1 shadow">
        	<div class="tit">
            	<h2>个人信息</h2>
                <div class="titText"></div>
        	</div>    
            <table class="myInfo">
            	<div class="head_content">
            	<div id="user_photo_content">
            			<a data-id="<?php echo $employ_id; ?>"class="header" title="点我更换头像"><img id="user_photo"src="images/uploads/<?php echo $src?>"></a>
            	</div>
            	<div class="user_photo_right">
            		<br/>
            		<h2>姓名：<?php echo $employ->employ_name;?></h2><br/>
            		<h4>求职目标：<?php echo $employ->employ_job_type;?></h4>
            	</div>
        	</div>
                <tr>
                    <th>年龄：</th>
                    <td> <?php echo $employ->employ_age;?></td>
                    <th>性别</th>
                    <td><?php echo $employ->employ_sex;?></td>
                </tr>
                <tr>
                    <th>现居住地：</th>
                    <td><?php echo $employ->employ_address;?></td>
                    <th>工作经验</th>
                    <td><?php echo $employ->employ_work;?></td>
                </tr>
                <tr>
                    <th>出生日期：</th>
                    <td><?php echo $employ->employ_birth;?></td>
                    <th>学历</th>
                    <td><?php echo $employ->employ_educate;?></td>
                </tr>
                <tr>
                    <th>联系电话：</th>
                    <td><?php echo $employ->employ_tel;?></td>
                    <th>专业</th>
                    <td><?php echo $employ->employ_profess;?></td>
                </tr>
                <!-- ************************************* -->
                <tr>
                    <th>名族：</th>
                    <td><?php echo $employ->nation;?></td>
                    <th>身份证</th>
                    <td><?php echo $employ->employ_iden;?></td>
                </tr>
                <tr>
                    <th>QQ：</th>
                    <td><?php echo $employ->employ_qq;?></td>
                    <th>email</th>
                    <td><?php echo $employ->employ_email;?></td>
                </tr>
                <tr>
                    <th>籍贯：</th>
                    <td><?php echo $employ->employ_birth_place;?></td>
                    <th>婚姻状况</th>
                    <td><?php echo $employ->employ_marry;?></td>
                </tr>
                <tr>
                    <th>毕业学校：</th>
                    <td><?php echo $employ->employ_graduate_school;?></td>
                    <th>毕业时间</th>
                    <td><?php echo $employ->employ_graduate_date;?></td>
                </tr>
                <tr>
                    <th>英语水平：</th>
                    <td><?php echo $employ->employ_language;?></td>
                    <th>计算机等级</th>
                    <td><?php echo $employ->employ_computer;?></td>
                </tr>
            </table>
        </div>
        <!-- 一条记录 结束 -->
        
        <!-- 一条记录 开始 -->
        <div class="box1 shadow">
        	<div class="tit">
            	<h2>简历信息</h2>
                <div class="titText"></div>
        	</div>    
            <table class="myInfo">
            	<tr>
                    <th>求职目标：</th>
                    <td><?php echo $employ->employ_job_type;?></td>
                </tr>
                <tr>
                    <th>教育背景：</th>
                    <td> <?php echo $employ->employ_study;?></td>
                </tr>
                <tr>
                    <th>工作经历：</th>
                    <td><?php echo $employ->employ_work_experience;?></td>
                </tr>
                <tr>
                    <th>个人技能</th>
                    <td><?php echo $employ->employ_skills;?></td>
                </tr>
                <tr>
                    <th>作品展示</th>
                    <td><?php echo $employ->product_show;?></td>
                </tr>
            </table>
        <a data-id="<?php echo $employ_id; ?>"href="javascript:0;"class="inputBtn infoBtn btn4">编辑</a></div>
        <!-- 这里应该把employ_id传过去 作为数据库查询的依据 -->
        <!-- 一条记录 结束 -->

    </div>
</div>
<div class="foot">Copyright © 2012 itmag.com All rights reserved. | 苏ICP备12067872号 </div>
</body>
</html>
<script>
    $(document).ready(function(){

        $(".user_option").click(function() {
            $(".select_option").animate({
              height:'toggle'
            });
        
        });

	$('.btn5').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'employ/user_edit?employ_id='+employId;
   });
   $('.btn4').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'employ/user_edit?employ_id='+employId;
   });
   $('.btn6').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'employ/user_news?employ_id='+employId;
   });
	$('.header').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'upload/?employ_id='+employId;
   });

    });
   
</script>