<?php
App::uses('AppController', 'Controller');
/**
 * Subjects Controller
 *
 * @property Subject $Subject
 * @property PaginatorComponent $Paginator
 */
class SubjectsController extends AppController {

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
		$this->Subject->recursive = 0;
		$this->set('subjects', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Subject->exists($id)) {
			throw new NotFoundException(__('Invalid subject'));
		}
		$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
		$this->set('subject', $this->Subject->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Subject->create();
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash(__('The subject has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
        $this->Subject->id = $id;
		if (!$this->Subject->exists($id)) {
			throw new NotFoundException(__('Invalid subject'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash(__('The subject has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subject could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Subject.' . $this->Subject->primaryKey => $id));
			$this->request->data = $this->Subject->find('first', $options);
		}
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
		$this->Subject->id = $id;
		if (!$this->Subject->exists()) {
			throw new NotFoundException(__('Invalid subject'));
		}
		if ($this->Subject->delete()) {
			$this->Session->setFlash(__('Subject deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Subject was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
