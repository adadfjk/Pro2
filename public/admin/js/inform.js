$(function(){

	console.log($('.inform-id').text());
	console.log($('.status').text());
	console.log($('.inform-status').text());

	for (var i = 0; i < $('.inform-status').length; i++) {
		if ($('.inform-status').eq(i).text() == '发送通知') {
		$('.inform-status').eq(i).html('<a href="/admin/inform/alter?id='+$('.inform-id').eq(i).text()+'">发送通知</a>');
		}
	}
	
})





