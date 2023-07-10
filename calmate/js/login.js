function validasi(){	
    var nama = document.getElementById("username").value;
    var pass = document.getElementById("password").value;
    
    if(nama === "" && pass === ""){
      alert("Username and Password cannot be empty!");
    } else if(nama === ""){
      alert("Username cannot be empty!");
    } else if(pass === ""){
      alert("Password cannot be empty!");
    }
  }