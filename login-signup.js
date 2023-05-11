document.getElementById("format").style.display="none";
let password = document.getElementById("password");
password.addEventListener("input", function () {//input here work as onChange
  document.getElementById("pass").style.display = "none";
  document.getElementById("password").style.borderColor = "#3f51b5";
});
function Email() {
  let input = document.getElementById("email").value;
  let regexp =/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (!regexp.test(input)) {
    document.getElementById("format").innerHTML ="Invalid email format. Please use the following format: example@gmail.com";
    document.getElementById("format").style.color="red";
    document.getElementById("format").style.fontSize = "small";
    document.getElementById("email").style.borderColor="red";
  }else{
    document.getElementById("format").style.display="none";
    document.getElementById("email").style.borderColor = "#3f51b5";
  }
}

function validateForm(event){
    event.preventDefault();//if fields are empty will not load, we prevent it's default behavior
    let email=document.getElementById("email");
    if(email.value==''){
        document.getElementById("format").style.display="block";
        document.getElementById("format").innerHTML ="This field can't be left empty";
        document.getElementById("format").style.color = "red";
        document.getElementById("email").style.borderColor = "red";
        return false;
    }else{
        document.getElementById("format").style.display = "none";
    }
    if(password.value==''){
        document.getElementById("pass").innerHTML = "This field can't be left empty";
        document.getElementById("pass").style.display="block"
        document.getElementById("pass").style.color = "red";
        document.getElementById("password").style.borderColor = "red";
        return false;
    }
}

    
