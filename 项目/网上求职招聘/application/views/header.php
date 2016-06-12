<?php
	if($this->session->userdata('login_user')){
		$login_user=$this->session->userdata("login_user");
		$employ_name=$login_user->employ_name;
		$employ_id=$login_user->employ_id;
	}else{
		$employ_name="未登录";
	}
?>
<div class="topBg">
    <div class="top layout"></div>
        <div class="nav layout"> 
            <a href="welcome/index">首页</a>
            <a href="welcome/company_all">公司</a>
            <a href="employ/user_news">消息</a>
            <a href="javascript:0;" class="navEnd user_option selected"><?php echo $employ_name?></a>       
        </div>
     <ul class="select_option"style="display:none;">
        <li><a data-id="<?php echo $employ_id; ?>"class="btn4"href='javascript:0;'>资料</a></li>
        <li><a data-id="<?php echo $employ_id; ?>"class="btn5"href='javascript:0;'>设置</a></li>
        <li><a href="welcome/loginout">退出</a></li>
      </ul>
</div>

<script>
    $(document).ready(function(){

        $(".user_option").click(function() {
          
            $(".select_option").animate({
              height:'toggle'
            });
        
        });
        
        $('.btn4').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'employ/user_center?employ_id='+employId;
   });
   
   $('.btn5').on('click', function(){
     var employId =  $(this).data('id');
      location.href = 'employ/user_edit?employ_id='+employId;

   });


    });
   
</script>