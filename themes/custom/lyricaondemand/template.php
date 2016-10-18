<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function lyricaondemand_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  lyricaondemand_preprocess_html($variables, $hook);
  lyricaondemand_preprocess_page($variables, $hook);
}
// */

 // function lyricaondemand_theme() {
   // $items = array();

   // $items['user_profile_form'] = array(
      // 'arguments' => array('form' => NULL),
      // 'render element' => 'form',
      // 'template' => 'templates/user-profile-edit',
   // );

   // return $items;
 // }

/**
 * Override or insert variables into the html templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("html" in this case.)
 */

function lyricaondemand_preprocess_html(&$variables, $hook) {
  if(!user_is_anonymous() && drupal_is_front_page()) {
	$variables['head_title'] = str_replace("Welcome to PfizerPainVideos.com","Home", $variables['head_title']);
  }
}

/**
 * Override or insert variables into the page templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function lyricaondemand_preprocess_page(&$variables, $hook) {
  global $user;
  ctools_include('modal');
  ctools_modal_add_js();
  $create_account_style = array(
    'create-account-style' => array(
      'modalSize' => array(
        'type' => 'fixed',
        'width' => 400, 
        'height' => 'auto',
        'max-width' => 413,
        'max-height' => 626
      ),
      'animation' => 'fadeIn',
    ),
  );
  drupal_add_js($create_account_style, 'setting');
  $forgot_password_style = array(
    'forgot-password-style' => array(
      'modalSize' => array(
        'type' => 'fixed',
        'width' => 400,
        'height' => 'auto',
      ),
      'animation' => 'fadeIn',
    ),
  );
  drupal_add_js($forgot_password_style, 'setting');
  $request_sent_style = array(
    'request-sent-style' => array(
      'modalSize' => array(
        'type' => 'fixed',
        'width' => 400,
        'height' => 300,
      ),
      'animation' => 'fadeIn',
    ),
  );
  drupal_add_js($request_sent_style, 'setting');
  
  if (isset($variables['node'])) {
	if ($variables['node']->type != '' && $variables['node']->type == 'video') {
		$variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type;
	}
  }
}

function lyricaondemand_ife_form_element($variables) {
  $output = '';
  $output = $variables['element']['#children'];
  if (isset($variables['element']['#id'])) {
		if ($variables['element']['#name'] == 'field_zip_code[und][0][value]') {
			$user_zip_code = $variables['element']['#value'];
			if(!empty ($user_zip_code)) {
			if (!is_numeric($user_zip_code)){
				ife_errors('set', $variables['element']['#id'], 'ZIP code must have 5 digits');
			}
			else if (strlen($user_zip_code) < 5) {
				ife_errors('set', $variables['element']['#id'], 'ZIP code must have 5 digits');
			}
			}
		}
		if ($variables['element']['#id'] == 'edit-current-pass') {
			ife_errors('set', $variables['element']['#id'], '');
		}
    $error = ife_errors('get', $variables['element']['#id']);
    if (!empty($error)) {
      $error_div = '<div class="error">' . $error . '</div>';
      // Find the first occurrence of ">".
      $pos = strpos($output, '/>');
      // From the end, get the rest of the string until we hit start pos.
      $rest = substr($output, $pos+2, -1);
      // Lets put everything back together.
      $output = substr_replace($output, '/>' . $error_div . $rest, $pos);
    }
  }
  return $output;
}

/**
 * Override or insert variables into the region templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function lyricaondemand_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--no-wrapper.tpl.php template for sidebars.
  if (strpos($variables['region'], 'sidebar_') === 0) {
    $variables['theme_hook_suggestions'] = array_diff(
      $variables['theme_hook_suggestions'], array('region__no_wrapper')
    );
  }
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function lyricaondemand_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  if ($variables['block_html_id'] == 'block-system-main') {
    $variables['theme_hook_suggestions'] = array_diff(
      $variables['theme_hook_suggestions'], array('block__no_wrapper')
    );
  }
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function lyricaondemand_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // lyricaondemand_preprocess_node_page() or lyricaondemand_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param array $variables
 *   Variables to pass to the theme template.
 * @param string $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function lyricaondemand_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */
