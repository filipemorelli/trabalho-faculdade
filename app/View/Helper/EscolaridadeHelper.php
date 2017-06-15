<?php

App::uses('AppHelper', 'View/Helper');


class EscolaridadeHelper extends AppHelper {

    public function escolaridadeTexto($escolaridade = 0){
        switch ($escolaridade) {
            case 0:
                return 'Indiferente';
                break;
            case 1:
                return 'Ensino Fundamental incompleto';
                break;
            case 2:
                return 'Ensino Fundamental cursando';
                break;
            case 3:
                return 'Ensino Fundamental completo';
                break;
            case 4:
                return 'Ensino Médio incompleto';
                break;
            case 5:
                return 'Ensino Médio cursando';
                break;
            case 6:
                return 'Ensino Médio completo';
                break;
            case 7:
                return 'Ensino Médio completo Profissionalizante cursando';
                break;
            case 8:
                return 'Ensino Médio completo Profissionalizante completo';
                break;
            case 9:
                return 'Ensino Superior incompleto';
                break;
            case 10:
                return 'Ensino Superior cursando';
                break;
            case 11:
                return 'Ensino Superior completo';
                break;
            case 12:
                return 'Pos-graduação';
                break;
            case 13:
                return 'Mestrado';
                break;
            case 14:
                return 'Doutorado';
                break;
            case 15:
                return 'Ph.D.';
                break;                        
            default:
                return 'Indiferente';
                break;
        }
    }
}