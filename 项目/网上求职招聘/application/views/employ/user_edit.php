<?php
	if($this->session->userdata('login_user')){
		$login_user=$this->session->userdata("login_user");
		$employ_name=$login_user->employ_name;
		$employ_id=$login_user->employ_id;
	}else{
		redirect('welcome/login');
		$employ_name="未登录";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>完善求职信息</title>
<base href="<?php echo site_url();?>">
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/111.js"></script>
<style>
.demo{width:420px; margin:40px auto 0 auto; min-height:250px;}
.demo p{line-height:42px; font-size:16px}
</style>
</head>
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
            <select name="select4" id="select6">
                <option>全部</option>
                <option>IT企业</option>
            </select>
            <br />
            地区
            <select name="select5" id="select7">
                <option>全部</option>
                <option>江苏</option>
            </select>
            <br />
            日期
            <select name="select6" id="select8">
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
	    <div class="box1 shadow">
        	<div class="tit">
            	<h3>请填写完整您的求职信息</h3>
        	</div>    
        	<form action="employ/user_edit_save" method="post"enctype="multipart/form-data" class="form1">
            <table class="TB2">
                <tr>
                    <th>姓名：</th>
                    <td>
                    	<input class="TB2Input" name="employ_name" type="text" value="<?php echo $employ_name?>"/>
                    	<input type="hidden" name="employ_id" value=<?php echo $employ ->employ_id?>
                    </td>
                </tr>
                <tr>
                    <th>籍贯：</th>
                    <td><input class="TB2Input" name="employ_birth_place" type="text" value="<?php echo $employ->employ_birth_place;?>"/></td>
                </tr>
                <tr>
                    <th>出生日期：</th>
                    <td>
                    	<p>
					        <select name="year"class="gbiaps_birthday_year"></select>年
							<select name="month"class="gbiaps_birthday_month"></select>月
							<select name="day"class="gbiaps_birthday_day"></select>日
					    </p>
                    </td>
                    
                </tr>
                <tr>
                    <th>工作年限：</th>
                    <td><select name="employ_work" id="select4">
                        <option value ="2年以下">2年以下</option>
                        <option value ="2-4年">2-4年</option>
                        <option value ="4年以上">4年以上</option>
                    </select></td>
                </tr>
                <tr>
                    <th>联系电话：</th>
                    <td><input class="TB2Input" name="employ_tel" type="text"value="<?php echo $employ->employ_tel;?>" /></td>
                </tr>
                <tr>
                    <th>学校：</th>
                    <td><input class="TB2Input" name="employ_graduate_school" type="text" value="<?php echo $employ->employ_graduate_school;?>"/></td>
                </tr>
                <tr>
                    <th>学历：</th>
                    <td><select name="employ_educate" id="select5">
                        <option value="大专">大专</option>
                        <option value="本科">本科</option>
                        <option value="硕士及以上">硕士及以上</option>
                    </select></td>
                </tr>
                <tr>
                    <th>专业：</th>
                    <td><input class="TB2Input" name="employ_profess" type="text"value="<?php echo $employ->employ_profess;?>" /></td>
                </tr>
                <tr>
                    <th>email：</th>
                    <td><input name="employ_email" class="TB2Input"value="<?php echo $employ->employ_email;?>"/></td>
                </tr>
                <tr>
                    <th>QQ：</th>
                    <td><input name="employ_qq" class="TB2Input"value="<?php echo $employ->employ_qq;?>"/></td>
                </tr>
                <tr>
                    <th>求职目标：</th>
                    <td><input name="employ_job_type" class="TB2Input"value="<?php echo $employ->employ_job_type;?>"/></td>
                </tr>
                <tr>
                	<th>教育背景：</th>
                	<td>
                		<textarea name="study" rows="8" cols="65"><?php echo $employ->employ_study;?></textarea>
                	</td>
                </tr>
                <tr>
                	<th>工作经历：</th>
                	<td>
                		<textarea name="work_experience" rows="5" cols="65"><?php echo $employ->employ_work_experience;?></textarea>
                	</td>
                </tr>
                <tr>
                	<th>个人技能：</th>
                	<td>
                		<textarea name="skills" rows="8" cols="65"><?php echo $employ->employ_skills;?></textarea>
                	</td>
                </tr>
                <tr>
                	<th>作品展示：</th>
                	<td>
                		<textarea name="product_show" rows="8" cols="65"><?php echo $employ->product_show;?></textarea>
                	</td>
                </tr>
                <tr>
                    <td colspan="2">
                    	<hr class="line" />
                    	<input type="submit" class="TB2Btn1" name="sub" value="提交"/>
                        <!-- <a href="#" class="TB2Btn1" onclick="script:alert('操作成功')">保存</a> -->
                        <a href="#" class="TB2Btn2">以后再说</a>                    </td>
                </tr>
            </table>
            </form>
            <!-- <div class="chajian">
            	<ul>
            		<li><a class="TB2Btn2">123123</a></li>
            		<li><a class="TB2Btn2">123123</a></li>
            		<li><a class="TB2Btn2">123123</a></li>
            	</ul>
            </div> -->
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


    });
   
</script>