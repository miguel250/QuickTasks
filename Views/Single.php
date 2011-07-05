<!DOCTYPE HTML>
<html lang="en-US">
<head>
<meta charset="UTF-8">
<title>Quick Task</title>
</head>
<body>
<div id='list'>
	<ul>
	<?php foreach ($data['n'] as $key => $task) {
		if ($task['c']){
			$checked = 'checked="checked"  disabled';
		}else{
			$checked = '';
		}
		echo '<li id="'.$key.'">'.$task['b'].'<input id="checkbox-'.$key.'" type="checkbox" name="completed" onclick="Complete(\''.$key.'\');" '.$checked.'/></li>';
	}?>
	</ul>
	</div>
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
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js" type="text/javascript"></script> 
	 <script src="http://js.pusherapp.com/1.8/pusher.min.js" type="text/javascript"></script>
	<script type="text/javascript">
          function Complete($taskId)
          {
        	 $('#taskId').attr('value', $taskId); 
        	 $('#complete').submit(); 
          }  

          var pusher = new Pusher('22b54ca3dc1bdb53bb06');
          var channel = pusher.subscribe('<?php echo $data['id']?>');
          
          channel.bind('added', function(data) {
            $('#list ul').append('<li id="'+data.taskid+'">'+data.b+'<input type="checkbox" name="completed" onclick="Complete('+data.taskid+')" /></li>');
          });

          channel.bind('completed', function(data) {
        	 $('#checkbox-'+data.taskid+'').attr({checked:'checked',disabled:true});
            });     
    </script>
</body>
</html>
