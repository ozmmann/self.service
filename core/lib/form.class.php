<?php

    /**
     * Class Form
     *
     * form builder and checker
     */
    class Form{
        protected $_form_data;
        protected $_fields;
        protected $_form_errors;
        protected $_template;
        protected $_button;
        protected $_default_inp_class;

        /**
         * Form constructor.
         * @param array $form_data
         * @param string $layout_directory
         */
        public function __construct($form_data, $layout_directory){
            $this->_form_data = $form_data['form_data'];
            $this->_fields = $form_data['fields'];
            $this->_button = $form_data['button'];
            $this->_default_inp_class = $form_data['default_class']['inp'];

            $this->_template = $layout_directory.'/form.tpl';
        }

        /**
         * get form html attributes
         * @return string
         */
        public function getFormData(){
            $str = '';
            foreach($this->_form_data as $param_name => $value){
                $str .= $param_name.' = "'.$value.'" ';
            }

            return $str;
        }

        /**
         * @return array
         */
        public function getFields(){
            return $this->_fields;
        }

        /**
         * @param array $field
         * @return string
         */
        public function getInput($field){
            $input = '';
            switch($field['field']){
                case 'input':
                    $input .= '<input type="'.$field['type'].'" id="'.$field['id'].'" name="'.$field['name'].'"';
                    if($field['required']){
                        $input .= ' required';
                    }
                    if($field['placeholder']){
                        $input .= ' placeholder="'.$field['placeholder'].'"';
                    }
                    if($field['pattern']){
                        $input .= ' pattern="'.$field['pattern'].'"';
                    }
                    $input .= ' class="'.$this->getInpClass($field['name']).'"';
                    $input .= '>';
                    break;
            }

            return $input;
        }

        /**
         * @param string $key
         * @return string
         */
        public function getButton($key){
            return $this->_button[$key];
        }

        /**
         * get intput status
         * @param string $inp_name
         * @return string
         */
        public function getInpClass($inp_name){
            $class_name = '';
            if($this->_fields[$inp_name]['type'] != 'checkbox' or $this->_fields[$inp_name]['type'] != 'radio' and $this->_fields[$inp_name]['required']){
                $class_name = $this->_default_inp_class.' ';
            }
            if(!empty($this->_form_errors)){
                if(isset($this->_form_errors['fields'][$inp_name])){
                    $class_name .= 'invalid';
                }
                else{
                    $class_name .= 'valid';
                }
            }
            return $class_name;
        }

        /**
         * path to tpl which to build
         */
        public function showForm(){
            include Config::LAYOUT_DIR.$this->_template;
        }

        /**
         * select name Required field
         * @return array
         */
        public function getRequiredFields(){
            $required_fields = [];

            foreach($this->_fields as $field){
                if($field['required'] && $field['field'] != 'file'){
                    $required_fields[] = $field['name'];
                }
            }

            return $required_fields;
        }
    }


