<?php
	if($this->session->userdata('login_user')){
		$login_user=$this->session->userdata("login_user");
		$company_name=$login_user->company_name;
		$company_id=$login_user->company_id;
		$company_HR_name=$login_user->company_HR_name;
	}else{
		$company_name="未登录";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>消息中心</title>
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
            <a data-id="<?php echo $company_id; ?>"class="btn6 selected"href="javascript:0;">消息</a>
            <a data-id="<?php echo $company_id; ?>"class="talent_pool"href="javascript:0;">人才库</a>
            <a data-id="<?php echo $company_id; ?>"class="tools"href="javascript:0;">工具</a>
            <a href="javascript:0;" class="navEnd user_option"><?php echo $company_name?></a>       
        </div>
     <ul class="select_option"style="display:none;">
        <li><a data-id="<?php echo $company_id; ?>"class="btn4"href='javascript:0;'>资料</a></li>
        <li><a data-id="<?php echo $company_id; ?>"class="btn5"href='javascript:0;'>设置</a></li>
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
        <div class="rType shadow"> <strong>行业新闻</strong>
            <ul>
                <li class="select">行业新闻</li>
                <li>行业新闻</li>
                <li>行业新闻</li>
                <li>行业新闻</li>
                <li>行业新闻</li>
                <li>行业新闻</li>
            </ul>
        </div>
        <!-- <div class="rRe shadow"> 推荐人：<strong>戴光浩</strong> </div> -->
        <div class="rPosition shadow"> <strong>简历指导</strong> <a href="#">• 前端开发工程师</a> <a href="#">• 市场经理</a> <a href="#">• 高级软件工程师</a> <a href="#">• AS3高级开发工程师 </a> <a href="#">• java开发工程师</a> </div>
    </div>
    <div class="left">
    	<div class="card shadow">
        	<a data-id="<?php echo $company_id; ?>" class="select btn6">所有消息</a>
        	<a  class="all_recruit">所有招聘</a>
        	<!-- <a></a> -->
        </div>
        <div class="box1 shadow">
            <table class="mySubmit ">
                <tr>
                    <th width="52%">标题</th>
                    <th width="19%">发送人</th>
                    <th width="19%">发送时间</th>
                    <th width="10%">状态</th>
                </tr>
          <?php
            foreach($profiles as $employ){
          ?>
                <tr>
                    <td><a data-id="<?php echo $employ->employ_id;?>"class="employ_profile">你收到一篇来信</a>
                        <div class="mySubmitCont">
                           <?php echo $employ->recruit_name;?>
                        </div>
                    </td>

                    <td><a data-id="<?php echo $employ->employ_id;?>"class="employ_profile" href="javascript:0;"><?php echo $employ->employ_name;?></a></td>
                    <td><?php echo $employ->recruit_send_time;?></td>
                    <td><p class="<?php echo $employ->recruit_state_flag;?>"><?php echo $employ->recruit_state;?></p></td>
                </tr>
                
          <?php
            }
          ?>
            </table>
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
	$('.btn4').on('click', function(){
     var companyId =  $(this).data('id');
      location.href = 'company/company_detail?company_id='+companyId;
   });
	$('.btn5').on('click', function(){
     var companyId =  $(this).data('id');
      location.href = 'company/company_edit?company_id='+companyId;
   });
   $('.employ_profile').on('click', function(){
     var $employId =  $(this).data('id');
      location.href = 'company/check_profile?employ_id='+$employId;
   });
   $('.btn6').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'company/company_index';
   });
   $('.tools').on('click', function(){
     var companyId =  $(this).data('id');
      location.href = 'company/company_recruit?company_id='+companyId;
   });
   $('.talent_pool').on('click',function(){//人才库
   		location.href = 'company/talent_pool';
   });
   $('.all_recruit').on('click', function(){
     var recruitId =  $(this).data('id');
      location.href = 'company/company_all_recruit';
   });
   $('.employ_profile').on('click', function(){
     var emmployId =  $(this).data('id');
      location.href = 'employ/user_center?employ_id='+employId;
   });
   
    });
   
</script>