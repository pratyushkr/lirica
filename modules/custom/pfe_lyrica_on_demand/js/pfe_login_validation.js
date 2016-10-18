/**
* @file
* Implements javascript for Login functionality
*/
(function ($) {
  //Define a Drupal behaviour with a custom name
  Drupal.behaviors.pfeLoginErrorMessage = {
    attach: function (context, settings) {
			// $().click()
			// $('#').dialog();
		
			$('#edit-submit').click(function() {
				var flag = true;
				//checking email
        $.each(['input[name^=name]'], function(index, value) {
					var input =jQuery('input[name^=name]');
					input.parent().find('div.error').remove();
          input.removeClass('error');
					if(input.val() === '' || !validate_email(input)){
						var msg = get_error_msg('input[name^=name]');
						input.parent().append('<div class="error">' + msg + '</div>');
						input.addClass('error');
					}
					// else if(validate_email(input)){
						// // write your code here.
					// }
					if (input.hasClass('error')) {
						flag = false;
					}
						
        });
				
				$.each(['input[name^=pass]'], function(index,value) {
					var input = jQuery('input[name^=pass]');
					input.parent().find('div.error').remove();
					input.removeClass('error');
					if(input.val() === ''){
						var msg = get_error_msg('input[name^=pass]');
						input.parent().append('<div class="error">' + msg + '</div>');
						input.addClass('error');
					}
					// else if(validate_pass(input)){
						// // write your code here.
					// }
					
					if (input.hasClass('error')) {
						flag = false;
					}	
				});
				return flag;
			});	
		}
	}
	
	function validate_email(obj) {
		if (obj.val() == '') 
      return false;
		var email_pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,3}$/i);
		var email = $(obj).val();
		if ($.trim(email)) {
			if (!email_pattern.test(email))
				return false;
		}
		return true;
	}
	
	function get_error_msg(key) {
		var error = {};
		error["input[name^=name]"] = ["Invalid e-mail"];
		error["input[name^=pass]"] = ["Incorrect password."];
			return error[key];
  }
	
})(jQuery);