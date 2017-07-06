		$(function(){

			// 展开收起 回复内容
			$('.right-a').click(function(){
				if ($(this).text() =='回复') {
					$('.details .reply-frame').eq($('.details .right-a').index(this)).slideDown();
					$(this).html('收起回复')
				} else {
					$('.details .reply-frame').eq($('.details .right-a').index(this)).slideUp();
					$(this).html('回复')
				}
				
			})

			// 展开收起 回复工具
			$('.talk').click(function(){
					
			if ($('.details .p-publish').eq($('.details .talk').index(this)).css("display") =='none') {
				$('.details .p-publish').eq($('.details .talk').index(this)).slideDown();
			} else {
				$('.details .p-publish').eq($('.details .talk').index(this)).slideUp();
			}

			})
		})