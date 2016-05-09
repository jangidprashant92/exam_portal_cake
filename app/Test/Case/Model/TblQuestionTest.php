<?php
App::uses('TblQuestion', 'Model');

/**
 * TblQuestion Test Case
 */
class TblQuestionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tbl_question',
		'app.test',
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
		$this->TblQuestion = ClassRegistry::init('TblQuestion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TblQuestion);

		parent::tearDown();
	}

}
