<?php


namespace Models;

use Library\Models;

/**
 * Controllers Class
 * @author Miguel Perez  <miguel@mlpz.com>
 */
class Lists
{

	private $mongo;

	public function __construct()
	{
		$mongo =  new Models();
		$this->mongo = $mongo->Mongo();

	}

	/**
	 * Look for value in a document
	 * @param array $query
	 */
	public function find(array $query)
	{
		$find = $this->mongo->find($query);
		$data = array();
		$i = 0;

		while( $find->hasNext())
		{
			$data[$i] = $find->getNext();
			$i++;
		}

		return $data;
	}
	/**
	 * Get every document
	 */
	public function All()
	{
		return $this->mongo->find();
	}

	/**
	 * Update document
	 * @param array $id
	 */
	public function Update(array $id)
	{
		$this->mongo->update($id);
	}

	/**
	 * Remove document
	 * @param array $id
	 */
	public function Remove(array $id)
	{
		$this->mongo->remove($id);
	}

	/**
	 * Add document
	 * @param array $data
	 */
	public function add(array $data)
	{
		$this->mongo->insert($data);
	}
}