<?php
$firstname = $lastname = $patronymic = $birthdate = $group = $kafedra = '';
class User {
	protected $firstname;
	protected $lastname;
	protected $patronymic;
	protected $birthdate;
	public $age;

	function __construct($firstname, $lastname, $patronymic, $birthdate) {
		$this->firstname = $firstname;
        	$this->lastname = $lastname;
        	$this->patronymic= $patronymic;
        	$this->birthdate = $birthdate;
    	}


    	function getName() {
        	echo "Name : $this->firstname $this->lastname $this->patronymic</br>";
    	}

    	function getBirthDate() {
        	echo "Date of Birth: $this->birthdate </br>";
    	}

    	function getAge() {
		date_default_timezone_set('Europe/Helsinki');
		$current_date = time();
		$birth_date = strtotime($this->birthdate);
        	$this->age = floor(($current_date - $birth_date)/(60*60*24*365.2421896));
        	echo "Age: $this->age years </br>";
	}
}
class Student extends User {
	public $faculty='FTI';
	private $kafedra;
	private $group;
	function __construct($firstname, $lastname, $patronymic, $birthdate, $kafedra,$group){
        	parent::__construct($firstname, $lastname, $patronymic, $birthdate);
       		$this->kafedra=$kafedra;
        	$this->group=$group;
    	}

    	function getEnroll() {
        	printf("Year of enrollment: 201%s</br>", $this->group[3]);
    	}

    	function getStudentdata(){
        	echo "Faculty: $this->faculty </br>";
        	echo "Kafedra: $this->kafedra </br>";
        	echo "Group: $this->group </br>";
    	}
}

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

	if (empty($_POST["patronymic"])) {
		$patronymicErr = "Patronymic is required";
		$flag = false;
	} else {
		$patronymic = test_input($_POST["patronymic"]);
		if (!preg_match("/[a-zA-Z]{3,30}$/",$patronymic)) {
			$patronymicErr = "Patronymic should not contain number or special characters.";
			$flag = false;
		}
	}

	if (empty($_POST["birthdate"])) {
		$birthdateErr = "Birthdate is required";
		$flag = false;
	} else {
		$birthdate = test_input($_POST["birthdate"]);
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$birthdate)) {
			$birthdateErr = "Date format : Y-m-d ( 1111-01-01 ) !";
			$flag = false;
		}
	}

	if (empty($_POST["kafedra"])) {
		$kafedraErr = "Kafedra is required";
		$flag = false;
	} else {
		$kafedra = test_input($_POST["kafedra"]);
		if (!preg_match("/[\w ]+/",$kafedra)) {
			$dafedraErr = "Kafedra should not contain number or special characters.";
			$flag = false;
		}
	}

	if (empty($_POST["group"])) {
		$groupErr = "Group is required";
		$flag = false;
	} else {
		$group = test_input($_POST["group"]);
		if (!preg_match("/[A-Z]{2}-[0-9]{2}/",$group)) {
			$groupErr = "Group should be in format XX-99 !";
			$flag = false;
		}
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
	      <form class="cmxform" id="signupForm" method="post" action="login_php_oop.php">
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
		  <label for="patronymic">Patronymic</label>
		  <input id="patronymic" name="patronymic" type="text" value="<?php echo $patronymic;?>" >
		  <span class="warr"> <?php echo $patronymicErr; ?></span>
		</p>
		<p>
		  <label for="birthdate">Birthdate</label>
		  <input id="birthdate" name="birthdate" type="text" value="<?php echo $birthdate;?>">
		  <span class="warr"> <?php echo $birthdateErr; ?></span>
		</p>
		<p>
		  <label for="kafedra">Kafedra</label>
		  <input id="kafedra" name="kafedra" type="kafedra" value="<?php echo $kafedra;?>">
		  <span class="warr"><?php echo $kafedraErr; ?></span>
		</p>
		<p>
		  <label for="group">Group</label>
		  <input id="group" name="group" type="group" value="<?php echo $group;?>">
		  <span class="warr"> <?php echo $groupErr; ?></span>
		</p>
		<p>
		  <input class="submit" type="submit" value="Submit" >
		</p>
	      </form>
	    </fieldset>
		<?php
			if ($flag){
				$obj = new Student($firstname, $lastname, $patronymic, $birthdate, $kafedra,$group);	
				echo "<div style='text-align:center;border: 3px solid green;'>";
				echo "<h3>Registration successful!</h3>";
				$obj->getName();
				$obj->getBirthdate();
				$obj->getAge();
				$obj->getEnroll();
				$obj->getStudentdata();
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
