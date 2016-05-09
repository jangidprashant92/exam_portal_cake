<?php
/**
 * TblTest Fixture
 */
class TblTestFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'tbl_test';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => true, 'key' => 'primary'),
		'sub_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => true),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 5, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'description' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'duration' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 20, 'unsigned' => true),
		'start_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'end_date' => array('type' => 'date', 'null' => false, 'default' => null),
		'created_at' => array('type' => 'timestamp', 'null' => false, 'default' => null),
		'update_at' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'is_publish' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 1, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'sub_id' => 1,
			'user_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'duration' => 1,
			'start_date' => '2016-05-04',
			'end_date' => '2016-05-04',
			'created_at' => 1462377567,
			'update_at' => 1462377567,
			'is_publish' => 1
		),
	);

}
