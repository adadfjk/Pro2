$(function(){


function Time(nS) {     
    return new Date(parseInt(nS) * 1000).toLocaleString().substr(0,17)}; 



 // console.log($('.time').text());

 	for (var i = 0; i < $('.time').length; i++) {

 		$('.time').eq(i).html(Time($('.time').eq(i).text()));

 	}

})






