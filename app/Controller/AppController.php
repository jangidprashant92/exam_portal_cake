<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller 
{
	public $components=array('Acl','Auth','Session','Paginator','AclPermissions','Flash');

	//public $helpers=array('Froala.Froala');
	
	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->AclPermissions->filter();

		$this->set('is_user_logged_in',$this->Auth->user());
		
		if (isset($this->params['prefix']) && $this->params['prefix'] == 'admin') {
            $this->layout = 'admin/admin';
        } 
	}

	public function upload_image($file,$path= '' )
	{

		if($path==''){ $path= WWW_ROOT.'img/editor_uploads/'; }

		//Check if image has been uploaded
		if(!empty($file['name']))
		{
			// $file = $this->request->data[$model]['upload']; //put the data into a var for easy use

			$ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
			$arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions

			//only process if the extension is valid
			if(in_array($ext, $arr_ext))
			{
				//do the actual uploading of the file. First arg is the tmp name, second arg is
				//where we are putting it
				move_uploaded_file($file['tmp_name'], $path . time().$file['name']);

				//prepare the filename for database entry
				$filename=time().$file['name'];
			}
		}



		return $filename;
	}

	public function editor_image_upload()
	{
		$response = new StdClass;
		$response->link = $this->webroot."img/editor_uploads/" . $this->upload_image($_FILES['image_param']);
		echo stripslashes(json_encode($response));die;
	}
	public function delete_editor_image()
	{
		App::uses('File', 'Utility');
		// new File(string $path, boolean $create = false, integer $mode = 493)
		// $mode  = 493 default
		$src=$_POST['src'];

		$file = new File(WWW_ROOT . 'img/editor_uploads/'.substr(strrchr($src, "/"), 1), false, 0777);
		if($file->delete()) {
			echo 'image deleted.....';
		}
		die;
	}

	public function addTempMeta($post_id,$meta,$data)
	{
		$this->loadModel('TempSession');
		$this->request->data['TempSession']['test_id']=$post_id;
		$this->request->data['TempSession']['meta']=$meta."_".$post_id;
		$this->request->data['TempSession']['session']=serialize($data);

		$this->TempSession->save($this->request->data);

	}

	public function updateTempMeta($post_id,$meta,$data)
	{
		$this->loadModel('TempSession');

		$check_record=$this->TempSession->find('first',array('fields'=>'id','conditions'=>array('TempSession.test_id'=>$post_id,'TempSession.meta LIKE "%'.$meta.'_'.$post_id.'%"')));
	//	pr($check_record);die;
		if(count($check_record) != 0){
			$this->TempSession->id=$check_record['TempSession']['id'];
			$this->request->data['TempSession']['test_id']=$post_id;
			$this->request->data['TempSession']['meta']=$meta."_".$post_id;
			$this->request->data['TempSession']['session']=serialize($data);

			$this->TempSession->save($this->request->data);
		}else{
			$this->addTempMeta($post_id,$meta,$data);
		}

	}

	public function getTempMeta($post_id,$meta)
	{
		$this->loadModel('TempSession');
	return $this->TempSession->find('first',array('conditions'=>array('TempSession.test_id'=>$post_id,'TempSession.meta LIKE "%'.$meta.'_'.$post_id.'%"')));
	}
}
