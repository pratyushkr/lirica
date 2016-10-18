<?php
/**
 * @file
 * PfizerPainVideos.com Webform Admin Settings
 */

/**
 * Implements hook_form().
 */
function pfe_lyrica_on_demand_admin_settings($form, &$form_state) {
  module_load_include('inc', 'webform_api', 'inc/webform_api.api');
  $form['lyrica_on_demand_email_webform_settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Email'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['lyrica_on_demand_email_webform_settings']['lyrica_on_demand_email_webform_nid'] = array(
    '#type' => 'textfield',
    '#title' => t('Email'),
    '#default_value' => variable_get('lyrica_on_demand_email_webform_nid', ''),
    '#description' => t('Enter email Id'),
    '#required' => TRUE,
  );
	$form['lyrica_on_demand_email_webform_settings']['lyrica_on_demand_email_subject_webform_nid'] = array(
    '#type' => 'textfield',
    '#title' => t('Subject'),
    '#default_value' => variable_get('lyrica_on_demand_email_subject_webform_nid', ''),
    '#description' => t('Enter email subject'),
    '#required' => TRUE,
  );
  return system_settings_form($form);
}

/*
 * Gets all the available webform which are created
 */
// function lyrica_get_available_webforms() {
	// $available_webforms = array();
	// $banner_content = entity_load('node', false);
	// foreach ($banner_content as $banner) {
		// if (isset($banner->webform['components']) && (count($banner->webform['components']) > 0)) {
			// $available_webforms[$banner->webform['nid']] = $banner->title;
		// }
	// }
	// return $available_webforms;
// }

// class clsWSSEAuth {
    // private $Username;
    // private $Password;
    // function __construct($username, $password) {
        // $this->Username=$username;
        // $this->Password=$password;
    // }
// }

// class clsWSSEToken {
    // private $UsernameToken;
    // function __construct ($innerVal){
        // $this->UsernameToken = $innerVal;
    // }
// }
