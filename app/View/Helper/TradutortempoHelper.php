<?php
/**
 * Class TradutortempoHelper | View/TradutortempoHelper
 * 
 * @author Filipe Morelli <morellitecinfo@gmail.com>
 */

App::uses('AppHelper', 'View/Helper');

/**
 * Class TradutortempoHelper Tradutor de tempo
 */
class TradutortempoHelper extends AppHelper
{

    /**
     * TradutortempoHelper constructor.
     * @param View $view
     * @param array $settings
     */
    public function __construct(View $view, $settings = array())
    {
        parent::__construct($view, $settings);
    }


    /**
     * Cake tem uma função para pasar tempo para string porém em ingles, então essa funcao traduz para portugues
     * @param $texto
     * @return string
     */
    public function tempoPtBr($texto)
    {
        $texto = str_replace('days', 'dias', $texto);
        $texto = str_replace('minutes', 'minutos', $texto);
        $texto = str_replace('hours', 'horas', $texto);
        $texto = str_replace('mouths', 'meses', $texto);
        $texto = str_replace('weeks', 'semanas', $texto);
        $texto = str_replace('seconds', 'segundos', $texto);


        $texto = str_replace('day', 'dia', $texto);
        $texto = str_replace('minute', 'minuto', $texto);
        $texto = str_replace('hour', 'hora', $texto);
        $texto = str_replace('day', 'dia', $texto);
        $texto = str_replace('week', 'semana', $texto);
        $texto = str_replace('second', 'segundo', $texto);

        $texto = str_replace('ago', 'atrás', $texto);
        $texto = str_replace('just now', 'agora', $texto);
        $texto = str_replace('in', 'em', $texto);
        $texto = str_replace('on', 'em', $texto);

        return $texto; // Replace your word
    }
}