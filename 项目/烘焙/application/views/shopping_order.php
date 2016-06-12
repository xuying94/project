<?php
	$state = $this -> input -> get('order_state');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<base href="<?php echo site_url();?>"/>
	<link rel="stylesheet" href="assets/css/commonnn.css">
	<link rel="stylesheet" href="assets/css/shopping-order.css">
</head>
<body>

	<div class="header">

		<img src="assets/img/logo.png" alt="">
		<ul>
			<strong><li id="main_page">主页</li></strong>
			<li id="my_order">我的订单</li>
			<li>成为蛋糕师</li>
			<li>个人中心</li>
			<li>联系客服</li>
			<li><a href="">登录</a>/<a href="">注册</a></li>
		</ul>
		<img src="assets/img/1.jpg" alt="" id="my_picture">
		<span id="user_name">Mwtyyru</span>
		<p id="signature">个性签名</p>
		
	</div>
	<div class="container">
		
		
			
			<ul class="left_list">
				<li><a href=""><span></span>个人主页</a></li>
				<li><a href="">个人信息</a></li>
				<li><a href="">收藏</a></li>
				<li><a href="">购物订单</a></li>
				<li><a href="">消息</a></li>
			</ul>
			<img src="assets/img/list.png" alt="" class="list_pic">
			<img src="assets/img/person_pic.png" alt="" class="person_pic">
			<div class="right_container">
				<div id="search">
				<input type="text" class="search_text"/><input type="submit" class="search_submit" value="搜 索"/>
				</div>
				
				<ul class="shopping_list">

				<li <?php echo !$state?'class="order_list"':'' ?>><a href="welcome/shopping_order">所有购物订单 </a></li>
				<li <?php echo $state==1?'class="order_list"':'' ?>><a href="<?php echo "welcome/shopping_order?order_state=1" ?>">待付款 |</a></li>
				<li <?php echo $state==2?'class="order_list"':'' ?>><a href="<?php echo "welcome/shopping_order?order_state=2" ?>">待收货 |</a></li>
				<li <?php echo $state==3?'class="order_list"':'' ?>><a href="<?php echo "welcome/shopping_order?order_state=3" ?>">待评价 |</a></li>
				<li <?php echo $state==4?'class="order_list"':'' ?>><a href="<?php echo "welcome/shopping_order?order_state=4" ?>">订单回收站 |</a></li>

			</ul>
			<hr>
			
			<?php	
				foreach ($orders as $order) {
					
				
			?>
			<div id="order_content">
			<li class="top_content">
				<input type="checkbox" class="check">
				<p class="message_list"><?php echo $order ->order_date;?>
				订单名称：<?php echo $order ->product_name;?>
				烘焙师：<?php echo $order ->username;?></p>
				<a href="welcome/pass/<?php echo $order->order_id;?>" ><img src="assets/img/delete.png" class="delete_list"/></a>
			</li>
			
			<ul>
					<li class="order_one">
						<img src="uploads/<?php echo $order ->picture;?>"  class="product_picture"/>
						<p class="product_introduce"><?php echo mb_strlen($order ->product_introduce)<30 ? $order ->product_introduce : mb_substr($order ->product_introduce,0,30)."...";?></p>
						
						<p class="price"><?php echo $order ->product_price * $order ->amount*$order ->discount;?>元</p>
						<p class="amount">数量：<?php echo $order ->amount;?></p>
					</li>
					<li class="order_two">
						<?php 
						if($order ->order_state==0){
						echo"<p>确认付款</p>";
						echo"<p>移入收藏夹</p>";}
						if($order ->order_state==1){
						echo"<p>买家已付款</p>";
						echo"<p>订单详情</p>";
						echo"<p>查看物流</p>";}
						if($order ->order_state==2){
						echo"<p>交易成功</p>";
						echo"<p>订单详情</p>";}
						if($order ->order_state==3){
						echo"<p>删除订单</p>";
						;}
						?>
						
						
					</li>
					<li class="order_three">
						<?php if($order ->order_state==1){
						echo"<p>追加评论</p>";
						echo"<p>再次购买</p>";}
						?>
					</li>
			</ul>
			</div>
			<?php } ?>
		
		<div class="pages">
				<?php echo $this->pagination->create_links();?>

		</div>
		

	</div>
			</div>
	</div>
	<div class="footer">
		<ul class="about">
			<strong><li>关于</li></strong>
			<li>关于站酷</li>
			<li>版权声明</li>
			<li>关于隐私</li>
			<li>免费声明</li>
			<li>网站说明</li>
			<li>加入站酷</li>
		</ul>
		<ul class="column">
			<strong><li>栏目</li></strong>
			<li>原创作品</li>
			<li>设计文章</li>
			<li>佳作欣赏</li>
			<li>设计素材</li>
			<li>设计赛事</li>
			<li>精彩评论</li>
		</ul>
		<ul class="column">
			<strong><li>商务</li></strong>
			<li>企业服务</li>
			<li>赛事服务</li>
			<li>商业服务</li>
			<li>图片服务</li>
			<li>培训服务</li>
		</ul>
		<ul class="column">
			<strong><li>联系</li></strong>
			<li>在线服务</li>
			<li>联系我们</li>
			<li>站酷微博</li>
			<li>站酷微信</li>
		</ul>
		<ul class="column">
			<strong><li>帮助</li></strong>
			<li>站酷规则</li>
			<li>常见问题</li>
		</ul>
		<ul class="column">
			<strong><li>友链</li></strong>
			<li>中电云集</li>
			<li>星云网</li>
			<li>站长之家</li>
			<li>蜂鸟网</li>
			<li>更多</li>
		</ul>

	</div>
</body>
</html>