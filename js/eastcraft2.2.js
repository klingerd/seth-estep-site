var onloadCallback = function() {
    grecaptcha.render('grecaptchaDiv', {
        'sitekey' : '6LceKAoUAAAAAMqiV1-TBMJJqbYn_cOaiKvF8Vbv',
        'callback' : function(response){
        	$("#contactForm").validate().element("#hiddenRecaptcha");
        }
    });
};
var myScrolledVar=false;
var introClass=(function(){ 
	var reload=false;
	var getPageVal=function(url){
		var pageName=url.replace(/^[^:]+:\/\/[^/]+/, '').replace(/#.*/, '');
		console.log("pagename= "+pageName);
		switch(pageName){
			case "/": return 0;
				break;
			case "/furniture/": return 1;
				break;
			case "/custom/": return 2;
				break;
			case "/about/": return 3;
				break;
			case "/contact/": return 4;
				break;
			default: return -1;
		}
	};
	
	if(window.performance){
		if(performance.navigation.type  == 1 ){
            reload=true;
          }
	}
	
	var lastPageVal=getPageVal(document.referrer);
	var curPageVal=getPageVal(document.URL);
	if(lastPageVal === -1 || curPageVal === -1 || curPageVal === lastPageVal || reload === true){
		if ( curPageVal===-1){
			console.log("err determining intro: unknown current page");
		}
		return "default-intro";
	}else if(lastPageVal < curPageVal){
	 	return "r-l-intro";
	 }else{
	 	return "l-r-intro";
	 }
})();

console.log("introClass= "+introClass);




$(document).ready(function() {

	$(".fading-pic-series img").addClass("reveal");
	
	var	mainContent=$('.main-content');
	mainContent.addClass(introClass);
	mainContent.removeClass("hiddenstart");
	$(function() {
  		$('a[href*="#"]:not([href="#"])').click(function() {
    		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      			var target = $(this.hash);
      			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      			console.log("target = "+target.prop('outerHTML'));
      			if (target.length) {
      				var contentDisplay=$('.content-display');
      				var newScroll=target.offset().top - $('.content-and-footer').offset().top -30;
      				
      				console.log("target.offset().top - $(.content-and-footer).offset().top : "+
      					target.offset().top+" - "+$(".content-and-footer").offset().top+" = "+ newScroll);
        			$('.content-display').animate({
          				scrollTop: newScroll
        				}, 700);
        			return false;
        			
      			}
    		}
  		});
	});
	console.log("test console log");
	$(".content-display").on("scroll",function(){
		
		if($(this).scrollTop() > 100 && !myScrolledVar){
			console.log("scrolled past point");
			$('header').addClass("scrolled-class");
			$('.content-display').addClass("scrolled-class");
			myScrolledVar=true;
		}else if($(this).scrollTop() <= 100 & myScrolledVar){
			$('header').removeClass("scrolled-class");
			$('.content-display').removeClass("scrolled-class");
			myScrolledVar=false;
		}
	});
	var $form = $('form');
	$form.validate({
		ignore: ".ignore",
		errorPlacement: function(error, element) {         
       		error.insertBefore(element);
   		},
		rules:{
			"hiddenRecaptcha": {
     			required: function() {
         			if(grecaptcha.getResponse() == '') {
             			return true;
         			} else {
             			return false;
         			}
     			}
			}
		}
	});
	
    $form.submit(function(){

    	var theform = $(this),
    		url = theform.attr('action'),
    		type = theform.attr('method'),
    		data = {};
    		
    	theform.find('[name]').each(function(index, value){
    		var that = $(this),
    			name = that.attr('name'),
    			value = that.val();
    		
    		data[name] = value;
    	});
    	
    	console.log(data);
    	if(theform.valid()){
    		$.ajax({
    			url: url,
    			type: type,
    			data: data,
    			success: function(response){
    				var formdiv=theform.parent();
    				var successmsg=formdiv.find(".success-msg");
    				console.log(successmsg);
    				theform.trigger("reset");
    				grecaptcha.reset();
 					/*theform.find("input[type=text], input[type=email], textarea").val("");*/
 					
 					formdiv.addClass("success-animation");
 					formdiv.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(e) {
 						formdiv.removeClass("success-animation");
 						successmsg.removeClass("visible");
    				});
    				successmsg.addClass("visible");			
    			}
    		});
    	} 
       /*$.post($(this).attr('action'), $(this).serialize(), function(response){
            // do something here on success
      },'json');
      */
      return false;
   });
   
	$('.main-carousel').on('init', function () {
		$(this).addClass("ready");
		$(this).resize();
	}); 
	$('.main-carousel').slick({
  		autoplay:true,
  		slidesToShow: 1,
  		dots:true,
  		centerMode: true,
  		centerPadding: '30px',
  		respondTo: "min",
 		autoplaySpeed:4000,  
  		speed:900,
 		variableWidth:true,
 		easing: 'ease-in-out'
	});

	$('.fading-pic-series').on('init', function () {
		$(this).addClass("ready");
	});
	$('.fading-pic-series').slick({
  		autoplay:true,
  		fade:true,
  		dots:false,
 		autoplaySpeed:2000,  
  		speed:1500,
 		variableWidth:false
	});
	$(".ec-button").hover(

		function(){
			$(this).addClass("raised");
			if($(this).next().next().hasClass("selected")){
				$(this).next().addClass("between-raised");
			} else {
				$(this).next().addClass("after-raised");
			}
			if($(this).prev().prev().hasClass("selected")){
				$(this).prev().addClass("between-raised");
			} else {
				$(this).prev().addClass("before-raised");
			}
		},
		function(){
			$(this).removeClass("raised");
			$(this).next().removeClass("after-raised");
			$(this).next().removeClass("between-raised");
			$(this).prev().removeClass("between-raised");
			$(this).prev().removeClass("before-raised");
		});

	/*$("textarea").mouseup(function(){
		$(window).trigger('resize');

	});
	$(window).resize(function(){
					console.log("resized window");
	});*/
	$(".blowupable .content-pic").click(
		function(){
			$(this).toggleClass("blowup");
		});
	$(".blowupable .fading-pic-series img").click(
		function(){
			$(this).closest(".series-container").toggleClass("blowup");
		});
	$("header .ec-button").click(
		function(){
			$(".selected").removeClass("selected");
			$(".after-select").removeClass("after-select");
			$(".before-select").removeClass("before-select");
			$(".between-raised").removeClass("between-raised");
		});
	$(".menu-button").click(
		function(){
			$(this).addClass("selected");
			$(this).next().addClass("after-select");
			$(this).prev().addClass("before-select");
		});
		
	$(".dropdown-button").hover(function(){
			$(this).children().last().addClass("down");
			console.log("dropped down");
		},
		function(){
			$(this).children().last().removeClass("down");
		}
	);
	$(".dropdown li li a").hover(function(){
		//$(this).parent().closest("a").css("background", "green");
			$(this).parent().parent().prev().addClass("selected-parent");
		},
		function(){
			$(this).parent().parent().prev().removeClass("selected-parent");
	});
	
	$('#clickOut').click(function(){
		$('#mainDropdown').removeClass("down");
		$(this).removeClass("appeared");
		$('#nav-icon').removeClass("open");
		console.log("clickedOut!");
	});
	
	$('#nav-icon').click(function(){
		$(this).toggleClass("open");
		console.log("registered lick");
		$("#clickOut").toggleClass("appeared");
		$("#mainDropdown").toggleClass("down");
	});
	
});

