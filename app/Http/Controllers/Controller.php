<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function Valor($valor)
    {


        // Remove "R$" e espaços invisíveis
        $valorSemRS = preg_replace('/R\$\s*/u', '', $valor);

        // Remove os pontos dos milhares
        $valorSemPontos = str_replace('.', '', $valorSemRS);

        // Substitui a vírgula dos centavos por um ponto
        $valorComPonto = str_replace(',', '.', $valorSemPontos);

        // Converte a string limpa para um float
        $valorFloat = (float) $valorComPonto;

        return $valorFloat;
    }
}
