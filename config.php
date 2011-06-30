<?php

use Library\Models;

/**
 * Mongodb Settings
 */

define('mongoHostname','localhost');
define('mongoUsername','root');
define('mongoPassword','root');
define('mongoDatabase','Lists');


 
/**
 * $routers = array(
 * 'routerName' => array('controller'=>'Home',
 * 'pattern'=> '/'
 * );
 */
 $routers = array(
 'single' => array('controller'=>'single','pattern'=>'{id}'),
 'homepage' => array('controller'=>'home','pattern'=>'/'),
 );