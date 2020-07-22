<?php

include 'connection.php';
session_start();
$session = "";
// $user = "";
// $id = "";
$session = $_SESSION["id"]??'';

$sql = "SELECT * FROM register.tbl WHERE id = '$session' ";
$result = $conn->query($sql);

if($result->num_rows >0){
  while($row = $result->fetch_assoc()){
    $id = $row["ID"];
    $user = $row["d_username"];
  }
}else{
  echo "null";
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
  <style>
  
 
  
  td:nth-child(2){
    width:150px;
    display:flex;
    justify-content:center;
    text-transform: uppercase;

  }
      
  </style>
  <body>
    <div class="form-container">
      <div class="welcome-text"><h1>WELCOME</h1></div>
      <div class="logo-wrapper">
        <img src="logo.png" alt="" />
      </div>
      <div class="form-wrapper">
        <form method="post">
          <div class="data">
            <br />
            
           <table>
               <tr>
                  <td>User ID : </td>      
                  <td><?php echo $session; ?></td>  
               </tr>
               <tr>
               <td>Username : </td>
               <td><?php echo $user; ?></td>
               </tr>
           </table>
            <br />
            <br />
          </div>

          <div class="reg">
            <a href="login.php">Log Out</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
