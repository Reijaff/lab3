
                if (data.result == 'success') {
                    var temp_msg = "Surname: " + surname + '\n'
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
