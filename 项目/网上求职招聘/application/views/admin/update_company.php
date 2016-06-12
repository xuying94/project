<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>修改招聘信息</title>
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
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">修改招聘信息</strong> / <small>Personal information</small></div>
    </div>

    <hr/>

    <div class="am-g">

      <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
      </div>

      <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
        <form class="am-form am-form-horizontal" action="admin/change_recruit" method="post">
          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label" value="">职位名称</label>
            <div class="am-u-sm-9">
              <input type="text" id="user-name" placeholder="作者 / Author" name="recruit_name" value="<?php echo $recruit ->recruit_name?>">
              <input type="hidden" name="rid" value=<?php echo $recruit ->recruit_id?>
                        <br>
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label" value="">薪资待遇 </label>
            <div class="am-u-sm-9">
              <input type="text" id="user-name" placeholder="修改时间 / Time" name="recruit_salary" value="<?php echo $recruit  ->recruit_salary?>">
            </div>
          </div> 

         <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">工作地点</label>
            <div class="am-u-sm-9"> 
              <input type="text" id="user-email" placeholder="输入作者名 / Author" name="recruit_address" value="<?php echo $recruit->recruit_address?>">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label" value="">经验要求</label>
            <div class="am-u-sm-9">
              <input type="text" id="user-name" placeholder="修改时间 / Time" name="recruit_work_time" value="<?php echo $recruit  ->recruit_work_time?>">
            </div>
          </div> 

         <div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">招聘人数</label>
            <div class="am-u-sm-9"> 
              <input type="text" id="user-email" placeholder="输入作者名 / Author" name="recruit_num" value="<?php echo $recruit->recruit_num?>">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-intro" class="am-u-sm-3 am-form-label">职位描述</label>
           <div class="am-u-sm-9">
              <textarea class="" rows="10" id="user-intro" placeholder="输入文章内容" name="recruit_detail" ><?php echo $recruit ->recruit_detail?></textarea>
            </div>
          </div>
			<div class="am-form-group">
            <label for="user-email" class="am-u-sm-3 am-form-label">联系人</label>
            <div class="am-u-sm-9"> 
              <input type="text" id="user-email" placeholder="输入作者名 / Author" name="recruit_contact" value="<?php echo $recruit->recruit_contact?>">
            </div>
          </div>
          <div class="am-form-group">
            <label for="user-name" class="am-u-sm-3 am-form-label" value="">联系方式</label>
            <div class="am-u-sm-9">
              <input type="text" id="user-name" placeholder="修改时间 / Time" name="recruit_email" value="<?php echo $recruit  ->recruit_email?>">
            </div>
          </div> 
          <div class="am-form-group">
            <div class="am-u-sm-9 am-u-sm-push-3">
              <button type="submit" class="am-btn am-btn-primary" name="sub" >保存修改</button>
              <a href="admin/recruit"><button type="button" class="am-btn am-btn-primary" name="sub" >返回-></button></a>
            </div>
          </div>
            
        </form>
      </div>
    </div>
  </div> -->
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
</body>
</html>

