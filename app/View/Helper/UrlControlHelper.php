<?php
App::uses('AppHelper', 'View/Helper');

/**
 * Class MyFormHelper create Custom fields
 */
class UrlControlHelper extends AppHelper
{
    /**
     * Parse Text to slug
     *
     * @param $text
     * @return string
     */
    public function parseSlug($text)
    {
        return Inflector::slug(strtolower($text), '-');
    }
}

?>