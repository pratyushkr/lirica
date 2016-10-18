
<?php

Please correct all highlighted errors and try again.

if (form_get_errors()){
			form_set_error('current_pass', 'Invalid current password');
		}
	//**************************************	
		
		if (empty($_SESSION['messages']['error'])) {
      unset ($_SESSION['messages']['error']);
		}
		//***************************************
	$form['account']['current_pass_required_values']['#value']['field_organization'] = t('Organization');
	//*******************************************************
	
	$form['account']['mail']['#weight'] = 30;
	$form['account']['current_pass']['#weight'] = 35;
	//*****************************************
	
	 if($user_name != $user_prev_name || $user_job_title != $user_prev_job_title || $user_organization != $user_prev_organization || $user_zip_code != $user_prev_zip_code) {
		if(empty($user_current_pass)) {
			form_set_error('current_pass', 'Enter current password');
		}
		else if(!empty($user_current_pass)) {
		//	watchdog('password_verify', '<pre>' .print_r(password_verify($user_current_pass, $hash), true). '<pre>');
			if (!password_verify($user_current_pass, $hash)) {
				form_set_error('current_pass', 'current password is incorrect');
			}
		}
	}

	//****************************
	if (strcmp($hash_current_pass, $password) !== 0) {
		
	}	
	//****************************
	
		if ($variables['element']['#name'] == 'mail') {
			$user_email = $variables['element']['#value'];
			if(!empty($user_email) && !valid_email_address($user_email)) {
				if(){
					ife_errors('set', $variables['element']['#id'], '');
				}
			}
			
			
			
dmelbourne@entreehealth.com

//********************************
/*to highlight menu for corresponding page */
//****************************
jquery(function() {
	var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
	$("block-system-main-menu ul li a").each(function(){
		if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
		$(this).addClass("active");
	})
});

//****
$(function(){
	var url = window.location.pathname,
	// create regexp to match current url pathname and remove trailing slash if 
	//present as it could collide with the link in navigation in case trailing slash wasn't present there
		urlRegExp = new RegExp(url.replace(/\/$/,'') + "$");
	// now grab every link from the navigation
    $('#navigation a').each(function(){
		// and test its normalized href against the url pathname regexp
        if(urlRegExp.test(this.href.replace(/\/$/,''))){
			$(this).addClass('active');
		}
	});
});

$(function () {
	// show current menu object highlighted
	var url = window.location.pathname;
	var checkString;
	// now grab every link from the navigation
	$('#block-system-main-menu a').each(function () {
		// and test its href against the url pathname
		checkString = url.match($(this).attr('href'));
		if ((checkString != null && $(this).attr('href') != '/') || (url == $(this).attr('href'))) {
				$(this).addClass('active');
		}
	});
});			
			