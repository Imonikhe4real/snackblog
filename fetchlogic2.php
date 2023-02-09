<?php

class fetchLogic2{

public $servername='localhost';
public $user ='root';
public $pass ='';
public $dbname ='snacksblog';


public function __construct(){ 
       $dbconn = 'mysql:host='.$this->servername.';dbname='.$this->dbname;
       $this->conn = new PDO($dbconn,$this->user,$this->pass);
       $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
 public function insertaut(){
   
     if (isset($_POST['send'])) {
          
          $title = $_POST['title'];
          $name = $_POST['name'];
          $comment = $_POST['comment'];

  $sql = "INSERT INTO comments(title,name,comment)VALUES(:title,:name,:comment)";

    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':title',$title);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':comment',$comment);
    $stmt->execute();

    echo "<br>";
    echo "<center><b>Author Comment Added Successfully</b></center>";
    echo "<br>";
    echo "<br>";

     }


}


}

?>