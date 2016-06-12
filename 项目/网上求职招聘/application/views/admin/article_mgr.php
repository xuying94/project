<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>文章管理</title>
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
<style>
	.page_list{
		position:absolute;
		left: 10px;
		background:#006699;
	}
	.notice{
		margin-left: 490px;
	}
	.yes{
		color:skyblue;
	}
	.no{
		color:red;
	}
</style>

<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'admin-header.php'; ?>

<div class="am-cf admin-main">
  <?php include 'admin-sidebar.php'; ?>

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">文章管理</strong> / <small>Table</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <button type="button" class="btn-change am-btn am-btn-default btn1" ><span class="am-icon-plus"></span> 增加新闻</button>
            <!-- <button type="button" class="am-btn am-btn-default btn2"><span class="am-icon-trash-o"></span> 删除</button> -->
          </div>
        </div>
      </div>
		      <div class="search_box">
		      	<form action="admin/search"method="get">
		      	<input type="text"placeholder="输入查询关键字" name="key_words">
		      	<button id="search-submit" type="submit" name="search-submit" >查询</button>
		      	</form>
		      </div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <!-- <th class="table-check"><input type="checkbox" /></th> -->
                <th class="table-id">ID</th>
                <th class="table-title">文章名</th>
                <!-- <th class="table-type">作者</th> -->
                <th class="table-type">发表时间</th>
                <!-- <th class="table-set">点击量</th> -->
                <th class="table-set">文章类型</th>
                <th class="table-type">操作</th>
              </tr>
          </thead>
          <tbody>
          <?php
            foreach($articles as $article){
          ?>
              <tr>
                <!-- <td><input type="checkbox" /></td> -->
                <td><?php echo $article -> article_id;?></td>
                <td><a href="admin/show_article?article_id=<?php echo $article->article_id;?>"><?php echo $article ->title; ?></a></td>
                <!-- <td><?php echo $article->content;?></td> -->
                <td><?php echo $article->article_date;?></td>
                <td><a class="<?php echo $article->article_type_class;?>"><?php echo $article->article_type;?></a></td>
                <!-- <td><?php echo $article->comm_rate;?></td> -->
                 <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button data-id="<?php echo $article -> article_id; ?>"class="am-btn btn3 am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 修改</button>
                      <button data-id="<?php echo $article -> article_id; ?>" class="am-btn btn2 am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </div>
                </td>
              </tr>
              
          <?php
            }
          ?>
         
          </tbody>
        </table>
        <!-- <table border="1" align="center" width="300" height="30">
			<tr>
				<td></td>
			</tr>
		</table> -->
		<div id="fenye">
			
				<?php echo $this->pagination->create_links();?>
		
		</div>
		<!-- <p class="notice">一共<span class="how_many"><?php echo $total_rows ?></span>条记录</p> -->
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
     var blogId =  $(this).data('id');
     if(confirm('确定是否增加新闻？')){
       //location.href = 'admin/update_blog?blog_id='+blogId;
       location.href='admin/add_article';
     }
   });
   // ******************删除操作***********************
   $('.btn2').on('click', function(){
     var articleId =  $(this).data('id');
      //alert($messageId);
     if(confirm('确定是否删除记录，不可恢复!?')){
       location.href = 'admin/delete_article?article_id='+articleId;
     }
   });
   
   // ********************function 增加文章*************************
     $('.btn3').on('click', function(){
     var articleId =  $(this).data('id');
     if(confirm('确定是否修改文章，不可恢复!?')){
      location.href='admin/update_article?article_id='+articleId;
    }
   });
   
   $('#automatic').on('click', function(){
     var articleId =  $(this).data('id');
      //alert($messageId);
     if(confirm('确定是否删除记录，不可恢复!?')){
       location.href = 'admin/delete_article?article_id='+articleId;
     }
   });
   
   
   
 });
</script>
</body>
</html>
