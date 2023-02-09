<?php


include 'function2.php';

$select = new Select();

if (isset($_SESSION["id"])) {
    
    $user = $select->selectUserById($_SESSION["id"]);
}
else
{
     header("Location:authdashboard.php");
}


?>
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
<div class="w3-bar w3-black" style="height:100px;width:100%;">
<h5>Welcome <font color="white"><?php echo $user["username"]; ?></font></h5>
Author Dashboard<br>
<a href="authlogout.php" class="btn btn-yellow btn-primary" style="font-weight:bolder;">Logout</a>
</div>
</div>
<div class="w3-border-0" style="height:300px;width:100%;">
    <div id="intro"></div>
</div>
 <div class="w3-light-grey">    
    <br><br>
     <center>
    <?php 

include 'logic2.php';
$logic = new Logic();

    $sql = "SELECT * FROM sanckstb";     
    $records_per_page=3;
    $newquery = $logic->pagingshow($sql,$records_per_page);
    $logic->dataviewshow($newquery);
    echo"<br>";
    echo "<br>"; 
    echo "<br>";  
    $logic->paginglinkshow($sql,$records_per_page);   
    ?>
</center>
</div>
<div class="w3-border-0" style="height:100px;width:100%;"> 
     
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

