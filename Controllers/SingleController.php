<?php

namespace Controllers;

use Library\Controllers;

/**
 * Single Controller 
 * @author Miguel Perez  <miguel@mlpz.com>
 */
class SingleController extends Controllers
{
	private $id;

	public function __construct($id)
	{
		$this->id = $id;
		parent::__construct();

	}

	public function load()
	{
		$this->view->setView('Single', $this->id);
	}

}