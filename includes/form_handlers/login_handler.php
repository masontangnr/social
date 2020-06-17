<?php 

if(isset($_POST['login_button'])) {

  $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); // Sanitize email

  $_SESSION['log_email'] = $email; // store email into session variable
  $password = md5($_POST['log_password']); //Get password

  $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'"); //check if the user email and password is in the database
  $check_login_query = mysqli_num_rows($check_database_query);//check if there is any email and password

  //if email and password exist then save it as a session
  if($check_login_query == 1) {
    $row = mysqli_fetch_array($check_database_query);
    $username = $row['username'];
  
    $user_closed_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND user_closed='yes'"); //if user is not logged in
    if(mysqli_num_rows($user_closed_query) == 1){
      $reopen_account = mysqli_query($con, "UPDATE user SET user_closed='no' WHERE email='$email'"); // user is changed to log in
    }


    $_SESSION['username'] = $username;
    header("Location: index.php");
    exit();
  }
  //if email and password does not exist then push the error message
  else {
    array_push($error_array, "Email or password was incorrect<br>");
  }
}

?>