	$(function(){
			// 点击图片显示隐藏 
			$('#classify a').click(function(){
				
				if ($(this).text() == '1') {
					$(this).closest('.categorys-hd').find(".col-md-2").slideUp();
				
					$(this).text('2');
					$(this).css("background-position","-40px -40px");

				} else {
					$(this).closest('.categorys-hd').find(".col-md-2").slideDown();
					
					$(this).text('1');

					$(this).css("background-position","-40px 0px");
				}
			});
			//鼠标划入触碰图片切换
			$('#classify a').mouseover(function(){
				if ($(this).text() == '1') {
					
					$(this).css("background-position","-40px -40px");

				} else {
				
					$(this).css("background-position","-40px 0px");
				}
			});

			//鼠标滑出触碰图片
			$('#classify a').mouseout(function(){
				if ($(this).text() == '1') {
					
					$(this).css("background-position","0px -40px");

				} else {
				
					$(this).css("background-position","0px 0px");
				}
			});

			

	


		})