<?php
App::uses('AppModel', 'Model');
/**
 * TblTestSubject Model
 *
 */
class TestSubject extends AppModel {

    public $useTable = 'tbl_test_subjects';


    public function getQuestionCount($test_id)
    {
        $count_question = $this->find('all', array('fields' => 'SUM(TestSubject.no_of_question) as sum_question', 'conditions' => array('TestSubject.test_id' => $test_id)));
        return $count_question[0][0]['sum_question'];
    }
}
