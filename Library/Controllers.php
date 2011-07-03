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
	protected  $pattern;
	
	
	/**
	 * Construct controllers variables
	 */
	public  function __construct($pattern)
	{
		$this->view = new Views();
		$this->pattern = $pattern;
		$this->load();
		$this->view->getView();	
	}
	
}