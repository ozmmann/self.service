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
         *
         * @param array  $form_data
         * @param string $layout_directory
         */
        public function __construct($form_data, $layout_directory){
            $this->_form_data = $form_data['form_data'];
            $this->_fields = $form_data['fields'];
            $this->_button = $form_data['button'];
            $this->_default_inp_class = $form_data['default_class']['inp'];

            $this->_template = $layout_directory . '/form.tpl';
        }

        /**
         * get form html attributes
         * @return string
         */
        public function getFormData(){
            $str = '';
            foreach($this->_form_data as $param_name => $value){
                $str .= $param_name . ' = "' . $value . '" ';
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
         *
         * @return string
         */
        public function getInput($field){
            $input = '';
            switch($field['field']){
                case 'input':
                    if($field['type']=='file'){
                        /*<div class="btn">
                            <span>File</span>
                            <input type="file">
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                          </div>*/

                    }
                    $input .= '<input type="' . $field['type'] . '" id="' . $field['id'] . '" name="' . $field['name'] . '"';
                    if($field['required']){
                        $input .= ' required';
                    }
                    if($field['placeholder']){
                        $input .= ' placeholder="' . $field['placeholder'] . '"';
                    }
                    if($field['pattern']){
                        $input .= ' pattern="' . $field['pattern'] . '"';
                    }
                    $input .= ' class="' . $this->getInpClass($field['name']) . '"';
                    $input .= '>';
                    break;
                case 'select':
                    $optionStr='';
                    $multi = false;

                    //region option
                    foreach($field['option'] as $option){
                        if($option['optg']){
                            $optionStr .= '<optgroup label="' . $option['label'] . '">';
                            $multi=true;
                            continue;
                        }
                        $optionStr .= '<option';
                        if($option['value']){
                            $optionStr .= ' value="' . $option['value'] . '"';
                        }
                        if($option['disabled']){
                            $optionStr .= ' disabled';
                        }
                        if($option['selected']){
                            $optionStr .= ' selected';
                        }
                        $optionStr .= '>';
                        $optionStr .= $option['label'];
                        $optionStr .= '</option>';
                    }
                    //endregion

                    $input .= '<select id="' . $field['id'] . '" name="' . $field['name'] . '"';
                    if($field['required']){
                        $input .= ' required';
                    }
                    if($multi){
                        $input .= ' multiple';
                    }
                    $input .= ' class="' . $this->getInpClass($field['name']) . '"';
                    $input .= '>';
                    $input .= $optionStr;
                    $input .= '</select>';
                    break;
                case 'textarea':
                    $input .= '<textarea ';
                    if(!$field['readonly']){
                        if($field['required']){
                            $input .= ' required';
                        }
                        if($field['maxlength']){
                            $input .= ' maxlength="' . $field['maxlength'] . '"';
                        }
                        if($field['length']){
                            $input .= ' length="' . $field['length'] . '"';
                        }
                    } else{
                        $input .= ' readonly';
                    }
                    if($field['placeholder']){
                        $input .= ' placeholder="' . $field['placeholder'] . '"';
                    }
                    if($field['cols']){
                        $input .= ' cols="' . $field['cols'] . '"';
                    }
                    if($field['rows']){
                        $input .= ' rows="' . $field['rows'] . '"';
                    }
                    $input .= ' class="' . $this->getInpClass($field['name']) . '"';
                    $input .= '></textarea>';
                    break;
            }

            return $input;
        }

        /**
         * @param string $key
         *
         * @return string
         */
        public function getButton($key){
            return $this->_button[$key];
        }

        /**
         * get intput status
         *
         * @param string $inp_name
         *
         * @return string
         */
        public function getInpClass($inp_name){
            $class_name = '';
            if($this->_fields[$inp_name]['type'] != 'checkbox' or $this->_fields[$inp_name]['type'] != 'radio' and $this->_fields[$inp_name]['required']){
                $class_name = $this->_default_inp_class . ' ';
            }

            if(!empty($this->_form_errors)){
                if(isset($this->_form_errors['fields'][$inp_name])){
                    $class_name .= 'invalid';
                } else{
                    $class_name .= 'valid';
                }
            }

            return $class_name;
        }

        /**
         * path to tpl which to build
         */
        public function showForm(){
            include Config::LAYOUT_DIR . $this->_template;
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

        public function getInitMaterial(){
            $initStr = '$(document).ready(function() {';

            foreach($this->_fields as $field){
                if($field['field'] == 'select'){
                    $initStr .= '
                    $("select").material_select();
                    ';
                }
                if($field['type'] == 'date'){
                    $initStr .= '
                    $(".datepicker").pickadate({selectMonths: true, selectYears:' . $field['year'] . '})
                    ';
                }
                if($field['field'] == 'textarea'){
                    $initStr .= '
                    $("textarea#' . $field['id'] . '").characterCounter();
                    ';
                    /**
                     * get autoresize textarea
                     */
                    //$initStr .= '$("#' . $field['id'] . '").val("New Text");
                    //$("#' . $field['id'] . '").trigger(\'autoresize\')';
                }
            }

            $initStr .= '});';

            return $initStr;
        }
    }


