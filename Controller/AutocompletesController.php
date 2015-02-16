<?php

App::uses('AppController', 'Controller');

class AutocompletesController extends AppController {
	
	public $uses = array();
	
	public $components = array('Session','Cookie','RequestHandler');
	
	public $helpers = array('Html', 'Form', 'Session');

	
	
	
	public function autocomplete($model='pages', $field='name', $order='ASC') {
		
		$model = Inflector::singularize($model);
		$model = Inflector::camelize($model);
		
		$modelField = $model ."." .$field;
		
		$this->loadModel($model);
		
		$term = trim(stripslashes(addslashes($_GET["term"])));
		
		$term = $this->cleanVars($term);
		
		$term = filter_var($term, FILTER_SANITIZE_STRING);
		
		$this->autoRender = false;
		
		if ($this->request->is('ajax')) {
		
			$rows = $this->$model->find('all',array(
				'conditions'=>array($modelField .' LIKE '=>'%' .$term .'%'),
				'fields'=>array($model .'.id',$model ."." .$field),
				'order'=>array($model ."." .$field=>$order),
				'limit'=>Configure::read('Autocomplete.limit')
			));
			
			$json = array();
			
			foreach ($rows as $data) {
				array_push($json, array(
					'id' => $data[$model]['id'],
					'label' => $data[$model][$field],
					'value' => $data[$model][$field],
				));
			}
	
			
			echo json_encode($json);
		
		}
		
	}
	
	
	
	
	public function cleanVars($data) {
		
		if (is_array($data)) {
			
		foreach ($data as $key => $var) {
			$data[$key] = $this->cleanVars($var);
		}
		} else {
			$data = strip_tags($data);
		}
		
		return $data;
	
	}
	
	
	
	
}

?>