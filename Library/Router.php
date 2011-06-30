<?php

namespace Library;

/**
 * Handle all the application requests
 * @author Miguel Perez  <miguel@mlpz.com>
 */
class Router
{
	private $request;
	private $routers;
	private $routerName;
	private $controller;
	private $pattern;
	private $patternVariable;

	public function __construct($request,$routers)
	{
		$this->request = $request;
		$this->routers = $routers;
		$this->pattern();
		$this->Matchs();
		$this->LoadController();

	}

	/**
	 * Load Controller
	 */
	private function LoadController()
	{
		if ($this->patternVariable){
			return new $this->controller($this->pattern);
		}else{
			return new $this->controller();
		}
	}


	/**
	 *Check if pattern has a variable
	 */
	private function Pattern()
	{

		foreach ($this->routers as $key => $router){

			$routers[$key]['controller'] = $router['controller'];

			if($router['pattern'] == '{id}'){
				$re = str_replace('/', '', $this->request);
				$routers[$key]['pattern'] = $re;
				$routers[$key]['value'] = true;
			}else{
				$routers[$key]['pattern'] = $router['pattern'];
				$routers[$key]['value'] = false;
			}
		}
		$this->routers = array_replace($this->routers,$routers);
		return $this->routers;
	}

	/**
	 * Check if request matchs a router
	 */
	private function Matchs()
	{
		foreach ($this->routers as $key => $router) {
			$request = $this->request;
			$patternVariable = $router['value'];

			if ($patternVariable){
				if(!empty($router['pattern'])){
					$request =str_replace('/', '', $this->request);
				}
			}


			if (in_array($request, $router,true)) {
				$this->routerName = $key;
				$this->controller = 'Controllers\\'.ucfirst($router['controller']).'Controller';
				$this->pattern = $router['pattern'];
				$this->patternVariable = $router['value'];
				return true;
			}

		}

	}

}