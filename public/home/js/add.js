$(function(){

		// 回复主贴
	$('.publish').click(function(){
		T_id=$(this).attr("value");
		U_id=$('#user').val();
		details=$(this).prev().val(); 


		$.ajax({
		   type: "GET",
		   url: "/home/revertant/add",
		   data: {"T_id":T_id,"U_id":U_id,"F_id":F_id,"details":details},
		   success: function(data){

		   	console.log(data);
		   	// if (data=="添加成功") {
		   		// $("#temp").tmpl(data).appendTo("#list");
		   	// }
		   	

		   }
		});
	})

})