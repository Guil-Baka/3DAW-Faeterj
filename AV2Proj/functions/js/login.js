
// when button with ID=submit is clicked, the function is called
// this function sends the email and password to the php file
// if the php file returns a json object, the user is logged in
// if the php file returns an error message, the user is not logged in

function login() {
  var email = "guilam.dev@gmail.com";
  var password = "password123";
  var data = {email: email, password: password};
  $.ajax({
    type: "POST",
    url: "functions/php/userLogin.php",
    data: data,
    
    
  });
}