<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>修改密码</title>
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
  #btn_back{
  	background:
  	color:pink;
  }
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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">修改密码</strong>
    </div>

    <hr/>

    <div class="am-g">

      <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
      
        <div class="am-panel am-panel-default">
          
        </div>

      </div>
      <!-- *********************表单内容：************************ -->
      <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
        <form class="am-form am-form-horizontal"action="admin/update_pwd" method="post">
          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label" value="">旧密码</label>
            <div class="am-u-sm-9">
              <input type="text" id="user-name" border-width:"0" required="required" placeholder="请输入旧密码" name="old_pwd" value="">
              <small>原密码</small>
            </div>
          </div>

          <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label"> 新密码</label>
            <div class="am-u-sm-9">
              <input type="text" id="user-email" required="required"placeholder="请输入新密码" name="new_pwd1" value="">
              <small>输入新密码</small>
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-intro" class="am-u-sm-3 am-form-label">确认新密码 </label>
           <div class="am-u-sm-9">
              <input type="text" id="user-email" required="required"placeholder="请确认新密码" name="new_pwd2" value="">
              <small>确认新密码</small>
            </div>
          </div>
          
  
          <div class="am-form-group">
          	
            <div class="am-u-sm-9 am-u-sm-push-3">
            	<input type="submit"value="保存"class="am-btn am-btn-primary"/>
              <!-- <a href="admin/update_pwd"><button type="button" class="am-btn am-btn-primary" name="sub" >保存</button></a> -->
            </div>
          </div>
      <!-- *********************评论内容：************************ -->


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

