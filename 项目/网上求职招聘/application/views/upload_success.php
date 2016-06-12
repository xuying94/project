<?php
	if($this->session->userdata('login_user')){
		$login_user=$this->session->userdata("login_user");
		$employ_name=$login_user->employ_name;
		$employ_id=$login_user->employ_id;
		// var_dump($employ_id);
		// die;
	}else{
		$employ_name="未登录";
	}
?>
<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>上传成功</h3>

<ul>
<?php foreach($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('employ/user_center', '返回'); ?></p>

</body>
</html>