<?php
	if($this->session->userdata('login_user')){
		$login_user=$this->session->userdata("login_user");
		$employ_name=$login_user->employ_name;
		$employ_id=$login_user->employ_id;
		// var_dump($employ_id);
		// die;
	}else{
		$employ_name="未登录";
		$employ_id="0";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>求职主页</title>
<base href="<?php echo site_url();?>">
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/common.css" type="text/css"/>
<script src="js/jquery-1.11.3.min.js"></script>

</head>
<body>
<!-- <div class="window shadow">
	<table class="myInfo">
	    <tr>
	        <th>简历附件：</th>
	        <td><input type="file" name="fileField" id="fileField" /></td>
        </tr>
	    <tr>
	        <th>留言</th>
	        <td><textarea name="textfield" id="textfield" class="windowInput"></textarea></td>
        </tr>
    </table>
	<a class="inputBtn windowBtn">修改</a><a  class="windowClose">关闭</a>
</div> -->
<div class="topBg">
    <div class="top layout"></div>
        <div class="nav layout"> 
            <a href="welcome/index">首页</a>
            <a href="welcome/company_all"class="selected">公司</a>
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
       <!--  <div class="rRe shadow"> 推荐人：<strong>戴光浩</strong> </div> -->
        <div class="rPosition shadow"> <strong>其它同类职位</strong> <a href="#">• 前端开发工程师</a> <a href="#">• 市场经理</a> <a href="#">• 高级软件工程师</a> <a href="#">• AS3高级开发工程师 </a> <a href="#">• java开发工程师</a> </div>
    </div>
    <div class="left">
    	<div class="card shadow">
        	<a href="javascript:0;" class="select">公司列表</a>
        </div>
        
        <!-- 一条记录 开始 -->
        <?php
            foreach($companys as $company){
          ?>
        <div class="box1 shadow">
        	<div class="tit">
            	<a href="company/company_detail"><h2>
                <div class="titText">
                	<div class="fr">
                        <a data-id="<?php echo $company->company_id;?>" class="btnC3 box1T3 company_detail"><?php echo $company->company_name;?></a><br /><br />
                        <!-- <span class="box1T4">已推荐（0）</span> -->
                    </div>
                   
                </div>
        	</div>    
            <table class="TB1">
                <tr>
                    <th>发布日期：</th>
                    <td> 2016年5月1日</td>
                </tr>
                <tr>
                    <th>工作地点：</th>
                    <td>南京市鼓楼区</td>
                </tr>
                <tr>
                    <th>职位职能：</th>
                    <td>经理助理/秘书   职位描述:岗位职责1、协助总裁处理各类信件，起草信函、演讲稿、报告、文件等各类综合性文件；2、做好各部门及各领导上报行文的保存... </td>
                </tr>
            </table>
        </div>
        <a data-id="<?php echo $company->company_id;?>" class="box1More shadow company_detail">查看详情</a>
        <?php
            }
          ?>
        <!-- 一条记录 结束 -->
        
		<div class="page">
        	<a href="#">上页</a>
            <a href="#" class="select">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a> ...
            <a href="#">9</a>
            <a href="#">下页</a>
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
	$('.company_detail').on('click', function(){
     var companyId =  $(this).data('id');
      location.href = 'company/company_all_job?company_id='+companyId;
   });

    });
   
</script>