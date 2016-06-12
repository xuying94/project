<?php
	if($this->session->userdata('login_user')){
		$login_user=$this->session->userdata("login_user");
		$company_name=$login_user->company_name;
		$company_id=$login_user->company_id;
	}else{
		$company_name="未登录";
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
</head>
<div class="topBg">
    <div class="top layout"></div>
        <div class="nav layout"> 
            <a data-id="<?php echo $company_id; ?>"class="btn6"href="javascript:0;">消息</a>
            <a data-id="<?php echo $company_id; ?>"class="talent_pool"href="javascript:0;">人才库</a>
            <a data-id="<?php echo $company_id; ?>"class="tools"href="javascript:0;">工具</a>
            <a href="javascript:0;" class="navEnd user_option selected"><?php echo $company_name?></a>       
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
            	<h3>请填写完整您的信息</h3>
        	</div>    
        	<form action="company/company_edit_save" method="post">
            <table class="TB2">
                <tr>
                    <th>公司简称：</th>
                    <td>
                    	<input class="TB2Input" name="company_name" type="text" value="<?php echo $company_name?>"/>
                    	<input type="hidden" name="company_id" value=<?php echo $company ->company_id?>
                    </td>
                </tr>
                <tr>
                    <th>公司全名：</th>
                    <td>
                    	<input class="TB2Input" name="company_all_name" type="text" value=""/>
                    </td>
                </tr>
                <tr>
                    <th>城市：</th>
                    <td><input class="TB2Input"name="company_city" type="text" id="radio" value=""/> 　
                    	
                    </td>
                </tr>
                <tr>
                    <th>公司地址：</th>
                    <td><input class="TB2Input" name="company_address" type="text" value=""/></td>
                </tr>
                <tr>
                    <th>注册日期：</th>
                    <td><select name="year" id="select">
                        <option value ="1990">1990</option>
                        <option value ="1991">1991</option>
                        <option value ="1992">1992</option>
                        <option value ="1993">1993</option>
                        <option value ="1994">1994</option>
                        <option value ="1994">1995</option>
                        <option value ="1996">1996</option>

                    </select> 
                        - 
                        <select name="month" id="select2">
                            <option value ="01">1月</option>
                            <option value ="02">2月</option>
                            <option value ="03">3月</option>
                            <option value ="04">4月</option>
                            <option value ="05">5月</option>
                            <option value ="06">6月</option>
                            <option value ="07">7月</option>
                            <option value ="08">8月</option>
                            <option value ="09">9月</option>
                            <option value ="10">10月</option>
                            <option value ="11">11月</option>
                            <option value ="12">12月</option>
                        </select> 
                        - 
                        <select name="day" id="select3">
                            <option value ="01">1日</option>
                            <option value ="02">2日</option>
                             <option value ="03">3日</option>
                            <option value ="04">4日</option>
                             <option value ="05">5日</option>
                            <option value ="06">6日</option>
                             <option value ="07">7日</option>
                            <option value ="08">8日</option>
                             <option value ="09">9日</option>
                            <option value ="10">10日</option>
                        </select></td>
                </tr>
                <tr>
                    <th>联系人：</th>
                    <td><input class="TB2Input" type="text" name="company_contact" value=""/></td>
                </tr>
                <tr>
                    <th>联系电话：</th>
                    <td><input class="TB2Input" name="company_tel" type="text"value="" /></td>
                </tr>
                <tr>
                    <th>邮箱：</th>
                    <td><input class="TB2Input" name="company_email" type="text" value=""/></td>
                </tr>
              <tr>
                    <th>法人：</th>
                    <td><input class="TB2Input" name="company_corporation" type="text"value="" /></td>
                </tr>
                <tr>
                    <th>公司类型：</th>
                    <td><input class="TB2Input" name="company_type" type="text" value=""/></td>
                </tr>
                 <tr>
                    <th>公司详情：</th>
                    <td><textarea cols="30"  rows="5" name="compeny_detail"></textarea></td>
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
     var companyId =  $(this).data('id');
      location.href = 'company/company_detail?company_id='+companyId;
   });
	$('.btn5').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'company/company_edit?company_id='+employId;
   });
   
   $('.btn6').on('click', function(){
     var companyId =  $(this).data('id');
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