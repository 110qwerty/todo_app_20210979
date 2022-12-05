<?php
    include "Lib.php";
?>
<!DOCTYPE html>
<html lang="ko-KR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>memo</title>
        <link rel="stylesheet" href="memo.css">
        <header>
            <h1>Do it!</h1>
                <nav style="padding:10px 50px 10px 50px;">
                    <span><a href="index.html">logout</a></span>
                    <span><a href="todo.php">todo</a></span>
                    <span><a href="memo.php">memo</a></span>
                    <span><a href="calender.html">calender</a></span>
                    <span><a href="clock.html">clock</a></span>
                </nav>
        </header>
    </head>
<body>
    <section class="memo_form">
        <h1>간단 메모</h1> <br><br>
            <form action="memoProc.php">
                <div class="int-area">
                    제목 : <input type="text" name="name">  <br>
                    메모 : <input type="text" name="memo">  <br>
                </div>
                <div class="btn-area">
                    <button type="submit">저장</button>
                </div>
            </form> 
    
<?php

    $query = "select * from memo  order by idx desc ";

    $result = mysqli_query($db,$query); 

?>

<table border=1>
<br><br>
    <tr>
        <td> idx </td>
        <td> 제목 </td>
        <td> 메모 </td>
        <td> 등록일 </td> 
        <!--<td> 삭제 </td> 
        <td> 수정 </td> -->
    </tr>
    
        <?php
            while($data = mysqli_fetch_array($result)){ 
        ?>

    <tr>
        <td> <?=$data[idx]?> </td>
        <td>  <?=$data[name]?> </td>
        <td>  <?=$data[memo]?> </td>
        <td>  <?=$data[regdate]?> </td> 
        <!--<td>  <a href="del.php?idx=</?php echo $data['idx']?>"   onclick="return confirm('정말 삭제할까요?');">삭제</a> </td> 
        <td>  <a href="#" onclick="editData('</?=$data[idx]?>');">수정</a> -->
    </tr>
        <?php 
            } 
        ?>

</table>
<!--<script>
    function editData(idx){
         
        var a = prompt('수정할 내용을 입력하세요.');
        
        location.href='edit.php?idx='+idx+"&memo="+a;

    }
</script>-->


</body>
</html>