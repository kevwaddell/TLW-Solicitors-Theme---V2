<?php
add_action('gform_after_submission_13', 'post_to_third_party', 10, 2);
function post_to_third_party($entry, $form) {


	$post_url = $entry['4'];
	
	if ($entry['7.1'] == 'y') {
	$clin_neg = $entry['7.1'];
	} else {
	$clin_neg = 'n';	
	}
	
	if ($entry['7.2'] == 'y') {
	$pers_inj = $entry['7.2'];
	} else {
	$pers_inj = 'n';	
	}
	
	if ($entry['7.3'] == 'y') {
	$prof_neg = $entry['7.3'];
	} else {
	$prof_neg = 'n';	
	}
	
	if ($entry['7.4'] == 'y') {
	$rta = $entry['7.4'];
	} else {
	$rta = 'n';	
	}
	
	if ($entry['7.5'] == 'y') {
	$com_lit = $entry['7.5'];
	} else {
	$com_lit = 'n';	
	}
	
    $body = array(
    	'Email' => $entry['3'], 
		'addressbookid' => $entry['1'], 
        'userid' => $entry['2'],
        'cd_FIRSTNAME' => $entry['5.3'],
        'cd_LASTNAME' => $entry['5.6'],
        'cd_FULLNAME' => $entry['5.3'].' '.$entry['5.6'],
        'cd_CLIN_NEG_radio' => $clin_neg,
        'cd_PERS_IN_radio' => $pers_inj,
        'cd_PROF_NEG_radio' => $prof_neg,
        'cd_RTA_radio' => $rta,
        'cd_COM_LIT_radio' => $com_lit
        );
    
    $request = new WP_Http();
    $response = $request->post($post_url, array('body' => $body));   
     
}
?>