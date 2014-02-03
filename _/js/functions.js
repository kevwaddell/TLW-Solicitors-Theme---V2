(function($){

	var service_select = $('select#service-select');
	var service_area_select = $('select.service-area-select');
						
	service_select.easyDropDown({
		nativeTouch: true,
		wrapperClass: 'dropdown service-dropdown',
		onChange: function(selected){
			//console.log(selected);
			var val = selected.value;
			var selected_id = "#"+selected.value.toLowerCase().split(' ').join('-')+"-select";
			selected_id.replace(/ /g, "-");
			console.log(selected_id);
			
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
	
	$(document).ready(function (){
	
	$('#feedback-carousel').carousel({
		pause: false,
		interval: 7000
	});
	
	
	});
	
})(window.jQuery);