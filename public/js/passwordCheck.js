
var myInput = document.getElementById("new_password");
var myInputConfirm = document.getElementById("new_password_confirmation");
var letter = document.getElementById("letter");
var number = document.getElementById("numbers");
var length = document.getElementById("length");
var myConfirm = document.getElementById("Confirm");

myInput.onkeyup = function() {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(lowerCaseLetters || upperCaseLetters)) {
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
  }
  
    // Validate numbers
    var numbers = /[0-9]/g;

    if(myInput.value.match(numbers)) {
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }
  
    // Validate length
    if(myInput.value.length >= 6) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
    if(myInputConfirm.value == myInput.value){
        myConfirm.classList.remove("invalid");
        myConfirm.classList.add("valid");
      } else {
        myConfirm.classList.remove("valid");
        myConfirm.classList.add("invalid");
      }
   
  }
  myInputConfirm.onkeyup = function() {
    if(myInputConfirm.value == myInput.value){
        myConfirm.classList.remove("invalid");
        myConfirm.classList.add("valid");
      } else {
        myConfirm.classList.remove("valid");
        myConfirm.classList.add("invalid");
      }
  }