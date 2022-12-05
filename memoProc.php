
<?php

include "Lib.php";

$a = $_GET['name'];
$b = $_GET['memo']; 

$c = date("Y-m-d H:i:s"); 



$query = "insert into memo(name,memo,regdate) 
         values('$a','$b','$c') ";

mysqli_query($db, $query); 


?>
<script>
location.href='memo.php'; 
</script>
Footer
© 2022 GitHub, Inc.
Footer navigation
T