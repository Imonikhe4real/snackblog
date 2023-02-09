<?php



class Logic{

public $servername='localhost';
public $user ='root';
public $pass ='';
public $dbname ='snacksblog';


public function __construct(){ 
       $dbconn = 'mysql:host='.$this->servername.';dbname='.$this->dbname;
       $this->conn = new PDO($dbconn,$this->user,$this->pass);
       $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
public function dataviewshow($sql){
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
	
		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{

				?>
                
     	 		<img src="<?php echo $row['snacks']; ?>" style="height:100px;width:200px;"><br>
     	 		<?php echo $row['title']; ?><br>
     	 		<?php echo $row['description']; ?><br>
     	 		<?php echo $row['created_at']; ?>
     	 		<br><br><br>
     <a href="read.php?id=<?php echo $row['id']; ?>" class="btn btn-info" style="font-weight:bolder;">Read More...</a>    	 	
                  <br><br>
                <?php
			}
		}
		else
		{
			?>
            <tr>
            <td>Nothing here...</td>
            </tr>
            <?php
		}
		
	}
	
	public function pagingshow($sql,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$sql2=$sql." limit $starting_position,$records_per_page";
		return $sql2;
	}
	
	public function paginglinkshow($sql,$records_per_page)
	{
		
		$self = $_SERVER['PHP_SELF'];
		
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		
		$total_no_of_records = $stmt->rowCount();
		
		if($total_no_of_records > 0)
		{
			?><tr><td colspan="3"><?php
			$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
			$current_page=1;
			if(isset($_GET["page_no"]))
			{
				$current_page=$_GET["page_no"];
			}
			if($current_page!=1)
			{
				$previous =$current_page-1;
				echo "<a href='".$self."?page_no=1'>First</a>&nbsp;&nbsp;";
				echo "<a href='".$self."?page_no=".$previous."'>Previous</a>&nbsp;&nbsp;";
			}
			for($i=1;$i<=$total_no_of_pages;$i++)
			{
				if($i==$current_page)
				{
					echo "<strong><a href='".$self."?page_no=".$i."' style='color:red;text-decoration:none'>".$i."</a></strong>&nbsp;&nbsp;";
				}
				else
				{
					echo "<a href='".$self."?page_no=".$i."'>".$i."</a>&nbsp;&nbsp;";
				}
			}
			if($current_page!=$total_no_of_pages)
			{
				$next=$current_page+1;
				echo "<a href='".$self."?page_no=".$next."'>Next</a>&nbsp;&nbsp;";
				echo "<a href='".$self."?page_no=".$total_no_of_pages."'>Last</a>&nbsp;&nbsp;";
			}
			?></td></tr><?php
		}
	}

public function fetch_single($id){

         $data = null;

         $sql = "SELECT * FROM sanckstb WHERE id = :id";
         $stmt = $this->conn->prepare($sql);
         $stmt->bindParam(':id',$id);
         $stmt->execute();
         if ($stmt) {
             while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                     $data = $row;
             }
         }
         return $data;
}
public function fetch(){
     

        $data = null;

        $sql  = "SELECT * FROM sanckstb";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        if ($stmt) {
               while ($row = $stmt->fetch()) {
                      $data[] = $row;
               }
        }
        return $data;
    }


}

?>

