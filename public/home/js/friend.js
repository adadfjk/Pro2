	$(function(){
		$("#expression a").click(function(){
	
			$("#editor").append($(this).html());	
			$('.bs-example').hide();

		})
	
			$('#face').click(function(){
				$('.bs-example').show();
					
			})
		
			$("#content").scrollTop(300);

	})