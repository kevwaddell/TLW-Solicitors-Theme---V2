<?php
add_action('gform_after_submission_13', 'post_to_third_party', 10, 2);
function post_to_third_party($entry, $form) {


	$post_url = $entry['4'];
	
	if ($entry['3.1'] == 'Clinical Negligence') {
	$clin_neg = 'y';
	} else {
	$clin_neg = 'n';	
	}
	
	if ($entry['3.2'] == 'Personal Injury') {
	$pers_inj = 'y';
	} else {
	$pers_inj = 'n';	
	}
	
	if ($entry['3.3'] == 'Road Traffic Accidents') {
	$rta = 'y';
	} else {
	$rta = 'n';	
	}
	
	if ($entry['3.4'] == 'Financial Mis-selling') {
	$fin_mis = 'y';
	} else {
	$fin_mis = 'n';	
	}
	
	if ($entry['3.5'] == 'Professional Negligence') {
	$prof_neg = 'y';
	} else {
	$prof_neg = 'n';	
	}
	
	if ($entry['3.6'] == 'Commercial Litigation') {
	$com_lit = 'y';
	} else {
	$com_lit = 'n';
	}
	
    $body = array(
    	'Email' => $entry['2'], 
		'addressbookid' => $entry['5'], 
        'userid' => $entry['6'],
        'cd_FIRSTNAME' => $entry['1.3'],
        'cd_LASTNAME' => $entry['1.6'],
        'cd_FULLNAME' => $entry['1.3'].' '.$entry['1.6'],
        'cd_CLIN_NEG_radio' => $clin_neg,
        'cd_PERS_IN_radio' => $pers_inj,
        'cd_RTA_radio' => $rta,
        'cd_FIN_MIS_radio' => $fin_mis,
        'cd_PROF_NEG_radio' => $prof_neg,
        'cd_COM_LIT_radio' => $com_lit
        );
    
    $request = new WP_Http();
    $response = $request->post($post_url, array('body' => $body));   
     
}
?>