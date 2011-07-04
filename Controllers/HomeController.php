<?php

namespace Controllers;

use Library\Controllers;
use Models\Lists;

/**
 * Home controller
 * @author Miguel Perez  <miguel@mlpz.com>
 */
class HomeController extends Controllers
{
	public function load()
	{
		$add = array();
		$token = $this->hash->getHash(20);
		$formData['token'] = $token;

		$createdAt = new \DateTime('now');
		$list = new Lists();

		if(empty($_COOKIE['quicklist'])){
			setcookie('quicklist',$token);
		}elseif($formData['token']= $_COOKIE['quicklist']){
			setcookie('quicklist',$formData['token']);
		}

		$add = array();
			
		if('POST'=== $_SERVER['REQUEST_METHOD']){

			if($_POST['token'] == $_COOKIE['quicklist']){

				$add = array(
				"id" => $this->hash->getHash(4),
				'c_at'=> $createdAt->format('d-m-Y H:i:s'),
				'n'=> array(
				'1'=> array('b'=>$_POST['task'],'c'=>0)
				));

			
			 $list->add($add);
			 $formData['token'] = $token;
			 setcookie('quicklist',$token);

			 header("Location:http://".$_SERVER['HTTP_HOST']."/".$add['id']);
      
			}else{
				echo'please refresh the page';
			}
		}
		$this->view->setView('Home', $add, $formData);
	}
}