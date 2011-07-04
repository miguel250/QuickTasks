<?php

namespace Library;

/**
 * Create hash
 * @author Miguel Perez  <miguel@mlpz.com>
 */
class Hash
{
	private $hash;


	/**
	 * Get hash value
	 * @return string
	 */
	public function getHash($length)
	{
		return $this->createHash($length);
	}
	
	/**
	 * Create hash value
	 * @return string
	 */
	private function createHash($length)
	{
		$hash = md5(uniqid(rand(), true) . '!@#$%^&*()_+=-{}][;";/?<>.,' . microtime());
		$hash = pack('H*', $hash);
		$hash = base64_encode($hash);
		$hash = str_replace(
		array('+', '/', '='), array('', '', ''), $hash);
		$hash = substr($hash, 0, $length);

		$this->hash = $hash;
		
		return $this->hash;
	}
}