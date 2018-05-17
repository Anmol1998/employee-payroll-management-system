$(document).ready(function(){

//Navbar
$("#navbar").height($("#fixednav").outerHeight());

var navoffset=$("#fixednav").offset().top;
var lastscroll=0;
$(window).scroll(function(){
var scrollpos=$(window).scrollTop();
if(scrollpos>=navoffset){								//scroll more than logo
$("#fixednav").addClass("fixed");
}
else{													//scroll less than logo
$("#fixednav").removeClass("fixed");
}

if(scrollpos<lastscroll){								//scroll up
$("#fixednav").addClass("fixed-below");
$("#logo").addClass("fixed");
$("body").addClass("scrollup");
}
else{													//scroll down
$("#fixednav").removeClass("fixed-below");
$("#logo").removeClass("fixed");
$("body").removeClass("scrollup");
}
lastscroll=scrollpos;
});


 //Initialising modal
$('.modal-trigger').leanModal();


      


});

