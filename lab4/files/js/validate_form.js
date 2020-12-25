function validate_forms() {

    var surname = document.getElementById("surname");
    var name = document.getElementById("name");


    var telNumber = document.getElementById("telNumber");
    var email = document.getElementById("email");
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");


    if (!surname.value) {
        alert("Surname is required")
        return false;
    } else {
        var regex = /^([^0-9]*)$/;
        if (regex.test(surname.value) == false) {
            alert("Surname should not contain numbers");
            return false;
        }
    }


    if (!name.value) {
        alert("Name is required");
        return false;
    } else {
        var regex = /^([^0-9]*)$/;
        if (regex.test(name.value) == false) {
            alert("Name should not contain numbers");
            return false;
        }
    }


    if (!telNumber.value) {
        alert("Phone number is required");
        return false;
    } else {
        var regex = /^[0-9]{10}$/;
        if (regex.test(telNumber.value) == false) {
            alert("Phone number lenght should be 10 numbers");
            return false;
        }
    }


    if (!email.value) {
        alert("Email is requiered");
        return false;
    } else {
        var regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        if (regex.test(email.value) == false) {
            alert("email should at least 1 symbol '@' і '.' and some symbols inside!");
            return false;
        }
    }


    if (!password1.value) {
        alert("password is required");
        return false;
    } else {

        if (password1.value.lenth() < 8) {
            alert("password can't be less then 8 symbols!");
            return false;
        }
    }
    if(password1.value != password2.value){
      alert("password #1 should be same as #2!");
      return false;
    }

    return true;
}
