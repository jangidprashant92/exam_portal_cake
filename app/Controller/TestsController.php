<?php
App::uses('AppController', 'Controller');
/**
 * Tests Controller
 *
 * @property Test $Test
 * @property PaginatorComponent $Paginator
 */
class TestsController extends AppController {

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
		$this->Test->recursive = 0;
		$this->set('tests', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Test->exists($id)) {
			throw new NotFoundException(__('Invalid test'));
		}
		$options = array('conditions' => array('Test.' . $this->Test->primaryKey => $id));
		$this->set('test', $this->Test->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
//$this->Capture->saveAll($this->request->data['Capture']['items'], array('validate' => 'only'));
		$this->helpers[]='Froala.Froala';
		$this->loadModel('Subject');
		$this->loadModel('TestSubject');
		$subjects=$this->Subject->find('list');
		if ($this->request->is('post')) {
			$user=$this->Auth->user();
			$this->request->data['Test']['start_date']=date('Y-m-d',strtotime($this->request->data['Test']['start_date']));
			$this->request->data['Test']['end_date']=date('Y-m-d',strtotime($this->request->data['Test']['end_date']));
			$this->request->data['Test']['user_id']=$user['id'];
			$this->Test->create();
			if ($this->Test->save($this->request->data)) {

				foreach($this->request->data['Test']['sub_id'] as $sub_id)
				{
					$this->request->data['TestSubject']['sub_id']=$sub_id;
					$this->request->data['TestSubject']['test_id']=$this->Test->id;
					$this->TestSubject->saveAll($this->request->data['TestSubject']);
				}


				$this->Session->setFlash(__('The test has been saved'), 'flash/success');
				$this->redirect(array('action' => 'addSubjectTotest/'.$this->Test->id));
			} else {
				$this->Session->setFlash(__('The test could not be saved. Please, try again.'), 'flash/error');
			}
		}

		//$users = $this->Test->User->find('list');
		$this->set(compact('Testsubjects','subjects'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->loadModel('Subject');
		$this->loadModel('TestSubject');
		$subjects=$this->Subject->find('list');
        $this->Test->id = $id;
		if (!$this->Test->exists($id)) {
			throw new NotFoundException(__('Invalid test'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			$this->request->data['Test']['start_date']=date('Y-m-d',strtotime($this->request->data['Test']['start_date']));
			$this->request->data['Test']['end_date']=date('Y-m-d',strtotime($this->request->data['Test']['end_date']));

			if ($this->Test->save($this->request->data)) {
				$this->Session->setFlash(__('The test has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The test could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Test.' . $this->Test->primaryKey => $id));
			$this->request->data = $this->Test->find('first', $options);
		}
		$selected_val =$this->TestSubject->find('list',array('fields'=>'sub_id','conditions'=>array('TestSubject.test_id'=>$id)));
		$selected=[];
		foreach($selected_val as $select)
		{
			$selected[]=$select;
		}

		//$users = $this->Test->User->find('list');
		$this->set(compact('subjects','selected'));
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
		$this->Test->id = $id;
		if (!$this->Test->exists()) {
			throw new NotFoundException(__('Invalid test'));
		}
		if ($this->Test->delete()) {
			$this->Session->setFlash(__('Test deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Test was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}


	public function admin_addSubjectTotest($id)
	{
		$this->loadModel('TestSubject');

		if ($this->request->is('post') || $this->request->is('put')) {

			$test_id=$this->request->data['test_id'];
			$count_question=0;

			$add_sub=[];
			$myArray = array();
			foreach($this->request->data['TestSubject'] as $testSubject) {
				$tid=$this->TestSubject->find('first',array('fields'=>'id,sub_id','conditions'=>array('TestSubject.sub_id'=>$testSubject['sub_id'])));

				$this->TestSubject->id =$tid['TestSubject']['id'];

				$count_question+=$testSubject['no_of_question'];

				for ($i = 1; $i <= $testSubject['no_of_question']; $i++)
				{
					$myArray[] =  $tid['TestSubject']['sub_id'];
				}

				$this->TestSubject->saveField('no_of_question',$testSubject['no_of_question']);

			}

			$this->Session->write('count_ques',$count_question);
			$this->Session->write('sub_seq',$myArray);



		$this->redirect(array('action'=>'addQuestionsTotest/'.$test_id."/1"));
		}

		$this->TestSubject->bindModel(array('belongsTo'=>array('Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'sub_id',
		))));

		$subjects=$this->TestSubject->find('all',array('conditions'=>array('TestSubject.test_id'=>$id)));

		$test_id=$id;
		$this->set(compact('subjects','test_id'));
	}

	public function admin_addQuestionsTotest($id,$no_q=null)
	{
		$this->helpers[]='Froala.Froala';
		$this->loadModel('TestSubject');
		$this->loadModel('Question');
		$this->loadModel('QuestionOption');
		$this->loadModel('QuestionAnswer');

		$this->TestSubject->bindModel(array('belongsTo'=>array('Subject' => array(
			'className' => 'Subject',
			'foreignKey' => 'sub_id',
		))));

		$subjects=$this->TestSubject->find('all',array('conditions'=>array('TestSubject.test_id'=>$id)));

		if ($this->request->is('post')) {

			$test_id=$this->request->data['Question']['test_id'];
			$Q_id=$this->request->data['Question']['Q_no'];


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
				if($Q_id==$this->Session->read('count_ques'))
				{
					$this->Session->setFlash(__('The questions has been saved'), 'flash/success');
					return $this->redirect(array('action'=>'index'));
				}

				$this->Session->setFlash(__('The question has been saved'), 'flash/success');
				$Q_id=$Q_id+1;
				$this->redirect(array('action'=>'addQuestionsTotest/'.$test_id."/".$Q_id));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'), 'flash/error');
			}
		}




		$count_question = $this->TestSubject->find('all', array('fields' => 'SUM(TestSubject.no_of_question) as sum_question','conditions'=>array('TestSubject.test_id'=>$id)));
		$count_question=$count_question[0][0]['sum_question'];
		$status_array=array(''=>'','active'=>'Active','inactive'=>'Inactive');
		$test_id=$id;
		$Q_no=$no_q;
		$sub_seq=$this->Session->read('sub_seq');

		$sub_id=$sub_seq[$no_q-1];
		$this->set(compact('subjects','test_id','count_question','status_array','Q_no','sub_id'));

	}

	public function admin_is_publish($id)
	{

		$this->Test->id=$id;
		$is_publish=$this->Test->find('first',array('fields'=>'is_publish'));

		if ($is_publish['Test']['is_publish'] == Test::IS_PUBLISHED) {
			$this->request->data['Test']['is_publish'] = Test::IS_NOT_PUBLISHED;
		} else {
			$this->request->data['Test']['is_publish'] = Test::IS_PUBLISHED;
		}
		$this->Test->saveField('is_publish',$this->request->data['Test']['is_publish']);
		return $this->redirect(['action'=>'index']);
	}

	public function admin_add_question($id=null)
	{
		$postData = [];
		if (!empty($this->request->data['formdata'])) {
			parse_str($this->request->data['formdata'], $postData);
		}

		$this->helpers[]='Froala.Froala';
		$this->layout ='';
		$this->loadModel('Question');
		$this->loadModel('QuestionOption');
		$this->loadModel('QuestionAnswer');

		if(!empty($postData['data']['Question']))
		{
			
			if($this->request->data['curentpg']==2) {
				$this->Question->deleteAll(array('test_id'=>$id));
			}
			$this->Question->create();
			if ($this->Question->save($postData['data']))
			{

				$i=1;
				foreach($postData['data']['Question']['optionValue'] as $option)
				{

					$this->request->data['QuestionOption']['value']= $option;
					$this->request->data['QuestionOption']['question_id']=$this->Question->id;
					$this->QuestionOption->saveAll($this->request->data['QuestionOption']);

					if(!empty($postData['data']['Question']['option'][$i]))
					{
						$this->request->data['QuestionAnswer']['option_id']=$this->QuestionOption->id;
						$this->request->data['QuestionAnswer']['question_id']=$this->Question->id;
						$this->QuestionAnswer->save($this->request->data['QuestionAnswer']);
					}
					$i++;
				}

			}
		}


$curpage=$this->request->data['curentpg'];
$page=$this->request->data['page'];
		$status_array=array(''=>'','active'=>'Active','inactive'=>'Inactive');
		$this->set(compact('id','status_array','curpage','page'));

		$this->render('admin_add_question');
	}

	public function admin_add_new_row()
	{
		$this->helpers[]='Froala.Froala';
		$this->layout="";
		$i=$this->request->data['fetch'];
		$edit=$this->request->data['edit'];
		$this->set(compact('i','edit'));
	}

}
