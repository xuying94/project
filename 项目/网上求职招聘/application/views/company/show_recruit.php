<?php
	if($this->session->userdata('login_user')){
		$login_user=$this->session->userdata("login_user");
		$company_name=$login_user->company_name;
		$company_id=$login_user->company_id;
	}else{
		$company_name="未登录";
		$company_id="0";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>职位详情</title>
<base href="<?php echo site_url();?>">
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.11.3.min.js"></script>
<link rel="icon" type="image/png" href="images/logo1.jpg">

</head>
<body>
<div class="topBg">
    <div class="top layout"></div>
        <div class="nav layout"> 
            <a data-id="<?php echo $company_id; ?>"class="btn6 selected"href="javascript:0;">消息</a>
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
    		<a class="all_recruit">所有招聘</a>
        	<a class="select">岗位列表</a>
        </div>
        <div class="box1 shadow">
        	<div class="tit">
            	<h2><?php echo $recruit->recruit_name;?></h2>
                <div class="titText">
                    <a class="btnC3 box1T3 fr"><?php echo $recruit->company_name;?></a>
                    <a data-id="<?php echo $recruit->recruit_id; ?>"class="btnC2 box1T2 update_recruit"> 修改</a>
                    <a  data-id="<?php echo $recruit->recruit_id; ?>"class="btnC1 box1T1 delete_recruit"> 删除</a>
                </div>
            </div>
                <table class="TB1">
                    <tr>
                        <th>职位性质：</th>
                        <td width="150"><?php echo $recruit->recruit_type;?></td>
                        <th>职位类别：</th>
                        <td><?php echo $recruit->recruit_type;?></td>
                    </tr>
                    <tr>
                        <th>招聘人数：</th>
                        <td><?php echo $recruit->recruit_num;?></td>
                        <th>工作经验：</th>
                        <td><?php echo $recruit->recruit_work_time;?></td>
                    </tr>
                    <tr>
                        <th>工作地点：</th>
                        <td><?php echo $recruit->recruit_address;?></td>
                        <th>性别要求：</th>
                        <td>不限</td>
                    </tr>
                    <tr>
                        <th>学历要求：</th>
                        <td><?php echo $recruit->recruit_educate;?></td>
                        <th>发布日期：</th>
                        <td><?php echo $recruit->recruit_add_time;?></td>
                    </tr>
                    <tr>
                        <th>薪资待遇：</th>
                        <td><?php echo $recruit->recruit_salary;?></td>
                        <th>截止日期：</th>
                        <td>2016-06-08</td>
                    </tr>
                </table>
				<hr class="line" />
				<table class="TB1">
				    <tr>
				        <th>职位描述：</th>
				        <td><?php echo $recruit->recruit_detail;?></td>
			        </tr>
			    </table>
				<hr class="line" />
				<table class="TB1">
				    <tr>
				        <th>公司介绍：</th>
				        <td>　　<?php echo $recruit->recruit_company_detail;?></td>
			        </tr>
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
      location.href = 'company/company_index';
   });
   $('.tools').on('click', function(){
     var companyId =  $(this).data('id');
      location.href = 'company/company_recruit?company_id='+companyId;
   });
   $('.my_apply').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'employ/my_apply?employ_id='+employId;
   });
   $('.all_recruit').on('click', function(){
     var recruitId =  $(this).data('id');
      location.href = 'company/company_all_recruit';
   });
   $('.company_detail').on('click', function(){
     var companyId =  $(this).data('id');
      location.href = 'company/company_detail?company_id='+companyId;
   });
   $('.update_recruit').on('click', function(){
     var companyId =  $(this).data('id');
      location.href = 'company/update_recruit?recruit_id='+companyId;
   });
   $('.delete_recruit').on('click', function(){
     var companyId =  $(this).data('id');
      location.href = 'company/delete_recruit?recruit_id='+companyId;
   });
</script>