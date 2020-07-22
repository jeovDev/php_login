<?php
include 'connection.php';

$username = $_POST["username"]??'';
$password = $_POST["password"]??'';
$epassword = sha1($password);  
$confirm = $_POST["confirm"]??'';
$result = "";

if(isset($_POST['submit']))
{
   

  $verify = "SELECT * FROM register.tbl WHERE d_username = '$username' AND d_password = '$password' LIMIT 1";
  $store = $conn->query($verify);
  
  if($store->num_rows > 0){
     while($row = $store->fetch_assoc()){
       $result = "The username " . $row["d_username"] . " is already taken, Please choose another username";
       $result = "username is not available";
     }
  }else{
                  
          if($password != $confirm){
            $result = "Password does not match";
          }else{
         
            $stmt =$conn->prepare("INSERT INTO register.tbl (d_username,d_password) VALUES(?,?)");
            $stmt->bind_param("ss",$username,$epassword);
            if($confirm == $password){
              $stmt->execute();
              // header("location:login.php");
              $result = "Succesfully Registered";
            }
  }
 
  }
  

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="form-container">
      <div class="welcome-text"><h1>REGISTER</h1></div>
      <div class="logo-wrapper">
        <img src="logo.png" alt="" />
      </div>
      <div class="form-wrapper">
        <form method="post">
          <input
            type="text"
            placeholder="Username"
            name="username"
            autocomplete="off"
          />
          <br />
          <input type="password" placeholder="Password" name="password" />
          <input
            type="password"
            placeholder="confirm Password"
            name="confirm"
          />
          <br />
          <div class="res">
          <span><?php echo $result; ?> </span> <br />
          </div>
          <input type="submit" name="submit" />
          <div class="reg">
           
            <a href="login.php"> Go back to Log In page</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
