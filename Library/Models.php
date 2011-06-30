<?php

namespace Library;

/**
 * Models Class
 * @author Miguel Perez  <miguel@mlpz.com>
 */
class Models
{
	private $mongodb;
	private $mongoConnection;

	public function Mongo()
	{
		$username = mongoUsername;
		$password = mongoPassword;
		$hostname = mongoHostname;
		$database = mongoDatabase;
		$connect = new \Mongo("mongodb://${username}:${password}@${hostname}/${database}");
		$collection = $connect->$database;
		return $this->mongoConnection = $collection->list;
	}

	public function set(array $mongodb)
	{
		$this->mongodb = $mongodb;
	}
}