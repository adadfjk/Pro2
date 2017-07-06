$(function(){
    // 移入变色
    $('#sign li').mouseover(function(){


        $(this).css({"background": "#85c155" });

        $('#sign  a').eq($('#sign li').index($(this))).css('color',"#fff");

    })
    // 移出变色
    $('#sign li').mouseout(function(){


        $(this).css({"background": "" });


        $('#sign  a').css('color',"#4ba733");

    })
})
