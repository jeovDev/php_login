<?php
 include 'connection.php';
session_start();
$usernrname = $_POST['username']??'';
$password = $_POST['password']??'';
$epassword = sha1($password );
$result ="";
 
  if(isset($_POST['submit'])){
  
    if($usernrname === "" || $password === ""){
      $result = "Contain Empty Field(s)";
    }else{
      $sql = "SELECT * FROM register.tbl WHERE d_username = '$usernrname' AND d_password = '$epassword' LIMIT 1";
  
      $results = $conn->query($sql);
      
      if($results->num_rows > 0){
    
        while($row = $results->fetch_assoc()){
          $_SESSION["id"] =   $row['ID'];
          header("location:welcome.php");
          $usernrname = "";
          $password = "";
        }
        $result = "Registered";
      }else{
        $result = "You are not registered";
        $usernrname = "";
        $password = "";
        // echo "<script>alert('$epassword')</script>";
      }
    }

  }
 

 


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Login</title>
  
  </head>
  
  <body>  <div class="form-container">
      <div class="welcome-text"><h1>LOG IN</h1></div>
      <div class="logo-wrapper">
        <img src="logo.png" alt="" />
      </div>
      <div class="form-wrapper">
        <form method="post">
          <input
            type="text"
            placeholder="username"
            name="username"
            autocomplete="off"
          />
          <br />
          <input type="password" placeholder="passowrd" name="password" />
          <br />
          <div class="res">
          <span><?php echo $result; ?> </span> <br />
          </div>
     
          <input type="submit" name="submit" />
          <div class="reg">
            <label for="">Dont have an account? &nbsp; </label>
            <a href="signup.php">Sign up</a>
          </div>
        </form>
      </div>
    </div></body>
</html>
