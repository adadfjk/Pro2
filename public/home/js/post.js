$(function(){

	$('.sign').click(function(){


	
		F_id=$('#F_id').val();
		U_id=$('#U_id').val();


		if ($('#sign-span').text() == '签到') {

		$.ajax({
		   type: "GET",
		   url: "/home/sign/add",
		   data: {"F_id":F_id,"U_id":U_id},
		   success: function(data){

		   		// console.log(data);
		   		if (data == '签到成功') {
		   			$('#end').html('<a href="javascript:void(0);" ><span class="article"  >已签到</span></a>');
		   		} 
		   



		   },
		  
		});

		}


		
		
	})






})