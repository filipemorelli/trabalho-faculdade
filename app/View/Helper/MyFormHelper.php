<?php
App::uses('FormHelper', 'View/Helper');

class MyFormHelper extends FormHelper
{
    public function customTime($fieldName, $options = array())
    {
        $options =
            $this->_initInputField($fieldName, $options) + array('type' => 'time');

        return $this->Html->useTag(
            'input',
            $options['name'],
            array_diff_key($options, array('name' => null))
        );
    }

    public function customDate($fieldName, $options = array())
    {
        $options =
            $this->_initInputField($fieldName, $options) + array('type' => 'date');

        return $this->Html->useTag(
            'input',
            $options['name'],
            array_diff_key($options, array('name' => null))
        );
    }
}

?>