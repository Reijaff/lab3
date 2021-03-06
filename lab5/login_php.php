<?php
$firstname = $lastname = $username = $email = $phone = $password = $confirm_password = $temp_msg = "";
$display = "none";
$flag = false;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$flag = true;
	if (empty($_POST["firstname"])) {
		$firstnameErr = "Firstname is required";
		$flag = false;
	} else {
		$firstname = test_input($_POST["firstname"]);
		if (!preg_match("/[a-zA-Z]{3,30}$/",$firstname)) {
			$nameErr = "Name should not contain number or special characters.";
			$flag = false;
		}
	}

	if (empty($_POST["lastname"])) {
		$lastnameErr = "Lastname is required";
		$flag = false;
	} else {
		$lastname = test_input($_POST["lastname"]);
		if (!preg_match("/[a-zA-Z]{3,30}$/",$lastname)) {
			$lastnameErr = "Lastname should not contain number or special characters.";
			$flag = false;
		}
	}

	if (empty($_POST["username"])) {
		$usernameErr = "Username is required";
		$flag = false;
	} else {
		$username = test_input($_POST["username"]);
		if (!preg_match("/^[a-z0-9][a-z0-9_]*[a-z0-9]$/",$username)) {
			$usernameErr = "Username may consist of lowercase alfanumeric characters and underscore.";
			$flag = false;
		}
	}

	if (empty($_POST["phone"])) {
		$phoneErr = "Phone number is required";
		$flag = false;
	} else {
		$phone = test_input($_POST["phone"]);
		if (!preg_match("/^[0-9]{10}$/",$phone)) {
			$phoneErr = "Phone number should be 10 digits long!";
			$flag = false;
		}
	}

	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
		$flag = false;
	} else {
		$email = test_input($_POST["email"]);
		if (!preg_match("/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/",$email)) {
			$emailErr = "Email address should consist of  1 symbol '@' і '.' and few characters between!";
			$flag = false;
		}
	}

	if (empty($_POST["password"])) {
		$passwordErr = "Password is required";
		$flag = false;
	} else {
		$password = test_input($_POST["password"]);
		if (!preg_match("/^.{8,}$/",$password)) {
			$passwordErr = "Password should be 8+ characters long!";
			$flag = false;
		}
	}

	if (empty($_POST["confirm_password"])) {
		$confirm_passwordErr = "Confirm password is required";
		$flag = false;
	} else {
		$confirm_password = test_input($_POST["confirm_password"]);
		if (!preg_match("/^.{8,}$/",$confirm_password)) {
			$confirm_passwordErr = "Confirm password should be 8+ characters long!";
			$flag = false;
		}
	}
	if ( $_POST["confirm_password"] != $_POST["password"] ){
		$confirm_passwordErr = "Check your password input, passwords do not match!";
		$flag = false;
	}
	if ( $flag == true ){
		$display = "block";
		$temp_msg = "Registration successful!,"."Firstname: ".$firstname.",Lastname: ".$lastname." ,Username: ".$username.",Phone number: ".$phone.",Password: ".$password.",Email address: ".$email;
	}
}


function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="files/css/style.css">
</head>

<body>
  <header>
    <div style="background-color: #333;border:2px solid black">
      <div class=header_div>
	<p>Welcome to KPI test webpage!</p>
      </div>
    </div>
  </header>
  <nav>
    <div style="border:2px solid black">
      <div class=nav_div>
	<a class=p_shown href="index.html">Main page</a>
	<a class=p_hidden href="history.html">History</a>
	<a class=p_hidden href="student_info.html">Student Info</a>
	<a class=p_hidden href="login_php.php">login_php</a>
	<a class=p_hidden href="login_php_oop.php">login_php_oop</a>
      </div>
    </div>
  </nav>
  <section>
    <div style="border:2px solid black">
      <div class=section_div>
	<div class=login_header>
	  <p>Registration Form</p>
	</div>
	<div style="float:left;width:100%;">
	  <div style="border:2px solid black">
	    <fieldset style="text-align:center">
	      <form class="cmxform" id="signupForm" method="post" action="login_php.php">
		<p>
		  <label for="firstname">Firstname</label>
		  <input id="firstname" name="firstname" type="text" value="<?php echo $firstname;?>">
		  <span class="warr"> <?php echo $firstnameErr; ?></span>
		</p>
		<p>
		  <label for="lastname">Lastname</label>
		  <input id="lastname" name="lastname" type="text" value="<?php echo $lastname;?>">
		  <span class="warr"> <?php echo $lastnameErr; ?></span>
		</p>
		<p>
		  <label for="username">Username</label>
		  <input id="username" name="username" type="text" value="<?php echo $username;?>" >
		  <span class="warr"> <?php echo $usernameErr; ?></span>
		</p>
		<p>
		  <label for="phone">Phone number</label>
		  <input id="phone" name="phone" type="text" value="<?php echo $phone;?>">
		  <span class="warr"> <?php echo $phoneErr; ?></span>
		</p>
		<p>
		  <label for="password">Password</label>
		  <input id="password" name="password" type="password" value="<?php echo $password;?>">
		  <span class="warr"><?php echo $passwordErr; ?></span>
		</p>
		<p>
		  <label for="confirm_password">Confirm password</label>
		  <input id="confirm_password" name="confirm_password" type="password" value="<?php echo $confirm_password;?>">
		  <span class="warr"> <?php echo $confirm_passwordErr; ?></span>
		</p>
		<p>
		  <label for="email">Email</label>
		  <input id="email" name="email" type="email" value="<?php echo $email;?>">
		  <span class="warr"> <?php echo $emailErr; ?></span>
		</p>
		<p>
		  <input class="submit" type="submit" value="Submit" >
		</p>
	      </form>
	    </fieldset>
		<?php
			if ($flag){
				echo "<div style='text-align:center;border: 3px solid green;'>";
				echo "<h3>Registration successful!</h3>";
				echo "First name : ".$firstname."</br>";
				echo "Last name : ".$lastname."</br>";
				echo "Username : ".$username."</br>";
				echo "Phone number : ".$phone."</br>";
				echo "Password : ".$password."</br>";
				echo "Email address : ".$email."</br>";
				echo "</div>";
			}
		?>
	  </div>
	</div>
      </div>
    </div>
  </section>

  <footer>
    <div style="border:2px solid black">
      <div class=footer_div>
	<center>
	  <font size="4" color="white" face="Helvetica">
	    <i>Адреса:</i> вулиця Академіка Янгеля, 7а, Київ, 02000
	    <i>Контакти:</i> 204-98-75; 204-93-86; (099)456-85-71<br>
	    <i>Електронна скринька:</i> ipt.kpi.ua@gmail.com
	  </font>
	</center>
      </div>
    </div>
  </footer>
  <script src="files/js/menu.js"></script>
</body>

</html>
