<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Quick Task</title>
</head>
<body>
	<ul>
	<?php foreach ($data['n'] as $task) {
		echo '<li>'.$task['b'].'<input type="checkbox" name="completed" value="'.$task['c'].'" /></li>';
	}?>
	</ul>
	<form name="input" action="/<?php echo $data['id']?>" method="post">
		<input type="text" name="task" /> <input type="hidden" name="token"
			value="<?php echo $data2['token'] ?>" /> <input type="submit"
			value="Add Task" />
	</form>
</body>
</html>
