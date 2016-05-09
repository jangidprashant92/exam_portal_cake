<?php
App::uses('TblTest', 'Model');

/**
 * TblTest Test Case
 */
class TblTestTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tbl_test',
		'app.sub',
		'app.user',
		'app.group'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TblTest = ClassRegistry::init('TblTest');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TblTest);

		parent::tearDown();
	}

}
