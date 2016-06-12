require(['jquery'],function($){
    $(function(){
        $('#a').blur(function(){
            $username = $(this).val();
            
            $.post('user/check_username',{username: $username},function(data){
                if(data == 'success'){
                    $('#name_tip').text('该用户名以被注册过，请更改');
                }else{
                    $('#name_tip').text('该用户名可以使用');
                }
            },'text');
        
        });
    });
  
});