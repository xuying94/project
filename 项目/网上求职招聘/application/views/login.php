<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆</title>
<base href="<?php echo site_url();?>">
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.11.3.min.js"></script>
<link rel="icon" type="image/png" href="images/logo1.jpg">
</head>

<body class="indexBg">
<div class="index">
	<form action="welcome/check_login" method="post">
	<table class="indexLoginTB">
        <tr>
            <th>帐户</th>
            <td>
                <input type="text" value="邮箱/用户名"name="name" onclick="this.value=''" class="indexLoginTBinput1"/>
            </td>
        </tr>
        <tr>
            <th>密码</th>
            <td><input type="password" value="密码" name="password"onclick="this.value='';this.type='password'" class="indexLoginTBinput1"/></td>
        </tr>
        <tr>
            <th>验证码</th>
            <td><img src="images/code.jpg" width="79" height="31" class="fr" /><input type="text" class="indexLoginTBinput2"name="check"/> </td>
        </tr>
        <tr>
            <th>登陆选项</th>
            <td>
                <select name="user_type">
                  <optgroup label="登陆选项"name="user_type">
                  <!-- <option value ="volvo">登陆选项</option> -->
                  <option value ="employ"class="employ">求职者登陆</option>
                  <option value ="admin"class="admin">管理员登陆</option>
                  <option value ="company"class="company">公司登陆</option>
                  </optgroup>       
                </select>

            </td>
        </tr>
        <!-- <tr>
            <th>&nbsp;</th>
            <td><input name="input" type="checkbox" value="" /> 
                记住密码 <a href="#">忘记密码</a></td>
        </tr> -->
        <tr>
            <th>&nbsp;</th>
            <td><input type="submit"value="登录"class="indexLoginTBinput3"> <a href="welcome/choose" class="indexLoginTBinput4">注 册</a></td>
        </tr>
        <tr>
            <th>&nbsp;</th>
            <td><a href="welcome/index">游客进入</a></td>
        </tr>
    </table>
</form>
	
    <div class="indexT4"><input name="" type="text" /></div>
    <div class="indexT5">Copyright © 2006-2012 IT马倌 | 营业执照 | 版权所有ICP证B2-20070191</div>
    <a " class="indexSearch"></a>
    <div class="indexNew">
    	 <?php
            foreach($companys as $company){
          ?>
        <li><span><?php echo $company->company_start_time?></span>
        	<a data-id="<?php echo $company->company_id;?>"class="company_detail"><?php echo $company->company_name?></a>
        </li>
        <?php
			}
        ?>
    </div>
    
    
</div>
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

$('.company_detail').on('click', function(){
     var companyId =  $(this).data('id');
      location.href = 'company/show_company?company_id='+companyId;
   });
$('.indexSearch').on('click', function(){
     alert("系统提示：\n请先登录系统");
   });
</script>
