<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'datanasc',
        'id_sexo',
        'id_estadocivil',
        'naturalidade',
        'ocupacao',
        'nomepai',
        'nomemae',
        'cpf',
        'rg',
        'cartaosus',
        'cep',
        'logradouro',
        'complemento',
        'bairro',
        'localidade',
        'uf',
        'ibge',
        'numero'
    ];

}
