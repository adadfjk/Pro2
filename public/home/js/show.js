$(function(){
	// console.log($('.show'));

	for (var i = 0; i < $('.show').length; i++) {

		F_id=$('.show').eq(i).attr('value');

		// console.log(F_id);


		$.ajax({
		   type: "GET",
		   url: "/recommend/show",
		   data: {"F_id":F_id},
		   success: function(data){
		   		// $('.show').eq(i).html('');
		   		// if (data.data[0].headline ==null) {
		   	
		   		for (var k = 0; k < 4; k++) {
		   			$('.show').eq(k).append("<li>"+data.data[k].headline+"</li>");
		   			$('.headline-img').eq(k).attr("src",data.data[k].picture);
		   			// $('.headline-img').eq(1).attr("src",data.data[1].picture);
		   			// $('.headline-img').eq(2).attr("src",data.data[2].picture);
		   			// $('.headline-img').eq(3).attr("src",data.data[3].picture);
		   			console.log(data.data);
		   		}
		   		// console.log(data.data[0].headline);
		   			
		   		// }
		   		// if (data.data[1].headline) {
		   		// 	$('show').eq(i).appendTo("<li>"+data.data[1].headline+"</li>");
		   		// }
		   		// if (data.data[2].headline) {
		   		// 	$('show').eq(i).appendTo("<li>"+data.data[2].headline+"</li>");
		   		// }
		


		   },
		  
		});








	}
})