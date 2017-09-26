<?php
/**
 * Class UtilityHelper | View/UtilityHelper
 * 
 * @author Filipe Morelli <morellitecinfo@gmail.com>
 */

App::uses('AppHelper', 'View/Helper');

/**
 * Class MyFormHelper create Custom fields
 */
class UtilityHelper extends AppHelper
{
    /**
     * Get status id and return array correspondente
     *
     * @param $statusVaga
     * @return array
     */
    public function getStatusVaga($statusVaga)
    {
        $classCss = '';
        $status = '';
        switch ($statusVaga) {
            case '0':
                $classCss = 'success';
                $status = "Andamento";
                break;

            case '1':
                $classCss = 'warning';
                $status = "Análise de Currículos";
                break;

            case '2':
                $classCss = 'danger';
                $status = "Encerrado";
                break;
        }
        return array(
            'class' => $classCss,
            'status' => $status
        );
    }

    /**
     * Convert money or float to Brazil money format string
     *
     * @param int $value
     * @return string
    */
    public function parseMoneyPtBr($value)
    {
        $newValue = str_replace(".", ",", $value);
        return "R$ " . $newValue;
    }
}
