<?php

use Cake\Routing\Router;

Router::connect(
'/autocomplete/:model/:field/:order',
array('plugin'=>'autocomplete', 'controller' => 'autocompletes', 'action' => 'autocomplete'),
array(
	'pass' => array('model','field','order')
)
);

?>