<?php

namespace Controllers;

use Library\Controllers;
use Models\Lists;

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

			 setcookie('quicklist','');

			 header("Location:http://".$_SERVER['HTTP_HOST']."/".$_POST['id']);
			}
				
		}else{
			header("Location:http://".$_SERVER['HTTP_HOST']."/");
		}
	}
}