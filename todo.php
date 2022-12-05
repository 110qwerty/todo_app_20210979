<!DOCTYPE html>
<html>
<?php 
    // 오류 변수 초기화
	$errors = "";

	// 데베 연결
	$db = mysqli_connect("localhost", "itheeah", "1234", "study");

	// 버튼 클릭하면 삽입
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO tasks (task) VALUES ('$task')";
			mysqli_query($db, $sql);
			header('location: todo.php');
		}
	}

    // 삭제
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];

        mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
        header('location: todo.php');
    }

?>



<head>
	<title>Do it!</title>
    <link rel="stylesheet" type="text/css" href="todo.css">
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
	
	<div class="heading">
		<h2 style="font-style: 'Hervetica';">ToDo List</h2>
	</div>
	<form method="post" action="todo.php" class="input_form">
        <?php if (isset($errors)) { ?>
	        <p><?php echo $errors; ?></p>
        <?php } ?>
            <input type="text" name="task" class="task_input">
            <button type="submit" name="submit" id="add_btn" class="add_btn">Add</button>
	</form>
    <table>
	<thead>
		<tr>
			<th>N</th>
			<th>Tasks</th>
			<th style="width: 60px;">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		// 페이지를 방문하거나 새로 고칠 경우 모든 작업 선택
		$tasks = mysqli_query($db, "SELECT * FROM tasks");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td class="delete"> 
					<a href="todo.php?del_task=<?php echo $row['id'] ?>">x</a> 
				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>
</body>
</html>