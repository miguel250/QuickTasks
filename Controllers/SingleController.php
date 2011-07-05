<?php

namespace Controllers;

use Library\Controllers;
use Models\Lists;
use Library\Pusher;

/**
 * Single Controller
 * @author Miguel Perez  <miguel@mlpz.com>
 */
class SingleController extends Controllers
{
	private $id;

	public function __construct($pattern,$id)
	{
		$this->id = $id;
		parent::__construct($pattern);

	}

	public function load()
	{
		$token = $this->hash->getHash(20);
		$formData['token'] = $token;

		if(empty($_COOKIE['quicklist'])){
			setcookie('quicklist',$token);
		}elseif($formData['token']= $_COOKIE['quicklist']){
			setcookie('quicklist',$formData['token']);
		}

		$list = new Lists();
		$data	= $list->find(array('id'=>$this->id));
		$id = $data['id'];
		$count = count($data['n']);
		$upset = $count + 1;

		if('POST'=== $_SERVER['REQUEST_METHOD']){

			if($_POST['token'] == $_COOKIE['quicklist']){

				$id = array('id' => $id);
				$task = array('b'=>htmlspecialchars($_POST['task']),'c'=>0);
				$add = array('$set' => array('n.'.$upset => $task));
				$list->Update($id ,$add);



			 $formData['token'] = $token;
			 setcookie('quicklist',$token);
			 $data	= $list->find(array('id'=>$this->id));

			 $key = 'pusher key' ;
			 $secret = 'pusher secret';
			 $appId = 6676;
			 $channel = $data['id'];
			 $event = 'added';
			 $task['taskid'] = $upset;
			 $pusher = new Pusher($key, $secret, $appId);
			 $pusher->trigger($channel, $event, $task);

			}else{
				echo'please refresh the page';
			}
		}

		if(empty($data)){
			header("HTTP/1.0 404 Not Found");
			$this->view->setView('404', $this->id." couldn't be found");
		}else{
			$this->view->setView('Single', $data, $formData);
		}
	}

}