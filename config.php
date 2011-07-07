<?php

use Library\Models;

/**
 * Mongodb Settings
 */

define('mongoHostname',$_SERVER['Hostname']);
define('mongoUsername',$_SERVER['Username']);
define('mongoPassword',$_SERVER['Password']);
define('mongoDatabase',$_SERVER['DatabaseName']);


 
/**
 * $routers = array(
 * 'routerName' => array('controller'=>'Home',
 * 'pattern'=> '/'
 * );
 */
 $routers = array(
 'completed' => array('controller'=>'completed','pattern'=>'/completed/'),
 'single' => array('controller'=>'single','pattern'=>'{id}'),
 'homepage' => array('controller'=>'home','pattern'=>'/'),
 );