
// On click for send mail button
$("form").submit(function(e){


	$('#send-mail-btn').prop('value', 'SENDING...');

	e.preventDefault();

	var mail = false;

	var name = $('#name').val();
	var email = $('#email').val();
	var subject = $('#services').find(":selected").text();
	var msg = $('#message').val();

	if(name != '' && msg != '' && email !== ''){

		if (isValidEmailAddress(email)) {
	        // $("input#email").focus();   //focus on email field
	        var mail = true;
	    }


	    if(mail){
	    	$.ajax({
		      type: "POST",
		      url: "./functions/functions.php",
		      dataType: 'Text',
		      data: {name: name, email: email, subject: subject, msg: msg},
		      success: function(data) {

		      	if(data == 'true'){

		      		$('.contact-form-success').show();
		      		setTimeout(function(){ 
		      			$('.contact-form-success').hide(); }, 3000);
		      		$('#send-mail-btn').val('SEND MESSAGE');

		      		// reset inputs
		      		$('#name').val('');
		      		$('#email').val('');
		      		$('#services').val('');
		      		$('#message').val('');

		      	}else {
		      		$('.contact-form-error').show();
		      		setTimeout(function(){ 
		      			$('.contact-form-error').hide(); }, 3000);
		      		$('#send-mail-btn').val('SEND MESSAGE');
		      	}
		      }
			});
	    }

	} else if(name == ''){
		$("input#name").focus();
	} else if(subject == ''){
		// $("input#subject").focus();
	} else if(msg == ''){
		$("input#message").focus();
	}
});

 // $("form").submit(function(e){
 //        e.preventDefault();
 //    });

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};