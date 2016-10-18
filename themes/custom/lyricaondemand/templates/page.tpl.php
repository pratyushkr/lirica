<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>
<?php if (user_is_anonymous()) { ?>
<div class="page-wrapper">
  <header class="header" role="banner">
    <div class="head-wrap clearfix">
      <div class="logo-wrap">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
        <?php endif; ?>
      </div>
    </div>
    <?php print render($page['header']); ?>
  </header>

  <div class="navigation-wrap">
      <?php print render($page['navigation-bar']); ?>
  </div>

  <div class="main clearfix">
    <main class="content clearfix" role="main">
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($tabs); ?>
      <div class="site-name-wrap">
        <div class="site-logo"><img src="/sites/default/themes/custom/lyricaondemand/images/pfizer-pain-videos-logo.png" /></div>
        <div class="site-name">PfizerPainVideos.com</div>
      </div>
	  <?php if(arg(0) == 'user' && arg(1) == 'reset') { ?>
		<?php print render($page['content']); ?>
	  <?php } else { ?>
      <?php $user_login = drupal_get_form('user_login'); ?>
	  <?php print drupal_render($user_login); ?>
	  <?php } ?>
    </main>
  </div>
  <div class="footer-holder">
    <div class="footer-wrap clearfix">
      <div class="footer-logo"><img src="/sites/default/themes/custom/lyricaondemand/images/footer-logo.png" /></div>
      <?php print render($page['footer']); ?>
    </div>
  </div>
</div>

<?php } elseif(!user_is_anonymous()) { ?>
<div class="page-wrapper clearfix">

  <header class="header" role="banner">
    <div class="head-wrap clearfix">
      <div class="left-wrap">
        <div class="main-menu-toggler"><span>MENU</span><img src="/sites/default/themes/custom/lyricaondemand/images/toggler.png" /></div>
        <div class="site-name">PfizerPainVideos.com</div>
      </div>
      <div class="logo-wrap">
        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
        <?php endif; ?>
      </div>
    </div>
    <?php print render($page['header']); ?>
  </header>

  <div class="navigation-wrap">
      <?php print render($page['navigation-bar']); ?>
  </div>

  <div class="main clearfix">
    <main class="content clearfix" role="main">
	  <?php print render($page['content']); ?>
    </main>
  </div>
  <div class="footer-holder">
    <div class="footer-wrap clearfix">
      <?php if (!user_is_anonymous()) { ?>
	  <a href="/contact/admin/nojs" class="ctools-use-modal ctools-modal-request-sent-style">
        <div class="footer-contact-wrap">
          <div class="footer-contact-holder">
            <div class="contact-icon"><img src="/sites/default/themes/custom/lyricaondemand/images/contact-icon.png" /></div>
            <div class="contact-text">For more information contact </br>your Pfizer Account Team </div>
          </div>
        </div>
      </a>
	  <?php } ?>
      <div class="footer-logo"><img src="/sites/default/themes/custom/lyricaondemand/images/footer-logo.png" /></div>
      <?php print render($page['footer']); ?>
    </div>
  </div>

</div>
<?php }?>
