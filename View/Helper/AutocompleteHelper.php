<?php

App::uses('AppHelper', 'View/Helper');

class AutocompleteHelper extends AppHelper {
	
	public $helpers = array('Html', 'Form', 'Session');
	
	
	
	
	public function initAutocomplete() {
		
		foreach(Configure::read('Autocomplete.includeCss') as $item) {
			
			echo $this->Html->css('/autocomplete/css/' .$item) ."\r\n";
			
		}
		
		foreach(Configure::read('Autocomplete.includeJs') as $item) {
			
			echo $this->Html->script('/autocomplete/js/' .$item) ."\r\n";
			
		}
		
		$style = '';
		$style .= '<style type="text/css">' ."\r\n";
		$style .= '.ui-menu .ui-menu-item a.ui-corner-all:hover, .ui-menu .ui-menu-item a.ui-corner-all:focus, .ui-menu .ui-menu-item a.ui-corner-all:active {
			background: ' .Configure::read('Autocomplete.backgroundColor') .' !important;
			color: ' .Configure::read('Autocomplete.color') .' !important;
			border-radius:0;
		}
		
		.ui-state-hover, .ui-widget-content .ui-state-hover, .ui-widget-header .ui-state-hover, .ui-state-focus, .ui-widget-content .ui-state-focus, .ui-widget-header .ui-state-focus {
			background: ' .Configure::read('Autocomplete.backgroundColor') .' !important;
			border: none;
			color: ' .Configure::read('Autocomplete.color') .' !important;
			border-radius:0;
			font-weight: normal;
		}';
		$style .= '</style>' ."\r\n";
		
		echo $style;
		
	}
	
	
	
	
	public function setAutocomplete($options = array()) {
		
		if (isset($options["element"])) $element = $options["element"];
		else $element = 'q';
		if (isset($options["url"])) $url = $options["url"];
		else $url = 'http://localhost';
		if (isset($options["model"])) $model = $options["model"];
		else $model = 'pages';
		if (isset($options["field"])) $field = $options["field"];
		else $field = 'name';
		if (isset($options["order"])) $order = $options["order"];
		else $order = 'ASC';
		if (isset($options["minLength"])) $minLength = $options["minLength"];
		else $minLength = 2;
		
		$source = $url .'/' .$model .'/' .$field .'/' .$order;
		
		$html = '';
		$html .= '<script>' ."\r\n";
		$html .= '$(function() {' ."\r\n";
			$html .= '$("#' .$element .'").autocomplete({
			source: "' .$source .'",
			minLength: ' .$minLength .'
			});' ."\r\n";
		$html .= '});' ."\r\n";
		$html .= '</script>' ."\r\n";
		
		echo $html;
		
	}
	
	
	
	
}

?>