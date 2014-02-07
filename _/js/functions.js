(function($){

	var event_type;

	if (Modernizr.touch){
	
	 event_type = 'touchstart';
	  
	} else {
	 
	 event_type = 'click';	
	 
	}

	var service_select = $('select#service-select');
	var service_area_select = $('select.service-area-select');
						
	service_select.easyDropDown({
	wrapperClass: 'dropdown service-dropdown',
	onChange: function(selected){
		var val = selected.value;
		var selected_id = "#"+selected.value.toLowerCase().split(' ').join('-')+"-select";
		selected_id.replace(/ /g, "-");
		//console.log(selected_id);
		
		if ( $("input[name='service']") ) {
			$("input[name='service']").val(val);
		}
		
		if ($('.service-area-dropdown').is(':visible')) {
			$('.service-area-dropdown').hide();
		}

		$(selected_id).closest('.service-area-dropdown').show();
	}
	});
	
	service_area_select.easyDropDown({
	wrapperClass: 'dropdown service-area-dropdown',
	onChange: function(selected){
		//console.log(selected);
		var val = selected.value;
		
		if ( $("input[name='service-area']") ) {
			$("input[name='service-area']").val(val);
		}
		
	}
	});
	
	$('.service-area-dropdown').hide();
	
	/* MAIN MENU HOVER */
	
	$('#main-nav').not('.nav-open').on('mouseover', 'li.with-sub-nav', function(){
   	 	$(this).addClass('sub-hover');
	});
	
	$('#main-nav').not('.nav-open').on('mouseout', 'li.with-sub-nav' , function(){
	    $(this).removeClass('sub-hover');
	});
	
	$('body').on(event_type,'button#nav-btn', function(e){
	
	console.log(e);
	
		if ( $('#main-nav').hasClass('nav-closed') ) {
			$('.nav-closed').removeClass('nav-closed').addClass('nav-open');
		} else {
			$('.nav-open').removeClass('nav-open').addClass('nav-closed');
		}
		
		return false;
		
	});
	
	// Touch events
	$('#main-nav').not('.nav-open').on('touchend', 'li.with-sub-nav > a', function(e){
	  
	  $(this).parent().siblings().removeClass('sub-hover');
	  
	  if ( !$(this).parent().hasClass('sub-hover')) {
	  $(this).parent().toggleClass('sub-hover'); 
	  return false; 
	  }
	  
	  if ( $(this).parent().hasClass('not-link')) {
	  $(this).parent().toggleClass('sub-hover'); 
	  return false; 
	  } 	   
	   
	});
	
	$('body').on('click', "li.services > a", function(){
	return false;	
	});
	
	$(document).ready(function (){
	
	$('#feedback-carousel').carousel({
		pause: false,
		interval: 7000
	});
	
		if ($('#enqiry-start-form')) {
		
		$('#enqiry-start-form').show();	
			
		}
	
	});
	
})(window.jQuery);