<?php
/**
 * AclPermission Model
 *
 * @author Luis Fred G S <luis.fred.gs@gmail.com>
 * @category Model
 * @package Plugin.Admin
 */
App::uses('AppModel', 'Model');
class AclPermission extends AppModel {

/**
 * name
 *
 * @var string
 */
	public $name = 'AclPermission';

/**
 * useTable
 *
 * @var string
 */
	public $useTable = 'aros_acos';

/**
 * belongsTo
 *
 * @var array
 */
	public $belongsTo = array(
		'AclAro' => array(
			'className' => 'AclAro',
			'foreignKey' => 'aro_id',
		),
		'AclAco' => array(
			'className' => 'AclAco',
			'foreignKey' => 'aco_id',
		),
	);

}
