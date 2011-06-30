<?php

namespace Library;

class Views
{
	private $viewName;
	private $data;

	/**
	 * Get view 
	 * @return boolean
	 */
	public function getView()
	{
		$data = $this->data;
		require_once __DIR__.'/../Views/'.$this->viewName.'.php';
		return true;
	}

	/**
	 * Set view to load
	 * @param string $viewName
	 * @param mixed $data
	 */
	public  function setView($viewName, $data)
	{
		$this->data = $data;
		$this->viewName = $viewName;
	}

}