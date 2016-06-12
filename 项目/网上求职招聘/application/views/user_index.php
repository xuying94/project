<?php
	if($this->session->userdata('login_user')){
		$login_user=$this->session->userdata("login_user");
		$employ_name=$login_user->employ_name;
		$employ_id=$login_user->employ_id;
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
<link href="css/css1.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/common.css" type="text/css"/>
<script src="js/jquery-1.11.3.min.js"></script>
<link rel="icon" type="image/png" href="images/logo1.jpg">

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
	<a class="inputBtn windowBtn">修改</a> <a  class="windowClose">关闭</a>
</div> -->
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
        <div class="rSearch shadow"> 关键词
        	<form action="welcome/search_recruit"method="get">
            <input name="key_word" type="text" value="公司/职位" onclick="this.value=''" class="rSearchInput" />
            <!-- <a class="search_type"></a> -->
            <br />
           学历
            <select name="employ_educate" id="select4">
                <option value="大专">大专</option>
                <option value="本科">本科</option>
                <option value="本科以上">本科以上</option>
            </select>
            <br />
            地区
            <select name="recruit_address" id="select5">
                <option value="全部">全部</option>
                <option value="北京">北京</option>
                <option value="上海">上海</option>
                <option value="深圳">深圳</option>
            </select>
            <br />
            类别
            <select name="recruit_type" id="select6">
                <option value="WEB">WEB</option>
                <option value="JAVA">JAVA</option>
                <option value="C/C++">C/C++</option>
                <option value="PHP">PHP</option>
            </select>
            <br />
            <input type="submit"class="inputBtn searchBtn"value="搜索"/>
            </form> </div>
        <div class="rType shadow"><strong>简历指导</strong><a title="查看更多文章"class="more_interview"href="welcome/get_all_interview">more</a>
            <ul>
                <table id="article_table">
				<tbody>
			          <?php
			            foreach($profile as $article){
			          ?>
              <tr>
                <td id="tiao"><li><a id="title"  href="welcome/show_article?article_id=<?php echo $article->article_id;?>"><?php echo $article ->title; ?></a></li></td>				            
                 <td>
                </td>
              </tr>           
          <?php
            }
          ?>
          </tbody>
          </table>
            </ul>
        </div>
        <div class="rType shadow"> 
        	  <strong>面试技巧</strong><a class="more_profile"href="welcome/get_all_profile">more</a>
        	  <table id="article_table">
				<tbody>
			          <?php
			            foreach($interview as $article){
			          ?>
              <tr>
                <td id="tiao"><li><a id="title"  href="welcome/show_article?article_id=<?php echo $article->article_id;?>"><?php echo $article ->title; ?></a></li></td>				            
                 <td>
                </td>
              </tr>           
          <?php
            }
          ?>
          </tbody>
          </table>
        	  </div>
    </div>
    <div class="left">
    	<div class="card shadow">
        	<a href="" class="select">岗位列表</a><a data-id="<?php echo $employ_id; ?>" class="my_favorate">我的搜藏</a><a data-id="<?php echo $employ_id; ?>"class="my_apply"href="javascript:0;">我的申请</a>
        </div>
        <?php
            foreach($recruits as $recruit){
          ?>
        <!-- 一条记录 开始 -->
        
        <div class="box1 shadow">
        	<div class="tit">
            	<h2><?php echo $recruit->recruit_name;?></h2>
                <div class="titText">
                	<div class="fr">
                        <a data-id="<?php echo $recruit->company_id;?>" class="btnC3 box1T3 company_detail"><?php echo $recruit->company_name;?></a><br />
                        <span class="box1T4">已推荐（0）</span>
                    </div>
                   
                </div>
        	</div>    
            <table class="TB1">
                <tr>
                    <th>发布日期：</th>
                    <td> <?php echo $recruit->recruit_add_time;?></td>
                </tr>
                <tr>
                    <th>工作地点：</th>
                    <td><?php echo $recruit->recruit_address;?></td>
                </tr>
            
                <tr>
                    <th>职位职能：</th>
                    <td><?php echo $recruit->recruit_detail;?></td>
                </tr>
            </table>
        </div>
        <a data-id="<?php echo $recruit->recruit_id;?>" href="javascript:0;" class="box1More shadow job_detail">查看详情</a>
        <!-- 一条记录 结束 -->
        <?php
            }
          ?>
        
        
		<div class="page">
			<?php echo $this->pagination->create_links();?>
        	<!-- <a href="#">上页</a>
            <a href="#" class="select">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a> ...
            <a href="#">9</a>
            <a href="#">下页</a>
       -->  </div>
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
   $('.my_apply').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'employ/my_apply?employ_id='+employId;
   });
   $('.my_favorate').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'employ/my_favorate?employ_id='+employId;
   });
   $('.job_detail').on('click', function(){
     var recruitId =  $(this).data('id');
      location.href = 'company/job_detail?recruit_id='+recruitId;
   });
   $('.company_detail').on('click', function(){
     var companyId =  $(this).data('id');
      location.href = 'company/show_company?company_id='+companyId;
   });
   
</script>