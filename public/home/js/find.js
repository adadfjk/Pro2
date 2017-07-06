$(function(){


	$('#phone').blur(function(){

		$.ajax({
		   type: "GET",
		   url: "/home/find",
		   data: {"phone":$('#phone').val()},
		   success: function(data){

		  Email=data[0].UserEmail;
	
			if(!(Email == null)){
				$('.tip').eq(0).text('手机号码正确');
				$('#find-e').slideDown();

				} else{
					$('.tip').eq(0).text('手机号码错误');
				}
		   },
		   dataType:'json'
		});


	})



		$('#email').blur(function(){

		$.ajax({
		   type: "GET",
		   url: "/home/find",
		   data: {"phone":$('#phone').val()},
		   success: function(data1){


		  	Email=data1[0].UserEmail;
	
			if(Email == $('#email').val()){
				$('.tip').eq(1).text('邮箱正确请输入新的密码');
				$('#find-p').slideDown();

				} else {
					$('.tip').eq(1).text('邮箱错误请重新输入');
				}
		   },
		   dataType:'json'
		});

	})


		


		$('#pass').blur(function(){
	


			if($('#pass1').val() == $('#pass').val()){
				$('#submit').slideDown();
				$('.tip').eq(3).text('请提交修改');
			}
		})


	

})