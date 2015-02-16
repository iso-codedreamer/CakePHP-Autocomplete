<?php

Configure::write(
    'Autocomplete',
    array(
		'limit' => 10,
		'backgroundColor' => '#000000',
		'color' => '#ffffff',
		'includeCss' => array(
			'jquery-ui.min.css', 
			'jquery-ui.theme.min.css'
		),
		'includeJs' => array(
			'jquery.js',
			'jquery-ui.min.js'
		)
	)
);


?>