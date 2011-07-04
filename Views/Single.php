<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Quick Task</title>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script> 
</head>
<body>
	<ul>
	<?php foreach ($data['n'] as $key => $task) {
		if ($task['c']){
			$checked = 'checked="checked"  disabled';
		}else{
			$checked = '';
		}
		echo '<li id="'.$key.'">'.$task['b'].'<input type="checkbox" name="completed" onclick="Complete(\''.$key.'\');" '.$checked.'/></li>';
	}?>
	</ul>
	<form name="task" action="/<?php echo $data['id']?>" method="post">
		<input type="text" name="task" /> <input type="hidden" name="token"
			value="<?php echo $data2['token'] ?>" /> <input type="submit"
			value="Add Task" />
	</form>
	
	<form id="complete" name="complete" action="/completed/" method="post">
		<input type="hidden" name="id" value="<?php echo $data['id']?>" /> 
		<input type="hidden" id="taskId" name="taskId" value="" /> 
		<input type="hidden" name="token" value="<?php echo $data2['token'] ?>" /> 
	</form>
	
	<script type="text/javascript">
          function Complete($taskId)
          {
        	  $('#taskId').attr('value', $taskId); 
        	  $('#complete').submit(); 
          }                      
            </script>
</body>
</html>
