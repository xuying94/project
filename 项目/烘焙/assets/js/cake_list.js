require(['jquery','conda'],function($,conda){
	$('.query1').on('click',function(){
		var query = $(this).data('query');
		var queryType = query.substring(0,query.indexOf('|'));
		var queryValue = query.substring(query.indexOf('|')+1);
		var url = 'http://localhost/hongbei/index.php/product/cake_list?';				
		url += '&' + queryType + '=' + queryValue;
		location.href = url;
	});

	$('.query').on('click',function(){
		conda(this);
	});
});