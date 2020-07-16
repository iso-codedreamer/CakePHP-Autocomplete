<?php
namespace Autocomplete\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Utility\Inflector;

class AutocompletesController extends AppController {
	
	public $uses = array();

	public $helpers = array('Html', 'Form', 'Session');


	public function autocomplete($model='pages', $field='name', $order='ASC') {

        $model = Inflector::camelize($model);

		$table = $this->getTableLocator()->get($model);
		$modelField = $model ."." .$field;

		$term = $_GET["term"];

		$this->autoRender = false;


        $rows = $table->find('all', array(
            'conditions'=>array($modelField .' LIKE '=>'%' .$term .'%'),
            'fields'=>array($model .'.id',$model ."." .$field),
            'order'=>array($model ."." .$field=>$order),
            'limit'=>Configure::read('Autocomplete.limit')
        ));


        $json = array();

        foreach ($rows as $data) {
            array_push($json, array(
                'id' => $data['id'],
                'label' => $data[$field],
                'value' => $data[$field],
            ));
        }

        echo json_encode($json);
		

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