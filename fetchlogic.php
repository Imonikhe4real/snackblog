<?php

class fetchLogic{

public $servername='localhost';
public $user ='root';
public $pass ='';
public $dbname ='snacksblog';


public function __construct(){ 
       $dbconn = 'mysql:host='.$this->servername.';dbname='.$this->dbname;
       $this->conn = new PDO($dbconn,$this->user,$this->pass);
       $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
public function fetchcomment(){
     

        $data = null;

        $sql  = "SELECT * FROM comments";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if ($stmt) {
               while ($row = $stmt->fetch()) {
                      $data[] = $row;
               }
        }
        return $data;
    }
public function deletecomment($id){
    
    $sql = "DELETE FROM comments WHERE id = :id";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    if ($stmt) {
      return true;
    }else{
    return false;
    }
}

public function insertcontact(){
      
      if (isset($_POST['send'])) {
            
            $fullname = $_POST['fullname']; 
            $email = $_POST['email'];   
            $message = $_POST['message'];
    
    $sql = "INSERT INTO contacts(fullname,email,message)VALUES(:fullname,:email,:message)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':fullname',$fullname);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':message',$message);
    $stmt->execute();

    echo "<center><b><font color='black'>Message Sent Successfully</font></b></center>";
    echo "<center><b><font color='black'>You will be contacted shortly by our call center agent in 24hrs time from now.</font></b></center>";



      }


}


}


?>