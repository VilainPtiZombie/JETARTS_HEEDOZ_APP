/*----------------------------------------------------*/
/*	Template Animations
/*----------------------------------------------------*/
	
$(document).ready(function(){
	
		"use strict";
	
		$('#features').waypoint(function() {
			setTimeout(function(){$('#f_center_content').addClass('animated fadeInUp')},600);			
            setTimeout(function(){$('#feature_1').addClass('animated fadeInLeft')},400);			
            setTimeout(function(){$('#feature_2').addClass('animated fadeInLeft')},600);
            setTimeout(function(){$('#feature_3').addClass('animated fadeInLeft')},800);
			setTimeout(function(){$('#feature_4').addClass('animated fadeInRight')},400);
			setTimeout(function(){$('#feature_5').addClass('animated fadeInRight')},600);
			setTimeout(function(){$('#feature_6').addClass('animated fadeInRight')},800);
        }, { offset: '65%' });
		
		$('#screens').waypoint(function() {
            setTimeout(function(){$('#screenshot_1').addClass('animated fadeInDown')},400);
            setTimeout(function(){$('#screenshot_2').addClass('animated fadeInDown')},500);
            setTimeout(function(){$('#screenshot_3').addClass('animated fadeInDown')},600);
			setTimeout(function(){$('#screenshot_4').addClass('animated fadeInDown')},700);
			setTimeout(function(){$('#screenshot_5').addClass('animated fadeInUp')},800);
			setTimeout(function(){$('#screenshot_6').addClass('animated fadeInUp')},900);
			setTimeout(function(){$('#screenshot_7').addClass('animated fadeInUp')},1000);
			setTimeout(function(){$('#screenshot_8').addClass('animated fadeInUp')},1100);
        }, { offset: '65%' });
				
		$('#video-banner').waypoint(function() {
            setTimeout(function(){$('#v_banner_content').addClass('animated fadeInLeft')},300);
            setTimeout(function(){$('#v_banner_video').addClass('animated fadeInRight')},300);
        }, { offset: '70%' });
	
		$('#team').waypoint(function() {
            setTimeout(function(){$('#team-member-holder').addClass('animated fadeInUp')},500);
        }, { offset: '65%' });
	
		$('#pricing').waypoint(function() {
            setTimeout(function(){$('#price_1').addClass('animated fadeInUp')},400);
            setTimeout(function(){$('#price_2').addClass('animated fadeInUp')},450);
            setTimeout(function(){$('#price_3').addClass('animated fadeInUp')},500);
			setTimeout(function(){$('#price_4').addClass('animated fadeInUp')},550);
        }, { offset: '65%' });
		
		$('#faq').waypoint(function() {	
            setTimeout(function(){$('#question_1').addClass('animated fadeInLeft')},400);			
            setTimeout(function(){$('#question_2').addClass('animated fadeInLeft')},550);
            setTimeout(function(){$('#question_3').addClass('animated fadeInLeft')},700);
			setTimeout(function(){$('#question_4').addClass('animated fadeInLeft')},850);
			setTimeout(function(){$('#question_5').addClass('animated fadeInRight')},400);
			setTimeout(function(){$('#question_6').addClass('animated fadeInRight')},550);
			setTimeout(function(){$('#question_7').addClass('animated fadeInRight')},700);			
            setTimeout(function(){$('#question_8').addClass('animated fadeInRight')},850);
        }, { offset: '70%' });
		
		$('#contact').waypoint(function() {
            setTimeout(function(){$('#input_name').addClass('animated fadeInLeft')},400);
            setTimeout(function(){$('#input_email').addClass('animated fadeInRight')},400);
            setTimeout(function(){$('#input_subject').addClass('animated fadeInLeft')},600);
			setTimeout(function(){$('#input_message').addClass('animated fadeInRight')},600);
			setTimeout(function(){$('#form_btn').addClass('animated fadeInUp')},700);
        }, { offset: '65%' });
				
		$('#newsletter').waypoint(function() {
            setTimeout(function(){$('#newsletter_form').addClass('animated fadeInRight')},400);
            setTimeout(function(){$('#newsletter_title').addClass('animated fadeInLeft')},400);
		}, { offset: '80%' });
		
		$('#footer').waypoint(function() {
            setTimeout(function(){$('#footer_copy').addClass('animated fadeInUp')},400);
            setTimeout(function(){$('#footer_icons').addClass('animated fadeInUp')},400);
		}, { offset: '94%' });

});