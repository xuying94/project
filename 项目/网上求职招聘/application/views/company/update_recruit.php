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
<title>发布招聘详情</title>
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
            <a data-id="<?php echo $company_id; ?>"class="btn6"href="javascript:0;">消息</a>
            <a data-id="<?php echo $company_id; ?>"class="talent_pool"href="javascript:0;">人才库</a>
            <a data-id="<?php echo $company_id; ?>"class="tools selected"href="javascript:0;">工具</a>
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
    	<div class="rSearch shadow">
    	    职位 <input name="input" type="text" value="搜索职位" onclick="this.value=''" class="rSearchInput" /><br />
    	    企业 <select name="select4" id="select4">
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
    	    <a class="inputBtn searchBtn">搜索</a>
    	</div>
        <div class="rType shadow">
            <strong>分类浏览招聘</strong>
            <ul>
            	<li class="select">全部</li>
                <li>研发</li>
                <li>产品</li>
                <li>策划</li>
                <li>运营</li>
                <li>其它</li>
            </ul>
        </div>
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
    	<div class="card shadow">
        	<a href="javascript:0;" class="select my_recruit">发布招聘</a>
        </div>
        
        <div class="box1 shadow">
        	<div class="tit">
            	<h3>填写完整您所想发布的岗位信息</h3>
        	</div>  
        	<form action="company/update_recruit_save" method="post">  
            <table class="TB2">
                <tr>
                    <th>企业名称：</th>
                    <td>
                    	<input class="TB2Input" name="company_name" type="text"  value="<?php echo $recruit->company_name?>"/>
                    	<input class="TB2Input" name="recruit_id" type="hidden"  value="<?php echo $recruit->recruit_id?>"/>
                    </td>
                    <th>工作地点：</th>
                    <td><input class="TB2Input" name="recruit_address" value="<?php echo $recruit->recruit_address?>"type="text" /></td>
                </tr>
                <tr>
                    <th>需求岗位：</th>
                    <td><input class="TB2Input" name="recruit_name" value="<?php echo $recruit->recruit_name?>"type="text" /></td>
                    <th>岗位类别：</th>
                    <td><select name="recruit_type" id="select">
                        <option value="研发">研发</option>
                        <option value="测试">测试</option>
                        <option value="产品">产品</option>
                        <option value="客服">客服</option>
                    </select></td>
                </tr>
                <tr>
                    <th>薪资待遇：</th>
                    <td>
                    	<input class="TB2Input" name="recruit_salary"value="<?php echo $recruit->recruit_salary?>" type="text" />
                    </td>
                    <th>招聘人数：</th>
                    <td><input class="TB2Input" name="recruit_num" value="<?php echo $recruit->recruit_num?>"type="text" />
                    	<input class="TB2Input" name="company_id" type="hidden"value="<?php echo $company_id;?>" />
                    </td>
                </tr>
                <tr>
                    <th>工作年限：</th>
                    <td><select name="recruit_work_time" id="select2">
                        <option value="2年以下">2年以下</option>
                        <option value="2-4年">2-4年</option>
                        <option value="4年以上">4年以上</option>
                    </select></td>
                    <th>学历：</th>
                    <td><select name="recruit_educate" id="select3">
                        <option value="大专">大专</option>
                        <option value="本科">本科</option>
                        <option value="不限">不限</option>
                        <option value="硕士及以上">硕士及以上</option>
                    </select></td>
                </tr>
                <tr>
                    <th>岗位要求：</th>
                    <td colspan="3"><textarea name="recruit_detail" class="TB2Textarea"><?php echo $recruit->recruit_detail?></textarea></td>
                </tr>
                <tr>
                    <th>企业介绍：</th>
                    <td colspan="3"><textarea name="company_detail" class="TB2Textarea"><?php echo $recruit->recruit_company_detail?></textarea></td>
                </tr>
                <tr>
                   
                </tr>
                <tr>
                    <td colspan="4">
                        <hr class="line" />
                        <input type="submit" class="TB2Btn1"value="确定" />
                        <!-- <a href="#" class="TB2Btn1">完成</a> -->
                        <!-- <a href="#" class="TB2Btn2">以后再说</a>  -->                   </td>
                </tr>
            </table>
            </form>
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

	$('.btn5').on('click', function(){
     var companyId =  $(this).data('id');
      location.href = 'company/company_edit?company_id='+companyId;
   });
   $('.btn4').on('click', function(){
     var companyId =  $(this).data('id');
      location.href = 'company/company_detail?company_id='+companyId;
   });
   $('.btn6').on('click', function(){
     // var employId =  $(this).data('id');
      location.href = 'company/company_index';
   });
	 $('.talent_pool').on('click',function(){//人才库
   		location.href = 'company/talent_pool';
   });

    });
   
</script>