<?php

namespace Library;

class Views
{
	private $viewName;
	private $data;
	private $data2;

	/**
	 * Get view 
	 * @return boolean
	 */
	public function getView()
	{
		$data = $this->data;
		$data2 = $this->data2;
		require_once __DIR__.'/../Views/'.$this->viewName.'.php';
		return true;
	}

	/**
	 * Set view to load
	 * @param string $viewName
	 * @param mixed $data
	 */
	public  function setView($viewName, $data, $data2 = null)
	{
		$this->data = $data;
		$this->data2 = $data2;
		$this->viewName = $viewName;
	}

}