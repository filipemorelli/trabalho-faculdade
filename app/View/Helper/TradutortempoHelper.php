<?php

App::uses('AppHelper', 'View/Helper');


class TradutortempoHelper extends AppHelper {

    public function __construct(View $view, $settings = array()) {
        parent::__construct($view, $settings);
    }


    public function tempoPtBr($texto) {
        $texto = str_replace('days', 'dias' , $texto);
        $texto = str_replace('minutes', 'minutos' , $texto);
        $texto = str_replace('hours', 'horas' , $texto);
        $texto = str_replace('mouths', 'meses' , $texto);
        $texto = str_replace('seconds', 'segundos' , $texto);


        $texto = str_replace('day', 'dia' , $texto);
        $texto = str_replace('minute', 'minuto' , $texto);
        $texto = str_replace('hour', 'hora' , $texto);
        $texto = str_replace('day', 'dia' , $texto);
        $texto = str_replace('second', 'segundo' , $texto);

        $texto = str_replace('ago', 'atrás' , $texto);
        return $texto; // Replace your word
    }
}