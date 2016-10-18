/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document) {

  'use strict';

  // To understand behaviors, see https://drupal.org/node/756722#behaviors
  Drupal.behaviors.my_custom_behavior = {
    attach: function (context, settings) {
  	  jQuery('.messages.messages--status').hide();
      
      jQuery("#modal-content").css('max-height', ((window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight) - 20) + 'px');

  	  jQuery('.close-popup-button').click(function () {
  	    Drupal.CTools.Modal.dismiss();
        jQuery("body").removeClass("no-scrollable");
  	  });
    
      jQuery('#modalBackdrop').on('click', function() {
        Drupal.CTools.Modal.dismiss();
        jQuery("body").removeClass("no-scrollable");
        return false;
      });
    }
  };

})(jQuery, Drupal, this, this.document);
