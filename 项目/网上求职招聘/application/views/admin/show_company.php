<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>公司管理</title>
  <meta name="description" content="这是一个 user 页面">
  <meta name="keywords" content="user">
  <base href="<?php echo  site_url();?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">
  <style>
  	#show{
  		width:300px;
  		height:200px;
  		float:left;
  		
  	}
  </style>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->
<?php include 'admin-header.php'; ?>
<?php include 'admin-sidebar.php'; ?>


  <!-- sidebar end -->

  <!-- content start -->
  <div class="admin-content">
    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">招聘信息展示</strong> / <small>Recruit information</small></div>
    </div>

    <hr/>

    <div class="am-g">

      <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
        
        <div class="am-panel am-panel-default">
        </div>

      </div>
      <!-- *********************表单内容：************************ -->
      <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
        <form class="am-form am-form-horizontal" action="admin/change_recruit" method="post">
          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label" value="">公司名称</label>
            <div class="am-u-sm-9">
              <input type="text" id="user-name" readonly="readonly"placeholder="公司名称" name="recruit_name" value="<?php echo $company ->company_name?>">
              <input type="hidden" name="rid" value=<?php echo $company ->company_id?>
                        <br>
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label" value="">公司账号 </label>
            <div class="am-u-sm-9">
              <input type="text" id="user-name" readonly="readonly"placeholder="公司账号" name="recruit_salary" value="<?php echo $company  ->company_account?>">
            </div>
          </div> 

         <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">账号密码</label>
            <div class="am-u-sm-9"> 
              <input type="text" id="user-email" readonly="readonly"placeholder="账号密码" name="recruit_address" value="<?php echo $company  ->company_password?>">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label" value="">公司类型</label>
            <div class="am-u-sm-9">
              <input type="text" id="user-name" readonly="readonly"placeholder="公司类型" name="recruit_work_time" value="<?php echo $company  ->company_type?>">
            </div>
          </div> 

         <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">公司法人</label>
            <div class="am-u-sm-9"> 
              <input type="text" id="user-email" readonly="readonly"placeholder="公司法人" name="recruit_num" value="<?php echo $company->company_corporation?>">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-intro" class="am-u-sm-3 am-form-label">公司详情</label>
           <div class="am-u-sm-9">
              <textarea class="" rows="10" id="user-intro" readonly="readonly"placeholder="公司详情" name="recruit_detail" ><?php echo $company ->company_detail?></textarea>
            </div>
          </div>
			<!-- <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">联系人</label>
            <div class="am-u-sm-9"> 
              <input type="text" id="user-email" readonly="readonly"placeholder="输入作者名 / Author" name="recruit_contact" value="<?php echo $company->recruit_contact?>">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label" value="">联系方式</label>
            <div class="am-u-sm-9">
              <input type="text" id="user-name" readonly="readonly"placeholder="修改时间 / Time" name="recruit_email" value="<?php echo $company  ->recruit_email?>">
            </div>
          </div>  -->
          <div class="am-form-group">
          	
            <div class="am-u-sm-9 am-u-sm-push-3">
              <a href="admin/company_mgr"><button type="button" class="am-btn am-btn-primary" name="sub" >返回-></button></a>
            </div>
          </div>
      <!-- *********************评论内容：************************ -->

      <div id="show">
      <!-- <h1><?php echo $blog->title;?></h1><br />
		<p><?php echo $blog->author;?></p><br />
		<textarea rows="20" cols="50"><?php echo $blog->content;?></textarea> -->
		</div>
    </div>
  </div>
  <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>

<script src="assets/js/app.js"></script>
<script>
$(function(){
 	// ***********************增加管理员操作*****************************
   $('.btn3').on('click', function(){
     var commentId =  $(this).data('id');
       //location.href = 'admin/update_blog?blog_id='+blogId;
       location.href='admin/delete_comment?comment_id='+commentId;
     
   });
   // ******************删除操作***********************
   $('.btn4').on('click', function(){
     var commentId =  $(this).data('id');
      console.log($commentId);
     if(confirm('确定是否删除记录，不可恢复!?')){
       location.href = 'admin/delete_comment?comment_id='+commentId;
       alert($comment_id);
     }
   });
   
   // ********************function 增加文章*************************
   
   
 });
</script>
</body>
</html>

