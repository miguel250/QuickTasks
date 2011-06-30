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
		$list = new Lists();
		$add = array(
		"Hash" => "m3432m"
		);

		$this->view->setView('Single', $add);
	}
}