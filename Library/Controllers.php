<?php

namespace Library;

use Library\Views;

/**
 * Controllers Class
 * @author Miguel Perez  <miguel@mlpz.com>
 */
class Controllers
{
	protected  $view;
	
	
	/**
	 * Construct controllers variables
	 */
	public  function __construct()
	{
		$this->view = new Views();
		$this->load();
		$this->view->getView();	
	}
	
}