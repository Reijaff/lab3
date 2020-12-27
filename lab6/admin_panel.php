<?php
$id = '';
if (isset($_POST["remove_row"])) {
	if (empty($_POST["id"])) {
		$idErr = "ID is required";
	} else {
		$id= test_input($_POST["id"]);
		if (!preg_match("/[0-9]+/",$id)) {
			$idErr = "ID should be a number";
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
	<a class=p_hidden href="register.php">register</a>
	<a class=p_hidden href="admin_panel.php">admin_panel</a>
      </div>
    </div>
  </nav> <section>
    <div style="border:2px solid black">
      <div class=section_div>
	<div class=login_header>
	  <p>Admin Panel</p>
	</div>
	<div style="float:left;width:100%;">
	  <div style="border:2px solid black">
	    <fieldset style="text-align:center">
	      <form class="cmxform" id="signupForm" method="post" action="admin_panel.php">
		<p>
		<input type="submit" name="create_table" id="create_table" value="Create table">
		</p>
		<p>
		<button><a href="register.php" target="register">Register!</a></button>
		</p>
		<p>
		<input type="submit" name="change_table" id="change_table" value="Add column age!">
		</p>
		<p>
		<input type="submit" name="delete_table" id="delete_table" value="Delete table">
		</p>
		<p>
		<input type="submit" name="remove_row" id="remove_row" value="Remove record ">
		<label for="id">№</label>
		<input style="width:20px" id="id" name="id" type="text" value="<?php echo $id;?>">
		<span class="warr"> <?php echo $idErr; ?></span>
		</p>
		</p>
		<p>
		<input type="submit" name="show_all" id="show_all" value="Show all records">
		</p>
		<p>
		<input type="submit" name="first_ten" id="first_ten" value="Show first ten records">
		</p>
		<p>
		<input type="submit" name="count" id="count" value="Count records">
		</p>
	      </form>
	    </fieldset>
<?php
if (isset($_POST["create_table"])){
	echo "<div style='text-align:center;border: 3px solid green;'>";
	$conn = mysqli_connect("localhost","mydbuser","tBQZ8UDPsim3MLMm","myDB");	
	if (!$conn)
		die("Connection failed : ".mysqli_connect_error());
	$sql = "CREATE TABLE Users(
		ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
		Lastname VARCHAR(30) NOT NULL,
		Firstname VARCHAR(30) NOT NULL,
		Password VARCHAR(30) NOT NULL,
		Email VARCHAR(50))";
	if (mysqli_query($conn, $sql)){
		echo "Table created successfully </br>";
	}else{
		echo "error creating table </br>";
	}

	echo "</div>";
}
if (isset($_POST["change_table"])){
	echo "<div style='text-align:center;border: 3px solid green;'>";
	$conn = mysqli_connect("localhost","mydbuser","tBQZ8UDPsim3MLMm","myDB");	
	if (!$conn)
		die("Connection failed : ".mysqli_connect_error());

	$sql='ALTER TABLE Users ADD Age INT' ;

	if (mysqli_query($conn, $sql)){
		echo "Table altered successfully</br>";
		$sql = "UPDATE Users SET Age=18";
		if (mysqli_query($conn, $sql)){
			echo " Default age is 18</br>";
		}else{
			echo "error".musqli_error($conn)."</br>";
		}
	}else{
		echo "error altering table </br>";
	}

	echo "</div>";
}

if (isset($_POST["delete_table"])){
	echo "<div style='text-align:center;border: 3px solid green;'>";
	$conn = mysqli_connect("localhost","mydbuser","tBQZ8UDPsim3MLMm","myDB");	
	if (!$conn)
		die("Connection failed : ".mysqli_connect_error());
	$sql = "DROP TABLE Users";
	if (mysqli_query($conn, $sql)){
		echo "Table deleted successfully </br>";
	}else{
		echo "error deleting table </br>";
	}

	echo "</div>";
}

if (isset($_POST["remove_row"])){

	echo "<div style='text-align:center;border: 3px solid green;'>";
	$conn = mysqli_connect("localhost","mydbuser","tBQZ8UDPsim3MLMm","myDB");	
	if (!$conn)
		die("Connection failed : ".mysqli_connect_error());
	$sql = "DELETE FROM Users WHERE ID = $id";
	if (mysqli_query($conn, $sql)){
		echo "Record $id deleted successfully </br>";
	}else{
		echo "error deleting record </br>";
	}

	echo "</div>";
}

if (isset($_POST["show_all"])){
	echo "<div style='text-align:center;border: 3px solid green;'>";
	$conn = mysqli_connect("localhost","mydbuser","tBQZ8UDPsim3MLMm","myDB");	
	if (!$conn)
		die("Connection failed : ".mysqli_connect_error());
	$sql = "SELECT * FROM Users";
	$result = null;
	if ($result = mysqli_query($conn, $sql)){
		echo "Selected all records </br>";
		if (mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo "<hr>";
				echo "ID: ".$row["ID"]." </br>";
				echo "Firstname: ".$row["Firstname"]." </br>";
				echo "Lastname: ".$row["Lastname"]." </br>";
				echo "Age: ".$row["Age"]." </br>";
				echo "Password: ".$row["Password"]." </br>";
				echo "Email: ".$row["Email"]." </br>";
			}
		}else{
			echo "end";
		}
	}else{
		echo "error selecting records</br>";
	}

	echo "</div>";
}

if (isset($_POST["first_ten"])){
	echo "<div style='text-align:center;border: 3px solid green;'>";
	$conn = mysqli_connect("localhost","mydbuser","tBQZ8UDPsim3MLMm","myDB");	
	if (!$conn)
		die("Connection failed : ");

	$sql = "SELECT * FROM Users ORDER BY id LIMIT 10";

	if ($result = mysqli_query($conn, $sql)){
		echo "Selected all records </br>";
		if (mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_assoc($result)){
				echo "<hr>";
				echo "ID: ".$row["ID"]." </br>";
				echo "Firstname: ".$row["Firstname"]." </br>";
				echo "Lastname: ".$row["Lastname"]." </br>";
				echo "Age: ".$row["Age"]." </br>";
				echo "Password: ".$row["Password"]." </br>";
				echo "Email: ".$row["Email"]." </br>";
			}
		}
	}else{
		echo "error selecting records </br>";
	}

	echo "</div>";
}

if (isset($_POST["count"])){
	echo "<div style='text-align:center;border: 3px solid green;'>";
	$conn = mysqli_connect("localhost","mydbuser","tBQZ8UDPsim3MLMm","myDB");	
	if (!$conn)
		die("Connection failed : ".mysqli_connect_error());
	$sql = "SELECT * FROM Users";
	if ($result = mysqli_query($conn, $sql)){
		echo "Selected successfully </br>";
		echo "Record count: ".mysqli_num_rows($result)."</br>";
	}else{
		echo "error counting records </br>";
	}
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
