<?php

    include "Lib.php";

    
    
    $idx = $_GET['idx'];
 

    $query = "delete from memo where idx='$idx' ";
    
    mysqli_query($db, $query); 


?>
<script>
    location.href='memo.php'; 
</script>