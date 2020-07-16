<?php
namespace Autocomplete\View\Helper;

use Cake\Core\Configure;
use Cake\View\Helper;

class AutocompleteHelper extends Helper {

    public $helpers = array('Html', 'Form', 'Session');

    public function initAutocomplete() {

        foreach(Configure::read('Autocomplete.includeCss') as $item) {

            echo $this->Html->css($item) ."\r\n";

        }

        foreach(Configure::read('Autocomplete.includeJs') as $item) {

            echo $this->Html->script($item, ['defer' => true]) ."\r\n";

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
        $html .= '$(function() {' ."\r\n";
        $html .= 'console.log("sas");'."\r\n";
        $html .= '$("#' .$element .'").autocomplete({
			source: "' .$source .'",
			minLength: ' .$minLength .'
			});' ."\r\n";
        $html .= '});' ."\r\n";

        return $html;

    }




}

?>