<?php
	if($this->session->userdata('login_user')){
		$login_user=$this->session->userdata("login_user");
		$employ_name=$login_user->employ_name;
		$employ_id=$login_user->employ_id;
	}else{
		redirect('welcome/login');
		$employ_name="未登录";
		$employ_id="0";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的申请</title>
<base href="<?php echo site_url();?>">
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/common.css" type="text/css"/>
<script src="js/jquery-1.11.3.min.js"></script>
<link rel="icon" type="image/png" href="images/logo1.jpg">

</head>
<style>
	.yes{
		color:green;
	}
	.no{
		color:red;
	}
</style>
<body>
<div class="topBg">
    <div class="top layout"></div>
        <div class="nav layout"> 
            <a href="welcome/index"class="selected">首页</a>
            <a href="welcome/company_all">公司</a>
           <a data-id="<?php echo $employ_id; ?>"class="btn6"href="javascript:0;">消息</a>
            <a href="javascript:0;" class="navEnd user_option"><?php echo $employ_name?></a>       
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
        
        <div class="rPosition shadow"> <strong>其它同类职位</strong> <a href="#">• 前端开发工程师</a> <a href="#">• 市场经理</a> <a href="#">• 高级软件工程师</a> <a href="#">• AS3高级开发工程师 </a> <a href="#">• java开发工程师</a> </div>
    </div>
    <div class="left">
    	<div class="card shadow">
        	<a href="" class="">岗位列表</a><a data-id="<?php echo $employ_id; ?>"class="my_favorate">我的搜藏</a><a data-id="<?php echo $employ_id; ?>"class="my_apply select"href="javascript:0;">我的申请</a>
        </div>
        <div class="box1 shadow">
        	
            <table class="mySubmit ">
                <tr>
                    <th width="18%">职位名称</th>
                    <th width="36%">企业名称</th>
                    <th width="11%">工作地点</th>
                    <th width="14%">申请日期</th>
                    <th width="9%">状态</th>
                    <th width="12%">操作</th>
                </tr>
        <?php
            foreach($applys as $apply){
          ?>
                <tr>
                    <td><?php echo $apply->recruit_name;?></td>
                    <td><?php echo $apply->company_name;?></td>
                    <td><?php echo $apply->recruit_address;?></td>
                    <td><?php echo $apply->apply_time;?></td>
                    <td class="cf60"><a class="<?php echo $apply->apply_state_flag;?>"><?php echo $apply->apply_state;?></a></td>
                    <td><a data-id="<?php echo $apply->apply_id;?>"class="my_apply_delete"href="javascript:0;">删除</a>|<a data-id="<?php echo $apply->recruit_id;?>"class="show_my_apply" href="javascript:0;">查看</a></td>
                    
                </tr>
          <?php
            }
          ?>
            </table>
        </div>
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


    });

    $("#nav a").click(function(){ 
      $(this).siblings().removeClass("selected"); 
      $(this).addClass("selected"); 
    });
    $('.btn4').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'employ/user_center?employ_id='+employId;
   });
   
   $('.btn5').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'employ/user_edit?employ_id='+employId;
   });
   
    $('.btn6').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'employ/user_news?employ_id='+employId;
   });
   $('.my_apply_delete').on('click', function(){
     var applyId =  $(this).data('id');
      location.href = 'employ/delete_apply_news?apply_id='+applyId;
   });
   $('.show_my_apply').on('click', function(){
     var recruitId =  $(this).data('id');
      location.href = 'company/job_detail?recruit_id='+recruitId;
   });
   $('.my_favorate').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'employ/my_favorate?employ_id='+employId;
   });
   
</script>