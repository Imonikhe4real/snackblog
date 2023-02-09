    <?php 

    $sql = "SELECT * FROM snackstb";       
    $records_per_page=3;
    $newquery = $logic->pagingshow($sql,$records_per_page);
    $logic->dataviewshow($newquery);
    $logic->paginglinkshow($sql,$records_per_page);   
    
    ?>