<?php

namespace Library;

use Library\Views;
use Library\Hash;

/**
 * Controllers Class
 * @author Miguel Perez  <miguel@mlpz.com>
 */
class Controllers
{
	protected  $view;
	protected  $pattern;
	protected  $hash;
	
	
	/**
	 * Construct controllers variables
	 */
	public  function __construct($pattern)
	{
		$this->view = new Views();
		$this->hash = new Hash();
		$this->pattern = $pattern;
		$this->load();
		$this->view->getView();	
	}
	
}