$(document).ready(function () {
    $('#signupForm').submit(function () {

        var lastname = $('#lastname').val();
        var firstname = $('#firstname').val();
        var username = $('#username').val();

        var phone = $('#phone').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();


        $.ajax({
            type: "POST",
            url: "files/php/ajax.php",
            data: {
                'lastname': lastname,
                'firstname': firstname,
                'username': username,

                'phone': phone,
                'email': email,
                'password': password,
                'confirm_password': confirm_password
            },
            dataType: "json",
            success: function (data) {
                if (data.result == 'success') {
                    var temp_msg = "Registration successful! \n"
			+ "Lastname: " + lastname + '\n'
                        + "Firstname: " + firstname + '\n'
                        + "Username: " + username + '\n'

                        + "Phone number: " + phone + '\n'
                        + "Email address: " + email + '\n'
                        + "Password: " + password + '\n';

	       	    alert(temp_msg);
                } else {
	            var temp_msg = ''
                    for (var Errors in data.text_error) {
                        temp_msg += data.text_error[Errors] + '\n';
                    }
		    alert(temp_msg);
                }
            }
        });
        return false;
    });
});
