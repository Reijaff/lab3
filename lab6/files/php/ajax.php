<?php
 
$Errors = array();

$Fields = array(
    'lastname' => $_POST['lastname'],
    'firstname' => $_POST['firstname'],
    'username' => $_POST['username'],
    
    'phone' => $_POST['phone'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'confirm_password' => $_POST['confirm_password'],
    'agree' => $_POST['agree'],
);
 

if($Fields['lastname'] == '')
{
    $Errors['lastname'] = 'Input your lastname!';
}
else 
{
    if(!preg_match("/[a-zA-Z]{3,30}$/", $Fields['lastname']))
    {
        $Errors['lastname'] = "Lastname should not contain number or special characters.";
    }
}


if($Fields['firstname'] == '')
{
    $Errors['firstname'] = "Input your real name!";
}
else 
{
    if(!preg_match("/[a-zA-Z]{3,30}$/", $Fields['firstname']))
    {
        $Errors['firstname'] = "Name should not contain number or special characters.";
    }
}


if($Fields['username'] == '')
{
    $Errors['username'] = "Input your username!";
}
else 
{
    if(!preg_match("/^[a-z0-9][a-z0-9_]*[a-z0-9]$/", $Fields['username']))
    {
        $Errors['username'] = "Username may consist of lowercase alfanumeric characters and underscore.";
    }
}





if($Fields['phone'] == '')
{
    $Errors['phone'] = "Input your phone number!";
}
else 
{
    if(!preg_match("/^[0-9]{10}$/", $Fields['phone']))
    {
        $Errors['phone'] = "Phone number should be 10 digits long!";
    }
}



if($Fields['email'] == '')
{
    $Errors['email'] = "Input your Email address!";
}
else 
{
    if(!preg_match("/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/", $Fields['email']))
    {
        $Errors['email'] = "Email address should consist of  1 symbol '@' і '.' and few characters between!";
    }
}


if($Fields['password'] == '')
{
    $Errors['password'] = "Input your password!";
}
else 
{
    if(!preg_match("/^.{8,}$/", $Fields['password']))
    {
        $Errors['password'] = "Password should be 8+ characters long!";
    }
}

if($Fields['confirm_password'] == '')
{
    $Errors['confirm_password'] = "Confirm your password!";
}
else 
{
    if(!preg_match("/^.{8,}$/", $Fields['confirm_password']))
    {
        $Errors['confirm_password'] = "Password should be 8+ characters long!";
    }
}

if($Fields['confirm_password'] != $Fields['password']){
	$Errors['confirm_password'] = "Check your password input, passwords do not match!";
}

if($Fields['agree'] == "false"){
	$Errors['agree'] = "Please agree to out license policy!";
}



if(empty($Errors)){
    echo json_encode(array('result' => 'success'));
}else{
    echo json_encode(array('result' => 'error', 'text_error' => $Errors));
}
?>
