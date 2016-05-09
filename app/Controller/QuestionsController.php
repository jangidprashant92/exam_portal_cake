<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 */
class QuestionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Question->recursive = 0;
		$this->set('questions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {

		if ($this->request->is('post')) {
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('The question has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$tests = $this->Question->Test->find('list');
		$status_array=array('','active'=>'Active','inactive'=>'Inactive');
		$this->set(compact('tests','status_array'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->helpers[]='Froala.Froala';
		$this->loadModel('QuestionOption');
		$this->loadModel('QuestionAnswer');
		$this->Question->unBindModel(array('belongsTo' => array('Test')));


		$this->Question->id = $id;

		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Question->save($this->request->data)) {



				$i=1;
				foreach($this->request->data['QuestionOption'] as $option)
				{
					if(!empty($option['id'])){
						$this->QuestionOption->id =$option['id'];
						$this->QuestionOption->saveField('value',$option['value']);
					}else{
					$this->request->data['QuestionOption']['value']= $option['value'];
					$this->request->data['QuestionOption']['question_id']=$this->Question->id;
					$this->QuestionOption->saveAll($this->request->data['QuestionOption']);
					}
					if(!empty($this->request->data['Question']['option'][$i]))
					{
						$this->request->data['QuestionAnswer']['option_id']=$this->QuestionOption->id;
						$this->request->data['QuestionAnswer']['question_id']=$this->Question->id;
						$this->QuestionAnswer->save($this->request->data['QuestionAnswer']);
					}
					$i++;
				}


				$this->Session->setFlash(__('The question has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
			$this->Question->recursive=2;
			$this->request->data = $this->Question->find('first', $options);
		}
		$status_array=array('','active'=>'Active','inactive'=>'Inactive');

		$tests = $this->Question->Test->find('list');
		$this->set(compact('tests','status_array'));
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('Question deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Question was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
