var Student = new Object();
Student.name = "John";
Student.surname = "Smith";
Student.age = 22;
Student.course = 5;

function GetOlder(age) {
    if (Student.age + Number(age) < 0) {
        alert("Cant submit negative age!");
    } else {
        Student.age = Student.age + Number(age);
    }
}

function ChangeSurname(surname) {
    if (surname.length == 0) {
        alert("Surname is required");
    } else {
        Student.surname = surname;
    }
}

function MoveToSecondCourse() {
    if (Student.course + 1 > 6) {
        alert("No more than 7 !");
    } else {
        Student.course = Student.course + 1;
    }
}

function print() {
    alert("Name: " + Student.name + "\n" + "Surname : " + Student.surname + "\n" + "Age : " + Student.age + "\n" + "Course : " + Student.course);
}

function surname() {
    ChangeSurname(prompt("Enter new Surname:"));
    alert("New surname : " + Student.surname);
}

function age() {
    GetOlder(prompt("enter years to add to student age : "));
    alert("New age: " + Student.age);
}

function course() {
    MoveToSecondCourse();
    alert("New course: " + Student.course);
}
