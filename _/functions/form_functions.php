<?php

/*
 * This snippet allows the form to be reloaded by including the following link in the confirmation message:
 * 
 * <a href="" id="reload-form">Submit this form again?</a>
 * 
 * You can customize the text of link, but leave the "id" attribute as is.
 * 
 */

add_filter('gform_pre_render_1', 'save_form_html');
function save_form_html($form) {
    
    if(isset($_POST["gform_ajax"]))
        return $form;
        
    $form_id = $form['id'];
    $spinner_url = apply_filters("gform_ajax_spinner_url_{$form_id}", apply_filters("gform_ajax_spinner_url", GFCommon::get_base_url() . "/images/spinner.gif", $form), $form);
    
    ?>
    
    <script type="text/javascript">
    jQuery(document).ready(function($){
        
        if(typeof gform_html == 'undefined')
            var gform_html = new Array();
        
        gform_html['<?php echo $form['id']; ?>'] = $('#gform_wrapper_<?php echo $form['id']; ?>').wrap('<div></div>').parent().html();
        
        $('a#reload-form').on('click', function(event){
            event.preventDefault();
            $('.gform_confirmation_message_<?php echo $form['id']; ?>').parent().html(gform_html['<?php echo $form['id']; ?>']);
        });
        
        $(document).bind('gform_post_render', function() {
            removeGFSpinner();
        });
        
        gformInitSpinnerLive();
        
    });
    
    function gformInitSpinnerLive(){
        
        jQuery('#gform_<?php echo $form_id; ?>').on('submit', function() {
            jQuery('#gform_submit_button_<?php echo $form_id; ?>').attr('disabled', true).after('<' + 'img id=\"gform_ajax_spinner_<?php echo $form_id; ?>\"  class=\"gform_ajax_spinner\" src=\"<?php echo $spinner_url; ?>\" alt=\"\" />');
            jQuery('#gform_wrapper_<?php echo $form_id; ?> .gform_previous_button').attr('disabled', true);
            jQuery('#gform_wrapper_<?php echo $form_id; ?> .gform_next_button').attr('disabled', true).after('<' + 'img id=\"gform_ajax_spinner_<?php echo $form_id; ?>\"  class=\"gform_ajax_spinner\" src=\"<?php echo $spinner_url; ?>\" alt=\"\" />');
        });
    }
    
    function removeGFSpinner() {
        
        var events = typeof jQuery('#gform_<?php echo $form_id; ?>').data('events') != 'undefined' ? jQuery('#gform_<?php echo $form_id; ?>').data('events') : false;
        var submitEvents = events && typeof events.submit != 'undefined' ? events.submit : false;
        
        if(!submitEvents)
            return;

        jQuery.each(submitEvents, function(key, handlerObj) {
            
            if(typeof handlerObj.data.eventName == 'undefined' || handlerObj.data.eventName != 'ajaxSpinner')
                return;
            
            jQuery('#gform_<?php echo $form_id; ?>').unbind('submit');
        });
        
    }
    
    </script>
    
    <?php
    return $form;
}
?>