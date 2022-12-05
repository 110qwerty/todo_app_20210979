<?php

    include "Lib.php";

    
    
    $idx = $_GET['idx'];
    $memo = $_GET['memo'];
  
    $query = "update memo set memo='$memo'  where idx='$idx' ";
    
    mysqli_query($db, $query); 


?>
<script>
    location.href='memo.php'; 
</script>