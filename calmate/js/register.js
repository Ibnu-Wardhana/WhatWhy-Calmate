function register() {
  var pass = document.getElementById("password").value;
  //var cpassword = document.getElementById("cpassword").value;

  if (pass === "" && cpassword === "") {
    alert("Password and Password Confirmation could not be empty!");
  } else if (pass === "") {
    alert("Password cannot be empty!");
  } else if (cpassword === "") {
    alert("Password Confirmation could not be empty!");
  } else if (pass != cpassword) {
    alert("Password and Password Confirmation is not alike!");
  } else if (pass == cpassword) {
    alert("Registered Successfully!");
  }
}
