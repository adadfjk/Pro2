$(function(){
			//绑定单击事件
			$("#option li").click(function(){
				//显示li
				$("#option li").removeClass('active').eq($(this).index()).addClass('active');
				//显示右边DIV
				$('.box').removeClass('show').eq($(this).index()).addClass('show');
			})

			//划入道具显示使用
			$('.room .prop').mousemove(function(){
				$('.room a').eq($('.room .prop').index($(this))).addClass('use');
			})

			//划出道具隐藏使用		
			$('.room .prop').mouseout(function(){
				$('.room a').removeClass('use');
			})



      
			// 获取天气
			$('#temp3').click(function(){
				// console.log(returnCitySN["cip"]);

  				 $.ajax({
		            type: "GET",
		            url: "/weather",
		            data: {"ip":returnCitySN["cip"]},
		            success: function(data){

		               $("#temp1").html('<p>'+data.result.date+'&nbsp;&nbsp;&nbsp;'+data.result.week+'</p><p>'+data.result.city+'天气情况</p><p>'+data.result.weather+'&nbsp;&nbsp;&nbsp;'+ data.result.temp+'°</p><img src=/imgs/weathercn/'+data.result.img+'.png>');
		    
		               // console.log(data.result.img);
		               
		            },
		            dataType:'json'
		        });
			})

			function week(){
				var objDate= new Date();
				var week = objDate.getDay();
				switch(week)
				{
					case 0:
						week="周日";
						break;
					case 1:
						week="周一";
						break;
					case 2:
						week="周二";
						break;
					case 3:
						week="周三";
						break;
					case 4:
						week="周四";
						break;
					case 5:
						week="周五";
						break;
					case 6:
						week="周六";
						break;
				}
				$("#sing_for_number").html( week );
			}
			week();
			$(".singer_r_img").click(function(){
				$(this).addClass("current");
				$.ajax({
					url:'checkIn',
					type:'get',
					data:{'sign':1},
					success:function (data) {
						if(data == 0){
							$('.signDesc').html('今天已签到').css({'font-size':'16px','line-height':'45px'})
						}else{
							$('.signDesc').html("<span>连续签到"+ data.sustaindays +"天</span><span>累计签到"+ data.sumdays +"次</span>")
							$('#point').html(data.point)
							if (data.level) {
								$('#level').attr('src', 'home/imgs/lv'+ data.level +'.gif')
							}

						}
					},
					dataType:'json'
				})
			})
		     
						
				
				
		})