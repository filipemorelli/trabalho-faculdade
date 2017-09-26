<?php
/**
 * Class UrlControlHelper | View\Helper\UrlControlHelper
 * 
 * @author Filipe Morelli <morellitecinfo@gmail.com>
 */

App::uses('AppHelper', 'View/Helper');

/**
 * Class UrlControlHelper manipulate data to url format
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