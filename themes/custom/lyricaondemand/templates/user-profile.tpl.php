<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
 global $user;
 $user_fields = user_load($user->uid);
?>
<div class="user-profile">
	<h2>Account information</h2>
	<div class="info-wrap">
		<div class="name-wrap info-row">
			<div class="label">Name</div>
			<?php if (isset($user_fields->field_name['und'][0]['value'])) :?>
			<div class="text"><?php print $user_fields->field_name['und'][0]['value']; ?></div>
			<?php endif;?>
		</div>
		<div class="mail-wrap info-row">
			<div class="label">E-mail</div>
			<?php if (isset($user_fields->mail)) :?>
			<div class="text"><?php print $user_fields->mail; ?></div>
		    <?php endif;?>
		</div>
		<div class="password-wrap info-row">
			<div class="label">Password</div>
			<input type="password" value="*********" disabled="true" />
		</div>
		<div class="job-title-wrap info-row">
			<div class="label">Job title</div>
			<?php if (isset($user_fields->field_job_title['und'][0]['value'])) :?>
			<div class="text"><?php print $user_fields->field_job_title['und'][0]['value']; ?></div>
			<?php endif;?>
		</div>
		<div class="organization-wrap info-row">
			<div class="label">Organization</div>
			<?php if (isset($user_fields->field_organization['und'][0]['value'])) :?>
			<div class="text"><?php print $user_fields->field_organization['und'][0]['value']; ?></div>
			<?php endif;?>
		</div>
		<div class="zip-code-wrap info-row">
			<div class="label">ZIP code</div>
			<?php if (isset($user_fields->field_zip_code['und'][0]['value'])) :?>
			<div class="text"><?php print $user_fields->field_zip_code['und'][0]['value']; ?></div>
			<?php endif;?>
		</div>
		<div class="btn-wrap">
		  <a href='<?php print '/user/' . $user->uid . '/edit'?>' >Edit</a>
		</div>
	</div>
</div>