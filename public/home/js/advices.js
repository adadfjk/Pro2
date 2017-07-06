$(function(){



function Time(nS) {     
    return new Date(parseInt(nS) * 1000).toLocaleString().substr(0,17)}; 



function times(){
	for (var i = 0; i < $('.time').length; i++) {

 		$('.time').eq(i).html(Time($('.time').eq(i).text()));

 	}
};

	// 创建主贴
	$('#send').click(function(){

		content=$('#advices').val();
		U_id=$('#user').val();
		T_id=$('#T_id').val();
		F_id=$('#F_id').val();
		

		$.ajax({
		   type: "GET",
		   url: "/home/reply/add",
		   data: {"T_id":T_id,"U_id":U_id,"F_id":F_id,"content":content},
		   success: function(data){



		   	// console.log(data);
		   	// if (data=="添加成功") {
		   	 
		   		$("#temp").tmpl(data).appendTo("#list");
		   	// }
		   	
		   	$('#advices').val("");

		   },
		   dataType:'json'
		});

	})






	// 回复主贴
	$('.publish').click(function(){
		T_id=$(this).attr("value");
		U_id=$('#user').val();
		details=$(this).prev().val(); 



		$.ajax({
		   type: "GET",
		   url: "/home/revertant/add",
		   data: {"T_id":T_id,"U_id":U_id,"details":details},
		   success: function(data1){
		   		 id="#id"+T_id;
		   		 $("#temp1").tmpl(data1).appendTo('#id'+T_id);


		   		 
		   	// console.log(data1);
		   	// if (data=="添加成功") {
		   		// $("#temp").tmpl(data).appendTo("#list");
		   	// }
		   	

		   },
		  
		});
	})



	// 点击查看回复
	
		$('.right-a').click(function(){
			T_id=$(this).attr("value");

			// console.log($(this).text());

			if ($(this).text()=='收起回复') {
					$.ajax({
					   type: "GET",
					   url: "/home/revertant/show",
					   data: {"T_id":T_id},
					   success: function(data2){

					   	// console.log(data2);
					   	   id="#id"+T_id;

					   	// if (data=="添加成功") {
					   		$("#temp1").tmpl(data2).appendTo('#id'+T_id);

					console.log($('.time1'))

					
					for (var i = 0; i < $('.time1').length; i++) {

							if (($('.time1').eq(i).text())%1 === 0) {
								$('.time1').eq(i).html(Time($('.time1').eq(i).text()));
							}
			 			
					   			}
					   	// }
					   		

					   },
					   dataType:'json'
					});
					} else{
						$('#id'+T_id).html('');
					}


	

		})


	//点击关注

 	$('#attention').click(function (){
 		U_id=$('#user').val();
		F_id=$('#F_id').val();
		Fname=$('#Fname').text();
		

		console.log($('#attention').attr('value'));
		
		if($('#attention').attr('value') =='关注'){
			$.ajax({
			   type: "GET",
			   url: "/home/attention/add",
			   data: {"F_id":F_id,"U_id":U_id,"Fname":Fname},
			   success: function(data3){
			   		console.log(data3);
			   		if (data3=='关注成功') {
			   			$('#attention').html('<img src="/imgs/取消关注.jpg">').attr("value","取消关注");
			   		}
			   	},
			  
			});
		} else {

			$.ajax({
			   type: "GET",
			   url: "/home/attention/del",
			   data: {"F_id":F_id,"U_id":U_id},
			   success: function(data3){
			   		console.log(data3);
			   		if (data3=='取消关注') {
			   			$('#attention').html('<img src="/imgs/关注.png">').attr("value","关注");
			   		}
			   	},
			  
			});
		}


 	})



	
})