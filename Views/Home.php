<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Quick Task</title>
</head>
<body>
	<form name="input" action="/" method="post">
		<input type="text" name="task" /> <input type="hidden" name="token"
			value="<?php echo $data2['token'] ?>" /> <input type="submit"
			value="Add Task" />
	</form>
</body>
</html>
