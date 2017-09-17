<?php
App::uses('FormHelper', 'View/Helper');

/**
 * Class MyFormHelper create Custom fields
 */
class MyFormHelper extends FormHelper
{
    /**
     * HTML5 Time field
     *
     * @param $fieldName
     * @param array $options
     * @return string
     */
    public function customTime($fieldName, $options = array())
    {
        $options = $this->_initInputField($fieldName, $options) + array('type' => 'time');

        return $this->Html->useTag('input', $options['name'], array_diff_key($options, array('name' => null)));
    }

    /**
     * HTML5 Date field
     *
     * @param $fieldName
     * @param array $options
     * @return string
     */
    public function customDate($fieldName, $options = array())
    {
        $options = $this->_initInputField($fieldName, $options) + array('type' => 'date');

        return $this->Html->useTag('input', $options['name'], array_diff_key($options, array('name' => null)));
    }
}

?>