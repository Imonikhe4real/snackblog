<?php


include 'logic.php';
$logic = new Logic();

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" type="text/css" href="w3.css">
</head>
<body>
	<div class="w3-top">
<div class="w3-border-0 w3-light-grey" style="height:100px;width:auto;"> 
  <br><br>
  <div id="welcome">
		
	</div>
</div>
<div class="w3-bar w3-black">
  <a href="index.php" class="w3-bar-item w3-button w3-hide-small" style="font-weight:bolder;text-decoration:none;">Home</a>
  <a href="registration.php" class="w3-bar-item w3-button w3-hide-small" style="font-weight:bolder;text-decoration:none;">Register</a>
  <a href="login.php" class="w3-bar-item w3-button w3-hide-small" style="font-weight:bolder;text-decoration:none;">Login</a>
  <a href="author.php" class="w3-bar-item w3-button w3-hide-small" style="font-weight:bolder;text-decoration:none;">Author</a>
  <a href="contact.php" class="w3-bar-item w3-button w3-hide-small" style="font-weight:bolder;text-decoration:none;">Contact</a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right w3-hide-large w3-hide-medium" onclick="myFunction()">&#9776;</a>
</div>
<div id="demo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium">
  <a href="index.php" class="w3-bar-item w3-button" style="font-weight:bolder;text-decoration:none;">Home</a>
  <a href="registration.php" class="w3-bar-item w3-button" style="font-weight:bolder;text-decoration:none;">Register</a>
  <a href="login.php" class="w3-bar-item w3-button" style="font-weight:bolder;text-decoration:none;">login</a>
  <a href="author.php" class="w3-bar-item w3-button" style="font-weight:bolder;text-decoration:none;">Author</a>
<a href="contact.php" class="w3-bar-item w3-button" style="font-weight:bolder;text-decoration:none;">Contact</a>
</div>
<script>
   function myFunction() {
  var x = document.getElementById("demo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
</div>
<div class="w3-border-0" style="height:200px;width:100%;">
  
</div>
<div class="w3-row">
  
    <div class="w3-quarter" style="height:700px;width:30%;">
      
    </div>
    <div class="w3-quarter" style="height:700px;width:40%;background-color:white;">
        <center>
         <form method="POST" style="background-color:white;" class="w3-light-grey">
          <h5 align="center" class="w3-text-white w3-border w3-black" style="font-weight:bolder;margin:auto;margin-top:0px;">CONTACT FORM</h5>
          <table class="w3-table" style="max-width:100%;">
           <?php
           
           include 'fetchlogic.php';
           $fetchlogic = new fetchLogic();
           $insertcontact = $fetchlogic->insertcontact();

          ?>
              <tr>
                <td class="w3-text-black" style="font-weight:bolder;">Fullname
                <input class="w3-input w3-border"  type="text" name="fullname" required="required"  placeholder="Enter Your Full name here ... "></td>
              </tr>
              <tr>
                <td class="w3-text-black" style="font-weight:bolder;">Email
                <input type="email" name="email" required="required" class="w3-input w3-border" placeholder="Enter Your email here ... "></td>
              </tr>
              <tr>
                <td class="w3-text-black" style="font-weight:bolder;">Message
                <textarea name="message" cols="20" rows="5" required="required" class="w3-input w3-border" placeholder="Enter your message here....."></textarea></td>
              </tr>
          </table>
           <center><input type="submit" name="send" value="send" button="button" class="btn btn-default" style="background-color:black;color:white;font-weight:bolder;"></center>
       </form>
     </center>
    </div>
    <div class="w3-quarter" style="height:700px;width:30%;">
      
    </div>


</div>
<div class="w3-border-0" style="height:20px;width:100%;background-color:black;">
  
</div>
<footer class="w3-border-0 w3-light-grey" style="height:300px;width:100%;">
  <div id="footer"></div>
</footer>


<script>
	document.getElementById('welcome').innerHTML = '<center><b>Welcome To Nafiu Snacks Blog</b></center>';
	document.getElementById('intro').innerHTML = '<br><br><br><br><br><br><br><br><center><b>This is a blog where you post your comments about any of the snacks you are seeing on our blog</b></center>';
document.getElementById('footer').innerHTML ='<br><br><br><br><br><center><b>Copyright &copy 2023</b></center>';
</script>
</body>
</html>