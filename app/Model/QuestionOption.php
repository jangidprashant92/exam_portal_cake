<?php
App::uses('AppModel', 'Model');
/**
 * TblQuestionOption Model
 *
 */
class QuestionOption extends AppModel {
    public $useTable = 'tbl_question_options';

    public $hasMany = array(
        'QuestionAnswer' => array(
            'className' => 'QuestionAnswer',
            'foreignKey' => 'option_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),

    );
}
