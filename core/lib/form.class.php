<?php

/**
 * Class Form
 */
class Form
{
    public $method;
    public $action;
    public $enctype;
    public $fields;
    public $errors;
    public $button_text;
    public $validator;
    public $refields;

    /**
     * Form constructor.
     * @param array $data
     */
    public function __construct($data)
    {
        foreach ($data as $key => $val) {
            $this->$key = $val;
        }
        //todo разобраться с валидатаром
        //$this->validator = new Validator();
    }

    /**
     * get intput status
     * @param string $inp_name
     * @return string
     */
    public function getInpClass($inp_name)
    {
        if (!empty($this->errors)) {
            if (isset($this->errors['fields'][$inp_name])) {
                return 'inp-error';
            } else {
                return 'inp-success';
            }
        }
    }

    public function showForm()
    {
        include '/layout/admin/form_login.tpl';
    }

    /**
     * select name Required field
     * @return array
     */
    public function getRequiredFields()
    {
        $required_fields = array();

        foreach ($this->fields as $field) {
            if ($field['required'] == 1 && $field['field'] != 'file') {
                $required_fields[] = $field['name'];
            }
        }
        return $required_fields;
    }
}


