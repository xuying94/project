<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>公司管理</title>
  <meta name="description" content="这是一个 table 页面">
  <meta name="keywords" content="table">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <base href="<?php echo site_url();?>">
  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，我们暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'admin-header.php'; ?>

<div class="am-cf admin-main">
  <?php include 'admin-sidebar.php'; ?>

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">会员管理</strong> / <small>Table</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <!-- <button type="button" class="am-btn am-btn-default btn1"><span class="am-icon-plus"></span> 新增</button> -->
            <!-- <button type="button" class="am-btn am-btn-default btn2"><span class="am-icon-trash-o"></span> 删除</button> -->
          </div>
        </div>
      </div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr class="tr_title">
                <!-- <th class="table-check"><input type="checkbox" /></th> -->
                <th class="table-id">ID</th>
                <th class="table-title">姓名</th>
                <th class="table-type">求职类型</th>
                <th class="table-set">帐号</th>
                <th class="table-set">备注</th>
                <th class="table-type">操作</th>
                
              </tr>
          </thead>
          <tbody>
          <?php
            foreach($employs as $recruit){
          ?>
              <tr>
                <!-- <td><input type="checkbox" /></td> -->
                <td><?php echo $recruit -> employ_id;?></td>
                <td><a href="admin/show_employ?employ_id=<?php echo $recruit->employ_id;?>"title="点击查看详情"><?php echo $recruit -> employ_name; ?></a></td>
                <td><?php echo $recruit->employ_job_type;?></td>
                <td><?php echo $recruit->employ_account;?></td>
                <td>备注</td>
                <!-- <td><?php echo $recruit->recruit_add_time;?></td>
                <td><?php echo $recruit->recruit_num;?>名</td>
                <td><?php echo $recruit->recruit_contact;?></td>
                <td><?php echo $recruit->recruit_email;?>名</td> -->
                 <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button data-id="<?php echo $recruit -> employ_id; ?>"class="am-btn btn5 am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 查看</button>
                      <button data-id="<?php echo $recruit -> employ_id; ?>" class="am-btn btn6 am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </div>
                </td>
              </tr>
          <?php
            }
          ?>
          </tbody>
        </table>
        <div id="fenye">
			
				<?php echo $this->pagination->create_links();?>
			
		</div>
		<p class="notice">一共<span class="how_many"><?php echo $total_rows ?></span>条记录</p>
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
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
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
 	 $('.btn1').on('click', function(){
     // var adminId =  $(this).data('id');
     if(confirm('是否增加招聘信息')){
      location.href = 'admin/add_recruit_control';
     }
   });
   $('.btn5').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'admin/show_employ?employ_id='+employId;
   });
   // ******************删除操作***********************
   $('.btn6').on('click', function(){
     var employId =  $(this).data('id');
     if(confirm('确定是否删除记录，不可恢复!?')){
       location.href = 'admin/delete_employ?employ_id='+employId;
     }
   });
 });
</script>
</body>
</html>
