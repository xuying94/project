<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>蛋糕师---蛋糕列表</title>
	<base href="<?php echo site_url();?>">
	<!--<link rel="stylesheet" href="css/common.css">-->
	<link rel="stylesheet" href="assets/css/cake-list.css">
</head>
<body>
	<!--内容区开始开始-->
	<div class="container">
	<!--左侧菜单开始-->
		<div id="left">
			<div id="category">所有分类</div>
				<ul id="left-list">
					<!--<li class="category1">&nbsp;&nbsp;宝贝分类</li><hr color="#d6d6d6" size="1px">-->
					<a href="product/cake_list"><li class="category1">》查看所有宝贝</li></a><hr color="#d6d6d6" size="1px">
					<?php 
						foreach ($results as $result){
							//if($ -> category_p_id == null){
					?>
					<a class="query1" data-query="cate1|<?php echo $cate -> category_id;?>" href="javascript:;"><li class="category1">》<?php echo $cate -> category_name;?></li></a><hr color="#d6d6d6" size="1px">
					
				<?php
							}
					//}
				?>
				</ul>
			</div>	
		
		<!--左侧菜单结束-->
		<!--搜索栏开始-->
		<div id="search">
			<ul>
				<li id="all-category">
					<span id="cate"><img src="assets/img/cate.png"></span>
					所有宝贝
				</li>
				<li class="search-list">
					<ul class="list">
						<li class="category2" >筛选条件:</li>
						<li class="category2"><a href="#">6寸</a></li>
					</ul>
				</li>
				<li class="search-list">
					<ul class="list">
						<li class="category2" >蛋糕分类:</li>
						<?php 
							foreach($cates2 as $cate2){
						?>
						<li class="category2" ><a class="query" data-query="cate2|<?php echo $cate2 -> category_id;?>" href="javascript:;"><?php echo $cate2 -> category_name;?></a></li>
						<?php 
							}
						?>
					</ul>
				</li>
				<li class="search-list" >
					<ul class="list">
						<li class="category2" >尺寸分类:</li>
						<li class="category2"><a class="query" data-query="size|6" href="javascript:;">6寸</a></li>
						<li class="category2"><a class="query" data-query="size|7" href="javascript:;">7寸</a></li>
						<li class="category2"><a class="query" data-query="size|8" href="javascript:;">8寸</a></li>
						<li class="category2"><a class="query" data-query="size|9" href="javascript:;">9寸</a></li>
					</ul>
				</li>
				<li class="search-list" >
					<ul class="list">
						<li class="category2" >蛋糕价格:</li>
						<li class="category2"><a class="query" data-query="pril|0-100" href="javascript:;">0~100元</a></li>
						<li class="category2"><a class="query" data-query="pril|100-200" href="javascript:;">100~200元</a></li>
						<li class="category2"><a class="query" data-query="pril|200-300" href="javascript:;">200~300元</a></li>
					</ul>
				</li>
				<li class="search-list" id="search-list1">
					<span>更&nbsp;多&nbsp;V</span>
				</li>
				<li class="search-list" id="search-result">
					<p>共搜索到78个符合条件的商品</p>
					<form>
						关键字：<input type="input" id="key">
						价格：<input type="input" class="search-price">
						到&nbsp;<input type="input" class="search-price">
						<input type="submit" id="btn" value="搜 索">
					</form>
				</li>
				
					<?php
						$sort = $this->input->get('sort');
						$sort_type = 'desc';
						if($sort){						
							$sort_type = substr($sort, strpos($sort, '-') + 1);
							$sort_type = $sort_type == 'desc'?'asc':'desc';
						}
					?>
				<li class="search-list" id="search-list2">
					<ul class="list" id="rank">
						<li class="category2">排序:</li>
						<li class="category2"><a class="query" data-query="sort|collect-<?php echo $sort_type ;?>" href="javascript:;">人气&nbsp;<img src="assets/img/top.png"></a></li>
						<li class="category2"><a class="query" data-query="sort|sell-<?php echo $sort_type ;?>" href="javascript:;">销量&nbsp;<img src="assets/img/top.png"></a></li>
						<li class="category2"><a class="query" data-query="sort|newproduct-<?php echo $sort_type ;?>" href="javascript:;">新品&nbsp;<img src="assets/img/top.png"></a></li>
						<li class="category2"><a class="query" data-query="sort|price-<?php echo $sort_type ;?>" href="javascript:;">价格&nbsp;<img src="assets/img/top.png"></a></li>
					</ul>
				</li>
			</ul> 
		</div>
		<!--搜索栏结束-->
		<!--蛋糕列表开始-->
		<div id="content">
		<?php
		$i = 0;
		foreach($cakes as $cake){
		?>
			<div class="cake">
				<a href=""><img src="<?php echo $cake -> picture_thumb;?>"></a>
				<div  class="desc">
					<div class="row-1">
						<span >￥<?php echo $cake -> price;?></span>
						<strong><p><a href="#"><?php echo $cake -> product_introduce;?></a></p></strong>
					</div>
					<div class="row-2">
						<span style="margin-left: 16px;">销&nbsp;量&nbsp;:&nbsp;    <strong><?php echo $cake ->sales;?>&nbsp;&nbsp;&nbsp;|</strong></span>
						<span style="margin-left: 16px;">评&nbsp;论&nbsp;:&nbsp;    <strong><?php echo $cake -> comms;?></strong></span>
					</div>
					<div class="row-3">
						<span class="row-3-i"><img src="assets/img/bakerlogo.gif"></span> 
						<span class="baker-city" style="margin-left:73px;"><?php echo $cake -> address;?></span>  
						<span class="baker-name"><?php echo $cake -> nickname;?></span>
					</div>
					<div class="row-4">
						<span style="margin-left: 12px; background: #f88181;">可预订</span>
						<span style="background: #8766bc;">可销售</span>
					</div>
				</div>
			</div>
			<?php 
			$i++;
			}
			?>
		</div> 
		<!--蛋糕列表结束-->
    </div>
    <!--内容区结束-->
    <script src="assets/js/require.js" data-main="assets/js/cake_list.js"></script>
</body>
</html>