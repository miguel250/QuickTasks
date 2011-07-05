<?php

namespace Controllers;

use Library\Controllers;
use Models\Lists;
use Library\Pusher;

/**
 * Single Controller
 * @author Miguel Perez  <miguel@mlpz.com>
 */
class CompletedController extends Controllers
{

	public function load()
	{
		$list = new Lists();

		if('POST'=== $_SERVER['REQUEST_METHOD']){

			if($_POST['token'] == $_COOKIE['quicklist']){

			 $id = array('id' => $_POST['id']);
			 $add = array('$set' => array('n.'.$_POST['taskId'].'.c' => 1 ));
			 $list->Update($id ,$add);
				
			 $key = 'pusher key' ;
      		$secret = 'pusher secret';
      		$appId = 6676;
      		$channel = $_POST['id'];
      		$event = 'completed';
      		$task['taskid'] = $_POST['taskId'];
      		$pusher = new Pusher($key, $secret, $appId);
      		$pusher->trigger($channel, $event, $task);
			 
			 setcookie('quicklist','');

			 header("Location:http://".$_SERVER['HTTP_HOST']."/".$_POST['id']);
			}

		}else{
			header("Location:http://".$_SERVER['HTTP_HOST']."/");
		}
	}
}