<?php
/**
 * Users Controller
 *
 * @author Luis Fred G S <luis.fred.gs@gmail.com>
 * @category Controller
 * @package Plugin.Admin
 */
App::uses('AppController', 'Controller');

class UsersController extends AppController
{
	/**
	 * Models
	 *
	 * @var array
	 **/
	public $uses = array('User', 'Group');

	/**
	 * Controller callback - beforeFilter()
	 * 
	 * @return void
	 */
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->set('title_for_layout', __d('admin', 'Users'));
	}
	
	/**
	 * admin_index
	 * 
	 * @return void
	 */
	public function admin_index(){
		
		$this->paginate = array('order'=>array('User.id'=>'Desc'));
		$this->set('users', $this->paginate('User'));
	}
	
	/**
	 * admin_add
	 * 
	 * @return void
	 */
	public function admin_add()
	{
		if ( !empty( $this->request->data ) ) {
			$this->User->create();			
			if ( $this->User->save( $this->request->data ) ) {
				$this->Flash->succeed(__d('admin', 'User saved.'));
				$this->redirect(array('action' => 'index'));
			}
		}
		$groups = $this->Group->find('list');
		$this->set(compact('groups'));
	}
	
	/**
	 * admin_edit
	 * 
	 * @param $id User ID
	 * @return void
	 */
	public function admin_edit( $id = null ){
		if ( !$id ) {
			$this->Flash->error(__d('admin', 'Invalid ID'), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		if ( !empty( $this->request->data ) ) {
			if ( $this->User->save($this->request->data) ) {
				$this->Flash->success(__d('admin', 'User was saved.'), 'flash_success');
			}
		}
		$this->request->data = $this->User->read(null, $id);
		$groups = $this->Group->find('list');
		$this->set(compact('groups'));
	}
	
	/**
	 * admin_login
	 * 
	 * @return void
	 */
	public function admin_login()
	{

		$this->layout = 'admin/admin_login';
		if ( $this->request->is('post') ) {
			if ( $this->Auth->login() ) {
				return $this->redirect($this->Auth->redirect());
			}else{
				$this->Flash->error(__d('admin', 'Username and Password Invalid.'));
				return $this->redirect($this->Auth->redirect());
			}
		}
	
	}
	
	/**
	 * admin_logout
	 * 
	 * @return void
	 */
	public function admin_logout()
	{
		if ( $this->Auth->logout() ) {
			return $this->redirect(array('action'=>'login'));
		}
	}
	
	/**
	 * admin_reset_password
	 * 
	 * @param  $id User ID
	 * @return void
	 */
	public function admin_reset_password( $id = null )
	{
		if ( !$id ) {
			$this->Flash->error(__d('admin', 'Invalid ID'));
			$this->redirect(array('action' => 'index'));
		}
		if ( !empty( $this->request->data ) ) {
			if ( $this->User->save($this->request->data) ) {
				$this->Flash->success(__d('admin', 'password was saved.'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	/**
	 * admin_delete
	 * 
	 * @param $id User ID
	 * @return void
	 */
	public function admin_delete( $id = null ){
		if ( !$id ) {
			$this->Flash->error(__d('admin', 'Invalid ID!'));
			$this->redirect(array('action' => 'index'));
		}
		if ( $this->User->delete( $id ) ) {
			$this->Flash->success(__d('admin', 'User was deleted.'));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	public function login()
	{
		
		
		if ( $this->request->is('post') ) {
			if ( $this->Auth->login() ) {
				return $this->redirect(array('controller'=>'home'));
			}else{
				$this->Flash->error('Invalid Username and Password');
				return $this->redirect(array('controller'=>'users','action'=>'login'));
			}
		}
	
	}
	
	public function register()
	{
		if($this->Auth->user())
		{
			return $this->redirect(array('controller'=>'home'));
		}

		if ( !empty( $this->request->data ) ) {
			$this->User->create();
			$this->request->data['User']['group_id']=2;
			$this->request->data['User']['username']=$this->request->data['User']['email'];
			if ( $this->User->save( $this->request->data ) ) {
				//$this->Flash->success(__d('admin', 'User saved.'));
				$this->redirect(array('controller' => 'home'));
			}
		}

	}
	public function logout()
	{
		if ( $this->Auth->logout() ) {
			return $this->redirect(array('action'=>'login'));
		}
	}
}
 ?>
