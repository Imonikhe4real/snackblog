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
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link rel="stylesheet" type="text/css" href="w3.css">
  <script src="jquery-3.6.3.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("form").toggle();
  });
});
</script>
</head>
<body>
<?php
  
  include 'logic2.php';
  $logic = new Logic();
  $id = $_REQUEST['id'];
  $row = $logic->fetch_single($id);

  if (!empty($row)) {
  	   
 
?>
<div class="w3-bar w3-black" style="height:100px;width:100%;">
<h5>Welcome: <font color="white"><?php echo $user["username"]; ?></font></h5>
Author Dashboard<br>
<a href="authlogout.php" class="btn btn-yellow btn-primary" style="font-weight:bolder;">Logout</a>
</div>
  <br><br>
  <a href="authdashboard.php" button="button" class="btn btn-success" style="font-weight:bolder;">Back to page</a>
<center>
<table class="w3-table w3-light-grey"  width="50%">

    <h1 align="center">SINGLE SNACK</h1>
    <center>
<tr>
  <td></td><td><img src="<?php echo $row['snacks'];?>"></td></td>
 </tr>
<tr>
  <td><b>Title :</b></td><td><?php echo $row['title'];?></td>
</tr>
 <tr>
  <td><b>Description :</b></td><td><?php echo $row['description'];?></td>
 </tr>
<tr>
 <td><b>Created Time:</b></td> <td><?php echo $row['created_at'];?></td>
</tr>
</center>
<br><br>

     <?php
      }
	?>
</table>
</center>
<br><br>

<center><button type="button" style="font-weight:bolder;background-color:green;color:white;padding:10px;">Reply</button></center>
  <center>

  <form method="POST"><center>
     <table>
        <tr>
        <td>Title</td>
        <td><input type="text" name="title" required="required"></td>
       </tr>
       <tr>
        <td>Author</td>
        <td><input type="text" name="name" required="required"></td>
       </tr>
        <tr>
        <td>Reply</td>
        <td><textarea name="comment" cols="20" rows="5" required="required"></textarea></td>
       </tr>
       <tr>
         <td><input type="submit" name="send" value="send"></td>
       </tr>
     </table></center>
  </form>
</center>

<div class="w3-border">
      <?php  
          include 'fetchlogic2.php';
          $fetchlogic2 = new fetchLogic2();
          $insertaut = $fetchlogic2->insertaut();
      ?>
    <br><br>
</div>


<?php
              
 include 'fetchlogic.php';
 $fetchlogic = new fetchLogic();
 $rows = $fetchlogic->fetchcomment();
 $i = 1;
 if (!empty($rows)) {
   foreach ($rows as $row) {
                    
?>
               <b>Title:</b><?php echo $row['title']; ?><br>
               <b>Name:</b><?php echo $row['name']; ?><br>
               <b>Comment:</b><?php echo $row['comment']; ?><br>
              <b>Posted Time: </b><?php echo $row['created_at']; ?><br>
              <br>
              <a href="deletecomment.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" style="font-weight:bolder;">Delete</a><br><br>
        <?php
              
               }
             }else{
              echo "No records";
             }


        ?>

<div>

</div>
